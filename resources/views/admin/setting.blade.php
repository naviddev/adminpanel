@extends('layouts.AdminPanel.app')

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{url('uploads\AdminPic/'.$admin->username.'.jpg')}}"
                         alt="User profile picture" style="    height: 150px;
    width: 150px;">

                    <h3 class="profile-username text-center">{{$admin->FName}} {{$admin->LName}}</h3>

                    <p class="text-muted text-center">Admin</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Posts</b> <a class="pull-right">10</a>
                        </li>
                        <li class="list-group-item">
                            <b>Like</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Comments</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-14>
                    <!-- general form elements -->
                    <div class=" box box-primary
                ">
                <div class="box-header with-border">
                    <h3 class="box-title">setting</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/setting')}}">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input type="text" class="form-control" name="FName" id="FName"
                                   placeholder="Enter First name" value="{{ $admin->FName }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" name="LName" id="LName"
                                   placeholder="Enter Last Name" value="{{ $admin->LName }}">
                        </div>
                        <div class="form-group">

                        </div>
                        <!-- /.box-body -->


                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file"  name="pic">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>

            </div>

            <!-- left column -->









@endsection