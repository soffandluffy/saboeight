<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ArticleCategory;
Use Alert;

class ArticleCategoryController extends Controller
{
    //
    public function index(){
    	$breadcrumbs = [
            ['link' => "admin", 'name' => "Admin"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "Category"],
        ];
        $pageConfigs = ['pageHeader' => true];

        $categories = ArticleCategory::all();

    	return view('admin.blog.category.index',
    		['breadcrumbs' => $breadcrumbs],
            ['pageConfigs' => $pageConfigs],
    	)->with('categories', $categories);
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required|unique:article_categories|max:255'
        ]);

        $artcategory = ArticleCategory::create([
            'name' => $request->name
        ]);

        Alert::success('Success', 'Category added');
        return redirect()->back();

    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required|unique:article_categories|max:255'
        ]);

        $artcategory = ArticleCategory::find($id)->update([
            'name' => $request->name
        ]);

        Alert::success('Success', 'Category updated');
        return redirect()->back();

    }

    public function delete($id){

        $artcategory = ArticleCategory::findOrFail($id);
        $artcategory->delete();

        Alert::success('Success', 'Category deleted');
        return redirect()->back();

    }


}
