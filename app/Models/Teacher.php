<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'cv',
        'photo',
        'phone',
        'service'
    ];

    protected $appends = [
        'full_photo_img'
    ];

    /*
        Custom attributes
    */

    public function getFullPhotoImgAttribute()
    {
        if($this->photo){
            return asset('storage/'. $this->photo);
        }
        return null;
    }


    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }

    public function sponsorization() {
        return $this->belongsToMany(Sponsorization::class);
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
