<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// reset password
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Support\Facades\URL;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements CanResetPassword , MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , CanResetPasswordTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','username',
        'email','email_verified_at','remember_token',
        'password','confirm_password','gender','date_of_birth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       
//  Password reset notification

public function sendPasswordResetNotification($token)
{
    $expireMinutes = config('auth.passwords.users.expire', 60);
    $url = URL::temporarySignedRoute(
        'password.reset',
        now()->addMinutes(60),
        ['token' => $token]
    );

    $this->notify(new ResetPasswordNotification($url, $expireMinutes));
}


public function getAuthIdentifierName()
{
    return 'id'; // or whatever column you use as the primary key
}

public function getAuthIdentifier()
{
    return $this->getKey();
}

public function getAuthPassword()
{
    return $this->password;
}

public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

 /**
 * Get the email address that should be used for verification.
 *
 * @return string
 */
public function getEmailForVerification()
{
    return $this->email;
}
/**
 * Determine if the user has verified their email address.
 *
 * @return bool
 */
public function hasVerifiedEmail()
{
    return ! is_null($this->email_verified_at);
}

/**
 * Mark the given user's email as verified.
 *
 * @return bool
 */
public function markEmailAsVerified()
{
    return $this->forceFill([
        'email_verified_at' => $this->freshTimestamp(),
    ])->save();
}

/**
 * Send the email verification notification.
 *
 * @return void
 */
public function sendEmailVerificationNotification()
{
    $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
}


/**
 * The channels the user receives notification broadcasts on.
 */
public function receivesBroadcastNotificationsOn(): string
{
    return 'users.'.$this->id;
}

public static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $user->dark_mode = config('chatify.default_settings.dark_mode', true) ? 1 : 0;
    });
}

public function group()
{
    return $this->belongsToMany('App\Models\Group', 'admin_id');
}

public function group_member()
{
    return $this->belongsToMany('App\Models\Group', 'group_participants', 'user_id', 'group_id')->orderBy('updated_at', 'desc');
}

public function message()
{
    return $this->hasMany('App\Models\Message', 'user_id');
}

public function groups()
{
    return $this->belongsToMany(Group::class)->withTimestamps();
}
}