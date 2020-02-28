<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['nom', 'prenom', "email", "fb", "tel", "motif", "photos", "message"];
}
