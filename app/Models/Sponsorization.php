<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration'
    ];

    public function teacher() {
        return $this->belongsToMany(Teacher::class);
    }

}
