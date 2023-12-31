<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
        'biometric_date',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $primaryKey = 'code';

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_id', 'code');
    }

    // Relación muchos a muchos con el modelo Ficha para instructores
    public function instructorFichas()
    {
        return $this->belongsToMany(Ficha::class, 'instructors_fichas', 'user_id', 'ficha_id');
    }

    // Relación muchos a muchos con el modelo Ficha para estudiantes
    public function studentFichas()
    {
        return $this->belongsToMany(Ficha::class, 'students_fichas', 'user_id', 'ficha_id');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'user_id');
    }
}
