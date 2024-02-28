<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'company_id',
        'secteur_id',
        // 'location',
        'type',
        'salary',
        'start_date',
        'end_date',
        'author_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'job_offer_user', 'job_offer_id', 'user_id')
            ->withPivot('offer_status')
            ->withTimestamps();
    }



}
