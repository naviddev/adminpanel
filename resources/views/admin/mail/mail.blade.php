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
                    <h3 class="box-title">Read Mail</h3>

                    <div class="box-tools pull-right">

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>{{$mail->subject}}</h3>
                        <h5>From: {{$mail->sender}}
                            <span class="mailbox-read-time pull-right">{{$mail->created_at}}</span></h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <a href="{{url('/admin/inbox/'.$mail->id.'/delete')}}"> <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                <i class="fa fa-trash-o"></i></button></a>

                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                            <i class="fa fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        {{$mail->body}}
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <div class="pull-right">

                    </div>
                    <a href="{{url('/admin/inbox/'.$mail->id.'/delete')}}"><button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button></a>
                    <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @stop