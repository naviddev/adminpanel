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
                            <th>Title</th>
                            <th>likes</th>
                            <th>comments</th>
                            <th>Status</th>
                            <th>time</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->like}}</td>
                                <td>0</td>
                                <td><span class="label label-primary">active</span></td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td><a class="label label-warning" href="{{url("/admin/post/".$post->id."/delete")}}">Delete</a></td>
                                <td><a class="label label-warning" href="{{url("/admin/post/".$post->id)}}">Edit</a></td>

                            </tr>
                        @endforeach


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
@endsection