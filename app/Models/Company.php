<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'website',
        "city_id"
    ];

    public function jobOffers()
{
    return $this->hasMany(JobOffer::class);
}

    public function user()
    {
        return $this->hasOne(User::class);
    }


public function city()
{
    return $this->belongsTo(City::class);
}


}
