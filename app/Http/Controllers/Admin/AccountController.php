<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Account;
use App\Keyword;
use App\Platform;
use App\Category;

class AccountController extends Controller
{
    //
    //List of all added accounts
    function list() {
            //ACTIONS:: Add/Remove/Featured
        $profiles = Account::latest()->paginate(15);
    
        return view('admin.profiles.list')
                ->with('profiles', $profiles);
    }

    function add() {
        $platforms = Platform::all();
        $categories = Category::all();

        return view('admin.profiles.add')
                ->with('platforms', $platforms)
                ->with('categories', $categories);

    }

    function store() {

        request()->validate([
            'handle' => 'required',
            'platform' => 'required',
            'category' => 'required',
        ]);

        $handles = request()->handle;
        $platform = request()->platform;
        $category = request()->category;
                
        $handles = array_unique(explode(',', $handles));

        foreach($handles as $handle) {

                // $twitter = Account::checkExists($handle);
                
                // if(!$twitter)  continue; //return redirect()->back()->with('status', ['type' => 'danger', 'message' => 'Error retrieving account']); 

                // $keyword = Keyword::getKeyword($twitter->description);
                // $category = ($keyword !== null) ? $keyword->category->id : 6;
                
                if($platform == 3) { //if both is selected
                    Account::firstOrCreate(
                        [
                            'handle' => $handle, 
                            'platform_id' => 1, 
                        ],
                        [
                        'handle' => $handle, 
                        'platform_id' => 1, 
                        'category_id' => $category,
                    ]);                        
                    Account::firstOrCreate(
                        [
                            'handle' => $handle, 
                            'platform_id' => 1, 
                        ],
                        [
                        'handle' => $handle, 
                        'platform_id' => 2, 
                        'category_id' => $category,
                    ]);        
                } else {
                    Account::firstOrCreate(
                        [
                            'handle' => $handle, 
                            'platform_id' => 1, 
                        ],
                        [
                        'handle' => $handle, 
                        'platform_id' => $platform, 
                        'category_id' => $category,
                    ]);    
                }
        }
        
      return redirect()->route('admin.profiles')->with('status', ['type' => 'success', 'message' => 'Profiles added successfully!']);

    }

    public function edit() {
        $id = request()->id;
        $profile = Account::find($id);
        $platforms = Platform::all();
        $categories = Category::all();

        if(!$profile) return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Profile not found']);


        return view('admin.profiles.edit')
                 ->withProfile($profile)
                 ->withCategories($categories)
                 ->withPlatforms($platforms);
    }

    public function update() {

        $id = request()->id;
        $profile = Account::find($id);

        if(!$profile) return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Profile not found']);

        $profile->handle = request()->handle;
        $profile->category_id = request()->category;
        $profile->platform_id = request()->platform;

        $profile->update();
        return redirect()->route('admin.profiles')->with('status', ['type' => 'success', 'message' => 'Profiles updated successfully!']);
    }

    public function delete() {
        $id = request()->id;
        $profile = Account::find($id);

        if(!$profile) return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Profile not found']);

        $profile->delete();

        return redirect()->back()->with('status', ['type' => 'success', 'message' => 'Profile deleted successfully!']);
    }
 }
