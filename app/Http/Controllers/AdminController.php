<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function register()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "_" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $files);
            $requests['image'] = "file/admin/" . $files;
        }

        $user = User::create($requests);
        if ($user) {
            return redirect('register')->with('status', 'Berhasil mendaftar!');
        }

        return redirect('register')->with('status', 'Gagal mendaftar!');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $requests = $request->all();
        $data = User::where('email', $requests['email'])->first();
        $cek = Hash::check($requests['password'], $data->password);
        if ($cek) {
            Session::put('admin', $data->email);
            Session::put('admin_id', $data->id);
            return redirect('admin');
        }
        return redirect('login')->with('status', 'Gagal login admin!');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('status', 'Berhasil logout!');
    }




    public function edit($id){
        $data=User::find($id);

        return view('admin.profile.edit',compact('data'));

    }

    public function update(Request $request,$id)
    {
        $d=User::find($id);
        if($d==null){
            return redirect('admin')->with('status','Data Tidak Ditemukan');
        }

        $req=$request->all();
        if($request->hasFile('image')){
            if($d->image !== null){
                File::delete("$d->image");
            }
            $user=Str::random("20")."-". $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/",$user);
            $req['image']="file/admin/".$user;
        }
        
        $req['password']=Hash::make($request->password);
    
        $data=user::find($id)->update($req);
        if($data){
            return redirect('admin')->with('status', 'profil berhasil diedit');
        }
        return redirect('admin')->with('status', 'profil  gagal diedit');
        

    }

}
