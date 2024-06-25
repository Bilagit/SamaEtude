<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'level',
        'idUser'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
