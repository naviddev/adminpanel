@extends('layouts.AdminPanel.app')
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">{{commentCount('unssen')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Uploads</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">{{likeCount()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Last Posts</h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">

                <!-- /.item -->
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Posts</a>
        </div>
        <!-- /.box-footer -->
    </div>
    <div class="col-md-6">
        <!-- Application buttons -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Application Buttons</h3>
            </div>
            <div class="box-body">

                <a class="btn btn-app">
                    <span class="badge bg-red">0</span>
                    <i class="fa fa-file-text-o"></i> Posts
                </a>



                <a class="btn btn-app">
                    <span class="badge bg-yellow">{{notifyc(Auth::guard('admin')->user()->mails)}}</span>
                    <i class="fa fa-bullhorn"></i> Notifications
                </a>

                <a class="btn btn-app">
                    <span class="badge bg-purple">{{userc()}}</span>
                    <i class="fa fa-users"></i> Users
                </a>

                <a class="btn btn-app">
                    <span class="badge bg-aqua">{{counter(Auth::guard('admin')->user()->mails)}}</span>
                    <i class="fa fa-envelope"></i> Inbox
                </a>
                <a class="btn btn-app">
                    <span class="badge bg-red">{{likeCount()}}</span>
                    <i class="fa fa-heart-o"></i> Likes
                </a>
            </div>
            <!-- /.box-body -->
        </div>

    @stop()