<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=[
        'name',
        'slug',
        'category',
        'discription',
        'initial_date',
        'completion_date',
        'images',
        'project_image',
        'market_links'
    ];
}
