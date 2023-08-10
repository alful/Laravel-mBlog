<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    //

    public function index()
    {
        $data=Posts::get();
        return view('admin.posts.index', compact('data'));
    }

    public function create()
    {
        $category=Category::get();
        return view('admin.posts.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate(Posts::$rules);
        $requests =$request->all();
        $requests['thumbnail']="";
        if($request->hasFile('thumbnail')){
            $files=Str::random("20")."-". $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/posts/",$files);
            $requests['thumbnail']="file/posts/".$files;
        }
        $cat=Posts::create($requests);
        if($cat){
            return redirect('admin/posts')->with('status', 'Berhasil menambah data!');
        }
        return redirect('admin/posts')->with('status', 'Gagal menambahh data!');
    }

    public function edit($id){
        $data=Posts::find($id);
                $category=Category::get();

        return view('admin.posts.edit',compact('data'),compact('category'));

    }

    public function update(Request $request,$id)
    {
        $d=Posts::find($id);
        if($d==null){
            return redirect('admin/posts')->with('status','Data Tidak Ditemukan');
        }

        $req=$request->all();
        if($request->hasFile('thumbnail')){
            if($d->thumbnail !== null){
                File::delete("$d->thumbnail");
            }
            $posts=Str::random("20")."-". $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/posts/",$posts);
            $req['thumbnail']="file/posts/".$posts;
        }
        
        $data=posts::find($id)->update($req);
        if($data){
            return redirect('admin/posts')->with('status', 'posts berhasil diedit');
        }
        return redirect('admin/posts')->with('status', 'posts  gagal diedit');
        

    }

    public function delete($id)
    {
        $data=Posts::find($id);
        if($data==null)
        {
            return redirect('admin/posts')->with('status', 'Data Tidak Ditemukan');
        }

        if($data->thumbnail != null || $data->thumbnail != "")
        {
            File::delete("$data->thumbnail");
        
        }

        $delete=$data->delete();
        if($delete)
        {
            return redirect('admin/posts')->with('status', 'Data Berhasil Dihapus');
        }
        return redirect('admin/posts')->with('status', 'Data Gagal Dihapus');

    }
}
