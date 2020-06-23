<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    protected $fillable = [
        'CON_INFO_ID', 'CON_NAME', 'CON_PHONE',
    ];
}
