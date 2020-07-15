<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilterCategories extends Model
{
    //

    protected $fillable = ['name', 'slug', 'parent_id'];
    protected $table = 'filter_categories';

    
    public function profile() {
        return $this->belongsTo(Account::class);
    }

    public function keywords() {
        return $this->hasMany(Keyword::class, 'category_id');
    }

    public function parent() {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
//        return Category::where('parent_id', $this->id);
    }
}
