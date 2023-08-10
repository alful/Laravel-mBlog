<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $data=Message::get();
        return view('admin.message.index', compact('data'));
    }

    public function insert(Request $request)
    {
        $request->validate(Message::$rules);
        $request =$request->all();
        $cat=Message::create($request);
        if($cat){
            return redirect('contact')->with('status', 'Berhasil Mengirim!');
        }
        return redirect('contact')->with('status', 'Gagal Mengirim!');
    }

}
