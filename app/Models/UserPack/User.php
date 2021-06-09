<?php

namespace App\Models\UserPack;

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
        'nombre', 'email', 'password', 'tipoUsuario',
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


    public function getUsuario($usuario){
        $user = User::where('usuario',$usuario)->first();
        return $user;
    }
    public function search($usuario, $email){
        $user = User::where('usuario',$usuario)->orWhere('email', $email)->first();
        return $user;
    }
    public function getUserById($id){
        $user = User::where('id',$id)->first();
        return $user;
    }
    public function buscarUsuarioByCorreo($correo){
        $user = User::where('email',$correo)->get();
        if(count($user)>0){
            return $user;
        }else{
            return false;
        }
    }

}
