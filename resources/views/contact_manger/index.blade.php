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
                <a href="{{url('add-contact')}}" class="btn btn-default">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Contact
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php  $selected_group = Request::get('group_id') ?>
                <a href="{{route('contacts.index')}}" class="list-group-item {{empty($selected_group) ?  'active' : ''}}">All Contact <span class="badge">{{$contacts->count()}}</span></a>
                @foreach(App\Group::all() as $group)
                <a href="{{route('contacts.index',['group_id'=>$group->id])}}" class="list-group-item {{$selected_group ==$group->id ? 'active' : '' }}">{{$group->name}} <span class="badge">{{$group->contacts->count()}}</span></a>
                @endforeach
            </div>
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
            <div class="panel panel-default">
                <table class="table">
                    @foreach($contacts as $c)
                    <tr>
                        <td class="middle">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/100x100" alt="...">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">{{$c->name}}</h4>
                                    <address>
                                        <strong>{{$c->company}}</strong><br>
                                        {{$c->email}}
                                    </address>
                                </div>

                            </div>
                        </td>
                        <td width="100" class="middle">
                            <div>
                                <a href="#" class="btn btn-circle btn-default btn-xs" title="Edit">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a href="#" class="btn btn-circle btn-danger btn-xs" title="Edit">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                        @endforeach
                </table>
            </div>

            <div class="text-center">
                <nav>
                    {!! $contacts->appends(Request::query())->render() !!}
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>