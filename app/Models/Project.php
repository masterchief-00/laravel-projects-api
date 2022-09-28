<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='projects';
    protected $fillable=[
        'name',
        'slug',
        'category_id',
        'discription',
        'initial_date',
        'completion_date',
        'images',
        'project_image',
        'links'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
