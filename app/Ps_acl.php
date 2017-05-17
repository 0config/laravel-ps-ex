<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ps_acl extends Model
{
    //
    protected $fillable = [ 'name', 'uid', 'gid', 'comments', 'del_stat',  ]  ;
}
