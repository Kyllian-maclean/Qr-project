<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'create_at_salida'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'code');
    }

}
