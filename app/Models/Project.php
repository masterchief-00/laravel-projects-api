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

    /**
     * Get the instance of the user visits
     *
     * @return \Awssat\Visits\Visits
     */
    public function visitsCounter()
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     * 
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function visits()
    {
        return visits($this)->relation();
    }

}
