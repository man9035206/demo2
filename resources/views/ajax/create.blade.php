@extends('layouts.app')

@section('content')
    <div class="form-group row add">
        <div class="col-md-7 col-md-offset-1">
            <input type="text" class="form-control" id="name" name="name"
                   placeholder="Enter some name" required>
            <input type="text" class="form-control" id="age" name="age"
                   placeholder="Enter age" required>
            <p class="error text-center alert alert-danger hidden"></p>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" type="submit" id="add">
                <span class="glyphicon glyphicon-plus"></span> ADD
            </button>
        </div>
    </div>
    {{--Display data without refresh the page--}}
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Age</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->age}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-name="{{$item->name}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger" data-id="{{$item->id}}"
                                data-name="{{$item->name}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button></td>
                </tr>
            @endforeach
        </table>
    </div>
    {{--Modal--}}

    {{ csrf_field() }}
@endsection
