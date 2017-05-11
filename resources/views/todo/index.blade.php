@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title<a href="" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true" id="addItemTitle"></i></a></h3>
                    </div>
                    <div class="panel-body" id="items">

                        <ul class="list-group">
                            @foreach($items as $i)
                                {{$i->id}}<li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal" > {{$i->text}}
                               <a href="" class="pull-right" id="trash"><i class="fa fa-trash-o" aria-hidden="true"></i> <input type="hidden" class="itemId" value="{{$i->id}}"></a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--Model--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title">Add New Item</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" >
                    <input type="text" class="form-control" id="addItem" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="deleteItem" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-primary" id="savechanges" data-dismiss="modal">Save changes</button>
                    <button type="button" class="btn btn-primary" id="addButton" data-dismiss="modal">Add</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{ csrf_field() }}
    @section('scripts')
        <script>
            $(document).ready(function () {
                $(document).on('click','.ourItem',function () {
                        var text = $.trim(text);
                        var text = $(this).text();
                        var id= $(this).find('.itemId').val();
                        console.log(id);
                        $('#title').text('Edit Item');
                        $('#addItem').val(text);
                        $('#deleteItem').show('400');
                        $('#savechanges').show('400');
                        $('#addButton').hide();
                        $('#id').val(id);
                })
                $(document).on('click','#addItemTitle',function (event) {
                    event.preventDefault();
                    $('#deleteItem').hide('400');
                    $('#savechanges').hide('400');
                    $('#addButton').show();
                })
                $('#addButton').click(function () {
                    var text = $('#addItem').val();
                    $.post('to',{'text' : text,'_token':$('input[name=_token]').val()},function (data) {
                        console.log(data);
                        $('#items').load(location.href + '  #items');
                    })

                })
                $('#deleteItem').click(function () {
                    var item_id = $('#id').val();
                    $.post('delete',{'id':item_id,'_token': $('input[name=_token]').val()},function (data) {
                        console.log(data);
                        $('#items') .load(location.href + ' #items');
                    })
                })
                $('#savechanges').click(function () {
                    var item_id = $('#id').val();
                    var value = $.trim($("#addItem").val());
                    console.log(item_id);
                    $.post('editItem',{'id':item_id,'value':value,'_token':$('input[name=_token]').val()},function (data) {
                        $('#items').load(location.href + ' #items');
                        console.log(data);
                    })
                })
                $('#trash').click(function () {
                    var item_id = $('#ourItem').find('.itemId').val();
                    console.log(item_id);
                    $.post('trashItem',{'id':item_id,'_token': $('input[name=_token]').val()},function (data) {

                        $('#items') .load(location.href + ' #items');
                    })
                })

            })
        </script>
    @endsection
@endsection