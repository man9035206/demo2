@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                @foreach($blogs as $blog)
                    <div class="">
                        <h2 class=""><A href="{{url('singleBlog',$blog->slug)}}">{{$blog->title}}</A></h2>
                        <h3 class="">{!! $blog->content !!}</h3>
                        <h4>{{$blog->slug}}</h4>
                        <h3>Tags:
                            @foreach($blog->tags as $t)

                                {{$t->tags}},

                            @endforeach
                        </h3>
                        <hr style="color: #72ffb3;">
                        <a class="btn btn-info" href="{{url('edit',$blog->slug)}}">Edit</a>
                       {{-- <form id="formDeleteBlog" action="AdminProductsController@destroy', $blog->id" method="delete">
                            <button type="submit" id="btnDeleteBlog" data-id="{{$blog->id}}"></button>
                        </form>--}}
                        <button class="btn btn-danger deleteBlog" data-id="{{ $blog->id }}" data-token="{{ csrf_token() }}" >Delete</button>
                        <a href=""></a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@section('ajaxScrit')
    <script src="/js/item-ajax.js"></script>
    @stop