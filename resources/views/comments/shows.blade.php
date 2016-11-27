@extends('layouts.AdminPanel.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th> Post Title</th>
                            <th>User name</th>
                            <th>comments</th>
                            <th>Status</th>
                            <th>time</th>
                            <th>seen</th>

                        </tr>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->post->title}}</td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->body}}</td>
                                @if($comment->seen==0)
                                <td><span class="label label-primary">new</span></td>
                                    <td>{{$comment->created_at->diffForHumans()}}</td>
                                    <td><a class="label label-warning" href="{{url("/admin/comments/".$comment->id."/seen")}}">Seen</a></td>
                                @else
                                    <td><span class="label label-primary">old</span></td>
                                    <td>{{$comment->created_at->diffForHumans()}}</td>
                                    <td><a class="label label-warning" href="{{url("/admin/comments/".$comment->id."/seen")}}">UnSeen</a></td>
                                @endif





                            </tr>
                        @endforeach


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
@endsection