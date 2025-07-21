<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'password',
        'cargo',
        'data_nascimento',
        'cep',
        'endereco',
        'gestor_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_nascimento' => 'date',
    ];


    public function pontos()
    {
        return $this->hasMany(RegistroPonto::class);
    }

    public function gestor()
    {
        return $this->belongsTo(User::class, 'gestor_id');
    }

    public function isAdmin(): bool
    {
        return $this->cargo === 'Administrador';
    }

    public function isGestor(): bool
    {
        return in_array($this->cargo, ['Administrador', 'Gerente']);
    }

    public function funcionarios(): HasMany
    {
        return $this->hasMany(User::class, 'gestor_id');
    }

    public function registrosPonto()
    {
        return $this->hasMany(RegistroPonto::class, 'user_id');
    }

    public function getCpfFormatadoAttribute(): string
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $this->cpf);
    }

    public function getDataNascimentoFormatadaAttribute(): string
    {
        return $this->data_nascimento
            ? \Carbon\Carbon::parse($this->data_nascimento)->format('d/m/Y')
            : '';
    }
}
