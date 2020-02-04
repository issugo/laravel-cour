<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    protected $table = 'role_user';
    protected $primaryKey = ['user_id', 'role_id'];
}
