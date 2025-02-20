<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'image', 'user_id'];

    // Relationship: A project belongs to a freelancer (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A project has many images
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
