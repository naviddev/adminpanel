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
                    <h3 class="box-title">Inbox</h3>

                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <input type="text" class="form-control input-sm" placeholder="Search Mail">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->

                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            @foreach($mails as $mail)
                                @if($mail->read==1)
                            <tr>
                                <td><a href="{{url('/admin/inbox/'.$mail->id.'/delete')}}"><i class="fa fa-trash-o"></i></a></td>
                                <td class="mailbox-star"><a href="#"><i class="{{mailType($mail->type)}}"></i></a></td>

                                <td class="mailbox-name"><a href="{{url('/admin/inbox/'.$mail->id)}}">{{$mail->sender}}</a></td>
                                <td class="mailbox-subject"><b>{{$mail->subject}}</b> - {{get_excerpt($mail->body)}}
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">{{$mail->created_at->diffForHumans()}}</td>
                            </tr>
                            @endif
@endforeach




                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">

                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    @stop