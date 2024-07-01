<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'image'
    ];
    public function cours()
    {
        return $this->hasMany(Cours::class, 'idCategorie');
    }
}
