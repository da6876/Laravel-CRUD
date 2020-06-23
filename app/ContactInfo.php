<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'name', 'number', 'email','religion',
    ];
}
