@extends('layouts.app')

@section('content')
<div class="col-lg-4">
    {{ Form::open((array('url'=> ' ','files'=>true))) }}
        <div class="form-group">
            <label for="">Category</label>
            <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Sub Category</label>
            <select class="form-control" name="subcategory" id="sub_cat">

                <option value=""></option>
            </select>
        </div>
    {{Form::close()}}
</div>
@endsection