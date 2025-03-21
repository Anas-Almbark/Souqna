<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function supports()
    {
        return $this->hasMany(Support::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function isActive()
    {
        return !$this->identity && !$this->contacts->first()?->phone_primary && !$this->location;
    }


    public function isVerified(){
        return $this->verified;
    }
    public function isAdmin()
    {
        return !$this->role == 'user';
    }
    public function receivedNotifications()
    {
        return $this->hasMany(Notification::class, 'receiver_id');
    }
    public function sentNotifications()
    {
        return $this->hasMany(Notification::class, 'sender_id');
    }
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function isFollowing($userId)
    {
        return $this->following()->where('following_id', $userId)->exists();
    }
}
