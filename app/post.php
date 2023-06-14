<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	 use SoftDeletes;
    //
    protected $table = 'posts';

}