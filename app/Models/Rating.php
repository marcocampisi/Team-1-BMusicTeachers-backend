<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'rating_id',
        'created_at', 
        'updated_at'
    ];

    public function teachers() {
        return $this->belongsToMany(Teacher::class);
    }
}
