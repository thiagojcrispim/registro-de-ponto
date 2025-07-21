<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroPonto extends Model
{
    protected $fillable = ['user_id', 'data_hora'];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
