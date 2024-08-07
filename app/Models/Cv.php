<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_image', 'name', 'title', 'profile', 'projects', 'education', 'skills', 'co_curricular', 'email', 'phone', 'location', 'linkedin', 'category',
    ];
    
}

