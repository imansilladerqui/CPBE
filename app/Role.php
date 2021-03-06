<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = "tc_roles";
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
