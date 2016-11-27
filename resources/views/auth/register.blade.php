@extends('layouts.app')

    @section('content')
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">register</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ url('/register')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">username</label>
                                    <input type="text" class="form-control" name="username"id="username" placeholder="Enter username" value="{{ old('username') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"value="{{ old('username') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name</label>
                                    <input type="text" class="form-control" name="FName"id="FName" placeholder="Enter First name" value="{{ old('FName') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control" name="LName"id="LName" placeholder="Enter Last Name" value="{{ old('LName') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
                                </div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    @endsection


