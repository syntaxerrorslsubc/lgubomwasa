<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_list;

class CategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
{
        $category_lists=Category_list::orderby('id')->paginate(10);
        return view('Admin/category.index', [
            'category_lists'=>$category_lists
        ]);
    }

    public function add_category(){
        return view('Admin/category.add_category');
    }

    public function saveCategory(Request $request) {

        $cat = new Category_list;
        $cat->name = $request->name;
        $cat->rate = $request->rate;
        $cat->minimum = $request->minimum;
                
        if($cat->save()){
            return redirect()->route('admincategory')->with('Success','Category has been created successfully.');
        }
             
    }

    public function edit_category(Request $request)
        {
            $category=Category_list::where('id', $request->id)->first();
    
             return view('Admin/category.edit_category',[
                 'category'=>$category
             ]);
        }

        public function updateCategory(Request $request)
         {
                $storeCategory =Category_list::where('id', $request->id)->first(); 
                $storeCategory->name = $request->name;
                $storeCategory->rate = $request->rate;
                $storeCategory->minimum = $request->minimum;
                
                if($storeCategory->save()){
                    return redirect()->route('admincategory')->with('success', 'Category has been updated successfully.');

                }
        }

     public function view_category($id)
    {
        $category = category_list::find($id);

        return view('Admin/category.view_category', compact(
            'category'));
        return response()->json($category);
    }

    public function deleteCategory($id)
    {
        $category = Category_list::find($id);

        if ($category) {
        // Delete the category record
        $category->delete();
    }

        return view('Admin/category.index', compact(
            'category'));
        return response()->json(['message' => 'Category record deleted.']);

    }
}