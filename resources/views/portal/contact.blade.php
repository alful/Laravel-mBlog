@extends('portal.app')
@section('sc-css')
<link href="assets/02-Single-post/css/styles.css" rel="stylesheet">
<link href="assets/02-Single-post/css/responsive.css" rel="stylesheet">
@endsection

@section('content')

<div class="single-post">
    <div class="image-wrapper"><img src="{{url('assets/images/blog_logo.jpg')}}" alt="Blog Image"> </div>

    <h3 class="title"><b class="light-color">Contact Me</b></h3>
    <p class="desc"> Jika mengalami masalah saat mengakses website, ada kekeliruan dalam isi konten atau memiliki kritik dan saran harap Kontak kami segera, Terima Kasih</p>

</div>

<div class="leave-comment-area">
    <h4 class="title"><b class="ligth-color">Leave a Comment</b></h4>
    <div class="leave-comment">
        <form method="POST" action="{{url('contact')}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <input class="name-input" type="text" placeholder="Name" name="name">
                </div>
                <div class="col-sm-6">
                    <input class="email-input" type="email" placeholder="Email" name="email">
                </div>
                <div class="col-sm-6">
                    <input class="subject-input" type="text" placeholder="Subject" name="subject">
                </div>
                <div class="col-sm-12">
                    <textarea class="message-input" rows="6" placeholder="Message" name="message"></textarea>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-2"><b>Comment</b></button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection
