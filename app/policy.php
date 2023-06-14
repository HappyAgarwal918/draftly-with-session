<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class policy extends Model
{
    //
    protected $table = 'policy';
    protected $primaryKey = 'unique_id';
   
    // protected $fillable = ['contact_form','contact_email','contact_address','contacts'];

    public $timestamps = false;
}
