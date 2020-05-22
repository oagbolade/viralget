<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Keyword;
use App\Category;

class KeywordController extends Controller
{
    //
    function list() {

        $keywords = Keyword::paginate(15);

        return view('admin.keywords.list')
                ->with('keywords', $keywords);
    }

    function add() {
        $categories = Category::all();
        return view('admin.keywords.add')
                ->with('categories', $categories);
    }

    function store() {

        request()->validate([
            'keywords' => 'required',
            'category' => 'required',
        ]);

        $keywords = explode(',', request()->keywords);

        foreach($keywords as $keyword) {
            Keyword::firstOrCreate([
                'tag' => $keyword, 
                'category' => request()->category, 
            ]);    
        }
                
        
        return redirect()->route('admin.keywords')->with('status', ['type' => 'success', 'message' => 'keywords added successfully!']);

    }

}
