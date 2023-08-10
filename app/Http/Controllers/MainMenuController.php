<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenu;
use App\Models\Posts;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class MainMenuController extends Controller
{
    //

    public function index()
    {
        $data=MainMenu::get();
        return view('admin.mainmenu.index', compact('data'));
    }

    public function create()
    {
        $parent=MainMenu::get();

        return view('admin.mainmenu.create', compact('parent'));
    }

    public function insert(Request $request)
    {
        $request->validate(MainMenu::$rules);
        $requests =$request->all();
        $requests['file']="";
        if($request->hasFile('file')){
            $files=Str::random("20")."-". $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/",$files);
            $requests['file']="file/mainmenu/".$files;
        }
        $cat=MainMenu::create($requests);
        if($cat){
            return redirect('admin/mainmenu')->with('status', 'Berhasil menambah data!');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal menambahh data!');
    }

    public function edit($id){
        $data=MainMenu::find($id);
        $parent=MainMenu::get();
        return view('admin.mainmenu.edit',compact('data'),compact('parent'));

    }

    public function update(Request $request,$id)
    {
        $d=MainMenu::find($id);
        if($d==null){
            return redirect('admin/mainmenu')->with('status','Data Tidak Ditemukan');
        }

        $req=$request->all();
        if($request->hasFile('file')){
            if($d->file !== null){
                File::delete("$d->file");
            }
            $mainmenu=Str::random("20")."-". $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/",$mainmenu);
            $req['file']="file/mainmenu/".$mainmenu;
        }
        
        $data=mainmenu::find($id)->update($req);
        if($data){
            return redirect('admin/mainmenu')->with('status', 'Main Menu berhasil diedit');
        }
        return redirect('admin/mainmenu')->with('status', 'Main Menu  gagal diedit');
        

    }

    public function delete($id)
    {
        $data=MainMenu::find($id);
        if($data==null)
        {
            return redirect('admin/mainmenu')->with('status', 'Data Tidak Ditemukan');
        }

        if($data->file != null || $data->file != "")
        {
            File::delete("$data->file");
        
        }

        $delete=$data->delete();
        if($delete)
        {
            return redirect('admin/mainmenu')->with('status', 'Data Berhasil Dihapus');
        }
        return redirect('admin/mainmenu')->with('status', 'Data Gagal Dihapus');

    }
}
