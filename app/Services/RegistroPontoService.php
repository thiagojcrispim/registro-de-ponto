<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RegistroPontoService
{
    public function getRegistrosParaDataTable($user, $filtros = [])
    {
        $query = DB::table('registro_pontos')
            ->join('users as funcionarios', 'registro_pontos.user_id', '=', 'funcionarios.id')
            ->join('users as gestores', 'funcionarios.gestor_id', '=', 'gestores.id')
            ->select(
                'registro_pontos.id',
                'funcionarios.name as nome_funcionario',
                'funcionarios.cargo',
                DB::raw("TIMESTAMPDIFF(YEAR, funcionarios.data_nascimento, CURDATE()) as idade"),
                'gestores.name as nome_gestor',
                DB::raw('DATE_FORMAT(registro_pontos.created_at, "%d/%m/%Y %H:%i:%s") as data_hora')
            );

        if ($user->cargo === 'Gerente') {
            $query->where('funcionarios.gestor_id', $user->id);
        } elseif ($user->cargo === 'Funcionário') {
            $query->where('registro_pontos.user_id', $user->id);
        }

        if (!empty($filtros['data_inicio']) && !empty($filtros['data_fim'])) {
            $query->whereBetween('registro_pontos.created_at', [
                $filtros['data_inicio'] . ' 00:00:00',
                $filtros['data_fim'] . ' 23:59:59',
            ]);
        }

        if (!empty($filtros['funcionarios']) && is_array($filtros['funcionarios'])) {
            $query->whereIn('registro_pontos.user_id', $filtros['funcionarios']);
        }

        return $query;
    }


    public function getRelatorioCompleto(array $filtros = []): array
    {
        $sql = "
            SELECT
                rp.id,
                f.name AS nome_funcionario,
                f.cargo,
                TIMESTAMPDIFF(YEAR, f.data_nascimento, CURDATE()) AS idade,
                g.name AS nome_gestor,
                DATE_FORMAT(rp.created_at, '%d/%m/%Y %H:%i:%s') AS data_hora
            FROM registro_pontos rp
            JOIN users f ON rp.user_id = f.id
            JOIN users g ON f.gestor_id = g.id
            WHERE (? IS NULL OR rp.created_at >= ?)
            AND (? IS NULL OR rp.created_at <= ?)
            ORDER BY rp.created_at DESC
        ";

        return DB::select($sql, [
            $filtros['data_inicio'] ?? null,
            $filtros['data_inicio'] ?? null,
            $filtros['data_fim'] ?? null,
            $filtros['data_fim'] ?? null,
        ]);
    }


}
