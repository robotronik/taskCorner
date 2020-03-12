<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['nom', 'prenom', "email", "tel", "social", "type", "motif", "description", "statut"];
}
