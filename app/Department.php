<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = ['id'];

    public function members()
    {
        return $this->hasMany('App\Member')->orderBy('index')->orderBy('name');
    }
}
