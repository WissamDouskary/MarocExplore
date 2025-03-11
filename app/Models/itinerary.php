<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itinerary extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'categorie', 'duration', 'image', 'destinations-list'];
}
