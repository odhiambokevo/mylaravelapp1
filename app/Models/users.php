<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    //linking a model to a table
    protected $table = 'users ';

    //specify not null columns
    protected $fillable = ['name','email','password'];

    //define relationships
}
