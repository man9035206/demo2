@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                @foreach($blogs as $blog)
                    <div class="">
                        <h2 class="">{{$blog->title}}</h2>
                        <h3 class="">{!! $blog->content !!}</h3>
                        <a class="btn btn-info" href="{{url('edit',$blog->id)}}">Edit</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection