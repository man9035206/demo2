<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Contact</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand text-uppercase" href="#">
                My contact
            </a>
        </div>
        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <div class="nav navbar-right navbar-btn">


            </div>
        </div>
    </div>
</nav>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">All Contact <span class="badge">10</span></a>
                <a href="" class="list-group-item">Family <span class="badge">4</span></a>
                <a href="" class="list-group-item">Friends <span class="badge">3</span></a>
                <a href="" class="list-group-item">Other <span class="badge">3</span></a>
            </div>
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Add Contact</strong>
                </div>
                {!! Form::open(['route' =>'contacts.store','method'=>'post']) !!}
                {{ csrf_field() }}
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class="control-label col-md-3">Name</label>
                                    <div class="col-md-8">
                                        {!! Form::text("name",null,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="company" class="control-label col-md-3">Company</label>
                                    <div class="col-md-8">
                                        {!! Form::text("company",null,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label col-md-3">Email</label>
                                    <div class="col-md-8">
                                        {!! Form::text("email",null,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="control-label col-md-3">Phone</label>
                                    <div class="col-md-8">
                                        {!! Form::text("phoneNumber",null,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="group" class="control-label col-md-3">Group</label>
                                    <div class="col-md-5">
                                        {!! Form::select("group_id",$groups,['class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <a href="#" id="add-group-btn" class="btn btn-default btn-block">Add Group</a>
                                    </div>
                                </div>
                                <div class="form-group" id="add-new-group">
                                    <div class="col-md-offset-3 col-md-8">
                                        <div class="input-group">
                                            <input type="text" name="new_group" id="new_group" class="form-control">
                                            <span class="input-group-btn">
                                            <a href="#" id="add-new-button" class="btn btn-default">
                              <i class="glyphicon glyphicon-ok"></i>
                            </a>
                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                        <img src="http://placehold.it/150x150" alt="Photo">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div class="text-center">
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Choose Photo</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="#" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jasny-bootstrap.min.js"></script>
<script>
    $("#add-new-group").hide();
    $('#add-group-btn').click(function () {
        $("#add-new-group").slideToggle(function() {
            $('#new_group').focus();
        });
        return false;
    });

    $('#add-new-button').click(function () {
        var newGroup=$('#new_group');
        $.ajax({
            url : "{{route('groups.store')}}",
            method: 'post',
            data: {
                name: $('#new_group').val(),
                _token:$("input[name=_token]").val()
            },
            success: function (response) {
                if(response.success==true)
                {
                    var inputGroup =   newGroup.closest('.input-group');
                    inputGroup.removeClass('has-error');
                    inputGroup.next('.text-danger').remove();
                    $("select[name=group_id]")
                        .append($("<option></option>")
                        .attr("value",response.group.id)
                        .attr("selected",true)
                        .text(response.group.name));

                    newGroup.val("");
                }
            },
            error: function (xhr) {
                var errors =xhr.responseJSON;
                var error = errors.name[0];

                if (error)
                {
                    var  inputGroup=newGroup.closest('.input-group');
                    inputGroup.next('.text-danger').remove();
                    inputGroup. addClass('has-error')
                        .after('<p class="text-danger">'+ error + '</p>');
                }
            }
        })
    })
</script>
</body>
</html>