@extends('portal.app')
@section('sc-css')
<link href="assets/01-homepage/css/styles.css" rel="stylesheet">
<link href="assets/01-homepage/css/responsive.css" rel="stylesheet">
@endsection
@section('slider')
<div class="main-slider">
    <div id="slider">

        @foreach ($data['sliders'] as $slider)
            <div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
                <img src="{{url($slider->image)}}" class="ls-bg" alt=""/>
                <div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                    <a class="btn" href="{{url($slider->url)}}">{{$slider->category->name}}</a>
                    <h3 class="title"><b>{{$slider->title}}</b></h3>
                    <h6>{{date('d, M Y', strtotime($slider->created_at))}}</h6>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection

@section('content')
@foreach ($data['headline'] as $headline)
    {{--  Headline  --}}

    <div class="single-post">
        <div class="image-wrapper"><img src="{{url($headline->thumbnail)}}" alt="Blog Image"></div>

        <div class="icons">
            <div class="left-area">
                <a class="btn caegory-btn" href="{{url('category/'.$headline->category->id)}}"><b>{{$headline->category->name}}</b></a>
            </div>
        </div>
        <p class="date"><em>{{date('D, M Y', strtotime($headline->created_at))}}</em></p>
        <h3 class="title"><a href="{{url('post-detail/'.$headline->id)}}"><b class="light-color">{{$headline->title}}</b></a></h3>
        <p>{!! substr(($headline->content), 0,300) !!}</p>
        <a class="btn read-more-btn" href="{{url('post-detail/'.$headline->id)}}"><b>READ MORE</b></a>
    </div>
@endforeach

<div class="row">
    @foreach ($data['latestposts'] as $posts)
    <div class="col-lg-6 col-md-12">
        <div class="single-post">
            <div class="image-wrapper"><img src="{{url($posts->thumbnail)}}" alt="Blog Image"></div>
            <div class="icons">
                <div class="left-area">
                    <a class="btn caegory-btn" href="{{url('category/'.$posts->category->id)}}"><b>{{$posts->category->name}}</b></a>
                </div>
            </div>
            <h6 class="date"><em>{{date('D, M Y', strtotime($posts->created_at))}}</em></h6>
            <h3 class="title"><a href="{{url('post-detail/'.$posts->id)}}"><b class="light-color">{{$posts->title}}</b></a></h3>
            <p>{!! substr($posts->content, 0, 300).(strlen($posts->content)>300 ? "..." : "") !!}</p>
            <a class="btn read-more-btn" href="{{url('post-detail/'.$posts->id)}}"><b>READ MORE</b></a>
        </div>
    </div>
        
    @endforeach
</div>
@endsection
