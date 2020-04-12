<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function cliente(){
        return $this->belongsTo(Cliente::class)->select('nombre');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'rolesasignados');
    }

    public function hasRoles(array $roles){
        return $this->roles()->pluck('name')->intersect($roles)->count();
    }

    public function isUserUs($tusu, $esusu, $edousu, array $roles ){
        if ($this->roles()->pluck('name')->intersect($roles)->count())
        {
            if ($this->tipo_usuario == $tusu and $this->usuario == $esusu and $this->estadousuario_id == $edousu )
            {
                return true;
            }
        }

        return false;
    }

    public function isUserCte($tusu, $esusu, $edousu, array $roles ){
        if ($this->roles()->pluck('name')->intersect($roles)->count())
        {
            if ($this->tipo_usuario == $tusu and $this->usuario == $esusu and $this->estadousuario_id == $edousu )
            {
                return true;
            }
        }

        return false;
    }


}
