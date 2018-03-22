<?php

namespace SGA\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $fillable = [
        'address', 'cep', 'number','complement', 'city','neighborhood','state',
    ];

}
