<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class custom_clause extends Model
{
    //
    protected $table = 'custom-clause';
   
    //protected $fillable = ['contact_form','contact_email','contact_address','contacts'];

    public $timestamps = false;
}
