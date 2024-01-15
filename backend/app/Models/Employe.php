<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $primaryKey = 'matricule';

    protected $fillable = [
        'matricule',
        'cin',
        'nom',
        'date_naissance',
        'etat_civil',
        'nb_enfant',
        'date_recrutement',
        'echelle',
        'address',
        'photo',
    ];
}
