@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                @foreach($blogs as $blog)
                    <div class="">
                        <h2 class=""><A href="{{url('singleBlog',$blog->slug)}}">{{$blog->title}}</A></h2>
                        <h5 class="">{!! $blog->content !!}</h5>
                        <h4>{{$blog->slug}}</h4>
                        <h3>Tags:
                            @foreach($blog->tags as $t)
                                {{$t->tags}},
                            @endforeach
                        </h3>
                        <hr style="color: #72ffb3;">
                        <a class="btn btn-info" href="{{url('edit',$blog->slug)}}">Edit</a>
                        <button class="btn btn-danger deleteBlog" data-id="{{ $blog->id }}" data-token="{{ csrf_token() }}" >Delete</button>
                        <a class=" btn btn-success" id="reply">Reply</a>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-0">
                            <input type="text" class="form-control" id="addComment">
                        </div>
                    </div>
                    <div class="comments">

                    </div>

                @endforeach
            </div>
        </div>
    </div>


@endsection

@section('ajaxScrit')
    <script src="/js/item-ajax.js"></script>
    @stop