@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">

                    <div class="">
                        <h2 class="">{{$singleBlog->title}}</h2>
                        <h3 class="">{!! $singleBlog->content !!}</h3>
                        <h4>{{$singleBlog->slug}}</h4>
                        <hr style="color: #72ffb3;">

                    </div>
                    <a href="{{ url('/nextblog',$next->id->slug) }}" class="btn btn-danger">Previous</a>
            </div>
        </div>
    </div>
@endsection