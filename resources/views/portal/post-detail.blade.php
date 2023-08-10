@extends('portal.app')
@section('sc-css')
<link href="{{url('assets/02-Single-post/css/styles.css')}}" rel="stylesheet">
<link href="{{url('assets/02-Single-post/css/responsive.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="single-post">
    <div class="image-wrapper"><img src="{{url('assets/images/blog_logo.jpg')}}" alt="Blog Image"> </div>

    <div class="icons">
        <div class="left-area">
            <a class="btn caegory-btn" href="#"><b>{{$posts->category->name}}</b></a>
        </div>
        <ul class="right-area social-icons">
            <li><a href="#"><i class="ion-android-textsms"></i>{{count($data['comment'])}} </a></li>
        </ul>
    </div>
    <p class="date"><em>{{date('D, M Y', strtotime($posts->created_at))}}</em></p>
    <h3 class="title"><a href="#"><b class="light-color">{{$posts->title}}</b></a></h3>
    {!! $posts->content !!}

</div>

<div class="post-author">
    <div class="author-image"><img src="{{url($data['user']->image)}}" alt="{{$data['user']->name}}"></div>

    <div class="author-info">
        <h4 class="name"><b class="light-color">{{$data['user']->name}}</b></h4>
        {!! $data['user']->desc !!}
    </div>
</div>

<div class="comment-area">
    <h4 class="title"><b class="light-color">{{count($data['comment'])}} Comments</b></h4>

    @foreach ($data['comment'] as $comment)
    <div class="comment">
        <div class="author-image"><img src="{{url('assets/images/author.jpg')}}" alt="Author Image"></div>
        <div class="comment-info">
            <h5><b class="light-color">{{$comment->name}}</b></h5>
            <h6 class="date"><em>{{date('D, M Y', strtotime($comment->created_at))}}</em> </h6>
            <p>{{$comment->comment}}</p>
        </div>
    </div>  
    @endforeach
</div>

<div class="leave-comment-area">
    <h4 class="title"><b class="light-color">Leave a comment</b></h4>
    <div class="leave-comment">
        <form method="POST" action="{{url('comment')}}">
            @csrf
            <input type="hidden" name="post_id" value="{{$posts->id}}">
            <div class="row">
                <div class="col-sm-6">
                    <input name="name" class="name-input" type="text" placeholder="Name">
                </div>
                <div class="col-sm-6">
                    <input name="email" class="email-input" type="text" placeholder="Email">
                </div>
                <div class="col-sm-6">
                    <input name="subject" class="subject-input" type="text" placeholder="Subject">
                </div>
                <div class="col-sm-12">
                    <textarea class="message-input" name="comment" rows="6" placeholder="Message"></textarea>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-2" type="submit"><b>COMMENT</b></button>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection
