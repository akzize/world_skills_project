<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    public static $ADMIN = 1;
    public static $RESPONSABLE = 2;
    public static $EMPLOYE = 3;

    protected $primaryKey = 'matricule';
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'photo',
        'matricule',
    ];
}
