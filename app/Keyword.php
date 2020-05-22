<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

    //
    protected $fillable = ['tag', 'category_id'];

    public static function getKeyword($bio) {
        $keywords = explode(' ', $bio);

        $query = Keyword::with('category')->select('*');
        foreach($keywords as $keyword) {
            $keyword =  preg_replace('/[^a-zA-Z]/', '', $keyword);
            $query->orWhere('tag', 'like', $keyword);
        }
        
        $keyword = $query->first();

        return $keyword;
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public static function populate($category, $keywords) {
        $category = Category::where('name', $category)->first();
        
        $keywords = explode(',', $keywords);

        foreach($keywords as $keyword) {
            Keyword::create([
                'tag' => $keyword,
                'category_id' => $category->id,
            ]);
        }

        return true;
    }

}
