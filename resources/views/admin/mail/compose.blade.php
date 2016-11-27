@extends('layouts.AdminPanel.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{url('/admin/mail/compose')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="{{url('/admin/mail/inbox')}}"><i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">{{counter(Auth::guard('admin')->user()->mails)}}</span></a></li>
                        <li><a href="{{url('/admin/mail/sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools">

                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Compose New Message</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                        <form action="{{url('/admin/send')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Select Admin</label>
                                <select multiple class="form-control" name="username">
                                    @foreach(App\Admin::all()as $admin)
                                        <option>{{$admin->username}}</option>
                                    @endforeach
                                </select>
                            </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Subject:" id="subject" name="subject">
                    </div>
                    <div class="form-group">
                    <textarea id="body" name="body"class="form-control" style="height: 300px">

                    </textarea>
                        @if(Auth::guard('admin')->user()->SuperAdmin)
                            <select name="type">
                                <option value="1">mail</option>
                                <option value="2">notification</option>
                                <option value="3">warning</option>
                            </select>
                             @else
                            <input type="hidden" value="1" name="type" >
                        @endif
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">

                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div>
                </form>

                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    @stop