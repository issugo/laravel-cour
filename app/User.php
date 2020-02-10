<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'email', 'password','firstname','lastname', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills() {
        return $this->belongsToMany('App\Skill')->withPivot('level')->orderBy('level', 'desc');
    }

    public function role() {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Fonction pour savoir si l'utilisateur rentré est un admin
     *
     * @param $user
     * @return bool
     */

    public static function userRole($user) {
        return $user->role;
    }

    /**
     * Retourne les messages d'un utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
