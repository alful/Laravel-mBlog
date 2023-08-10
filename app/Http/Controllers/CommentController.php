<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function insert(Request $request)
    {
        $request->validate(Comment::$rules);
        $request =$request->all();
        $cat=Comment::create($request);
        if($cat){
            return redirect('comment')->with('status', 'Berhasil Comment!');
        }
        return redirect('comment')->with('status', 'Gagal Comment!');
    }

}
