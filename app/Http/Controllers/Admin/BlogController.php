<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\ArticleCategory;
use Alert;

class BlogController extends Controller
{
    //
    public function index(){

        $articlelist = Article::orderBy('created_at','desc')->get();

    	$breadcrumbs = [
            ['link' => "admin/dashboard", 'name' => "Admin"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "Index"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
    	return view('admin.blog.index',
            ['pageConfigs' => $pageConfigs],
    		['breadcrumbs' => $breadcrumbs]
    	)->with('articlelist', $articlelist);
    }

    public function add(){

        $categories = ArticleCategory::all();

        $pageConfigs = ['pageHeader' => true];
    	return view('admin.blog.add', 
    		['categories' => $categories]
    	);
    }

    public function store(Request $request){

        $validate = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        // Upload Image
        if ($request->hasFile('imageurl')) {

            $imageName = time().'.'.$request->imageurl->getClientOriginalExtension();
            $request->imageurl->move(public_path('images/articles'), $imageName);

        } else {

            $imageName = 'defaultimage.png';

        }

        $article = Article::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'imageurl' => $imageName,
            'content' => request('article-trixFields.content'),
            'publishedAt' => now(),
            'author' => auth()->user()->id,
        ]);

        Alert::success('Success', 'Article added');
        return redirect()->route('admin.blog.index');

    }

    public function edit($id){

        $article = Article::findOrFail($id);
        $categories = ArticleCategory::all();

    	$breadcrumbs = [
            ['link' => "admin", 'name' => "Admin"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "Edit"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
    	return view('admin.blog.edit', 
    		['article' => $article],
            ['categories' => $categories],
            ['pageConfigs' => $pageConfigs],
    		['breadcrumbs' => $breadcrumbs]
    	);
    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'imageurl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $article = Article::findOrFail($id);

        // Upload Image
        if ($request->hasFile('imageurl')) {

            if ($request->imageurl != $article->imageurl) {
                $imagePath = 'images/articles/'.$article->imageurl;
                if ($news->imageurl != 'defaultimage.png') {
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
                $imageName = time().'.'.$request->imageurl->getClientOriginalExtension();
                $request->imageurl->move(public_path('images/articles'), $imageName);
            } else {
                $imageName = $article->imageurl;
            }

        } else {

            $imageName = 'defaultimage.png';

        }

        $article->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'imageurl' => $imageName,
            'content' => $request->content,
            'updatedAt' => now(),
        ]);

        Alert::success('Success', 'Article updated');
        return redirect()->route('admin.blog.index');

    }

    public function delete($id){

        $article = Article::findOrFail($id);
        $imagePath = 'images/articles/'.$article->imageurl;
        if ($article->imageurl != 'defaultimage.png') {
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $article->delete();

        Alert::success('Success', 'Article deleted');
        return redirect()->route('admin.blog.index');

    }

    public function draft($id){

        Article::findOrFail($id)->update([
            'status' => 2,
            'publishedAt' => null,
        ]);

        Alert::success('Success', 'Article drafted');
        return redirect()->route('admin.blog.index');

    }

    public function publish($id){

        Article::findOrFail($id)->update([
            'status' => 1,
            'publishedAt' => now(),
        ]);

        Alert::success('Success', 'Article published');
        return redirect()->route('admin.blog.index');
    }

}
