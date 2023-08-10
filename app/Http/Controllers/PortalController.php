<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Sliders;
use App\Models\User;
use App\Models\Comment;
use App\Models\MainMenu;

class PortalController extends Controller
{
    //
    public function index()
    {
        $data['sliders']        = Sliders::where('status',1)->get();
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['headline']       = Posts::where('status',1)->where('is_headline',1)->get();
        $data['user']           = User::first();
        $data['category']       = Category::get();

        return view('portal.index',compact('data'));
    }

    public function about()
    {
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.about',compact('data'));

    }

    public function contact()
    {
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.contact',compact('data'));

    }

    public function post()
    {
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        return view('portal.post',compact('data'));

    }

    public function postDetail($id)
    {
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['comment']        = Comment::where('post_id',$id)->get();
        $data['user']           = User::first();
        $posts                  = Posts::find($id);
        return view('portal.post-detail',compact('posts','data'));

    }

    public function menu($id)
    {
        $data['posts']          = Posts::where('status',1)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        $data['menu']           = MainMenu::find($id);

        return view('portal.menu',compact('data'));

    }

    public function category($id)
    {
        $data['posts']          = Posts::where('status',1)->where('category_id',$id)->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();

        return view('portal.category',compact('data'));

    }

    public function search(Request $request)
    {
        $data['posts']          = Posts::where('status',1)->where('title','LIKE','%'.$request->search.'%')->orWhere('content','LIKE','%'.$request->search.'%') ->get();
        $data['latestposts']    = Posts::where('status',1)->limit(5)->get();
        $data['category']       = Category::get();
        $data['user']           = User::first();
        

        return view('portal.search',compact('data'));

    }


}
