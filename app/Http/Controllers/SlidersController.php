<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Posts;

class SlidersController extends Controller
{
    //

    public function index()
    {
        $data=Sliders::get();
        $categ=Category::get();

        return view('admin.sliders.index', compact('data'),compact('categ'));
    }

    public function create()
    {
        $parent=Posts::get();
        $categ=Category::get();
        // return view('admin.sliders.create');

        return view('admin.sliders.create',compact('categ'));
    }

    public function insert(Request $request)
    {
        $request->validate(Sliders::$rules);
        $requests =$request->all();
        $requests['image']="";
        if($request->hasFile('image')){
            $files=Str::random("20")."-". $request->image->getClientOriginalName();
            $request->file('image')->move("file/sliders/",$files);
            $requests['image']="file/sliders/".$files;
        }
        $cat=Sliders::create($requests);
        if($cat){
            return redirect('admin/sliders')->with('status', 'Berhasil menambah data!');
        }
        return redirect('admin/sliders')->with('status', 'Gagal menambahh data!');
    }

    public function edit($id){
        $data=Sliders::find($id);
        $category=Category::get();
        return view('admin.sliders.edit',compact('data'),compact('category'));

    }

    public function update(Request $request,$id)
    {
        $d=Sliders::find($id);
        if($d==null){
            return redirect('admin/sliders')->with('status','Data Tidak Ditemukan');
        }

        $req=$request->all();
        if($request->hasFile('image')){
            if($d->image !== null){
                File::delete("$d->image");
            }
            $sliders=Str::random("20")."-". $request->image->getClientOriginalName();
            $request->file('image')->move("file/sliders/",$sliders);
            $req['image']="file/sliders/".$sliders;
        }
        
        $data=sliders::find($id)->update($req);
        if($data){
            return redirect('admin/sliders')->with('status', 'Slider berhasil diedit');
        }
        return redirect('admin/sliders')->with('status', 'Slider  gagal diedit');
        

    }

    public function delete($id)
    {
        $data=Sliders::find($id);
        if($data==null)
        {
            return redirect('admin/sliders')->with('status', 'Data Tidak Ditemukan');
        }

        if($data->image != null || $data->image != "")
        {
            File::delete("$data->image");
        
        }

        $delete=$data->delete();
        if($delete)
        {
            return redirect('admin/sliders')->with('status', 'Data Berhasil Dihapus');
        }
        return redirect('admin/sliders')->with('status', 'Data Gagal Dihapus');

    }
}

