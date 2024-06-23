<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'type',
        'username',
        'email',
        'password',
        'parent_id',
        'is_online',
        'status',
        'has_plan',
        'ip_address',
        'hashed_username'
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

    public function findByEmail($email)
    {
        return self::where('email',$email)->first();
    }

    public function findById($id)
    {
        return self::with(['parentUser'])->where('id',$id)->first();
    }

    public function plans()
    {
        return $this->hasMany(UserMembership::class,'user_id','id');
    }

    public function parentUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'parent_id');
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class,'user_id','id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    // Recursive function to retrieve descendants
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function payments()
    {
        return $this->hasMany(UserPayment::class,'user_id','id');
    }
}
