@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">


                          <input type="text" class="form-control" id="nmberOfElements">
                          <button class="btn btn-success" onclick="addElemnts()">Add</button>

                        <form method="post" action="{{url('storeOptions')}}">
                            {{ csrf_field() }}
                          <button type="submit" class="btn btn-success">Store Options</button>
                          <div id="container2"></div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function addElemnts() {
            var data = document.getElementById("nmberOfElements");
            var container = document.getElementById("container2");
            var count=data.value;
            var inputs="";
            for (var i=0;i<count;i++)
            {
                inputs = inputs + '<input type="text"   name="options[]" id ="'+i+'" placeholder=" '+i+'"> ' +
                    '<button type="button" id="'+i+'" onclick="removeEle(this)">remove</button> <br>';
            }
            container.innerHTML = inputs;
        }
    </script>
@endsection
