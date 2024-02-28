<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;





    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


     public function createdJobOffers()
{
    return $this->hasMany(JobOffer::class, 'author_id');
}


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }




    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function formations()
{
    return $this->belongsToMany(Formation::class);
}


    public function jobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'job_offer_user', 'user_id', 'job_offer_id')
            ->withPivot('offer_status')
            ->withTimestamps();
    }


    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }



    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id'
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
        'password' => 'hashed',
    ];
}
