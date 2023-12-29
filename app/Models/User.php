<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'slug',
        'password',
        'role_id',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
       return $this->belongsTo(Role::class);
    }

    public function getImageAttribute( $value ) {

        if ( $value ) {

        } else {
            return asset( 'contents/backend/assets/images/avatar.png' );

        }

    }

    public static function laratablesAdditionalColumns() {

        return ['slug'];
    }

    public static function laratablesCustomAction( $action ) {
        $route = strtolower( class_basename( get_class() ) );
        return view( 'backend.partials.actions' )->with( [
            'action' => $action,
            'route'  => $route,
            'checkbox'   => false,
            'view'   => true,
            'viewInfo'   => true,
            'switch' => false,
            'edit'   => true,
            'delete' => true,
        ] )->render();

    }

    public static function laratablesImage( $user ) {

        if ( $user->image ) {
            return '<img src="' . asset( $user->image ) . '" class="mr-2" alt="">';
        } else {
            return '<img src="' . asset( 'contents/backend/assets/images/avatar.png' ) . '" class="mr-2" alt="">';
        }

    }

    // user assign work
    public function works()
    {
        return $this->hasMany(Work::class)->with(['orderItem','user','order']);
    }
}
