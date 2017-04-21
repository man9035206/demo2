
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Blog</div>
                    <div class="panel-body">
                        <form action="{{url('/update',$blog->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" name="content" id="content" class="form-control" cols="50" rows="40" >{{$blog->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="content">Publish-On</label>
                                <input type="date" name="publish-on" id="publish-on" class="form-control" cols="50" rows="40" content value="">
                            </div>

                            <div class="form-group">
                                <label for="title">Featured Image</label>
                                <input type="File" name="avatar" id="avatar" id="avatar" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="title">Tags</label>
                                <select class="form-control tags" name="tags[]" multiple >
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}"
                                                @foreach($blog->tags as $t)
                                                    @if($tag->id == $t->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                        >{{$tag->tags}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="col-md-4 col-lg-offset-4 btn btn-success">Post</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@stop


@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>

@stop
