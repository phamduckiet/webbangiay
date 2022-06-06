@extends('client.share.master')
@section('content')
<section class="section-padding-1_7 border-bottom">
    <div class="container">
        <div class="row">
            @foreach ($data as $key => $value)
            <div class="col-lg-4 col-sm-6">
                <div class="category-single category--img">
                    <figure class="category--img4">
                        <img src="{{$value->image_category}}" alt="">
                        <figcaption class="overlay-bg">
                                <div>
                                    <span><a style="padding: 10px" class="badge badge-pill badge-warning" href="/{{$value->id}}">--- {{$value->name_category}} ---</a></span>
                                </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

            @endforeach
        </div>
    </div>
@endsection
