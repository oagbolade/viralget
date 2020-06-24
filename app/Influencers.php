<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Influencers extends Model
{
    protected $fillable = ['handle', 'platfrom_id', 'category_id', 'engagement_rate', 'followers', 'gender', 'location'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
} 
