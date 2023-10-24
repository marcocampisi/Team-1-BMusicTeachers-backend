<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SponsorizationTeacher extends Pivot
{
    protected $fillable = ['sponsored_start', 'sponsored_until', 'sponsorization_id', 'teacher_id'];


    public function sponsorization()
    {
        return $this->belongsTo(Sponsorization::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
