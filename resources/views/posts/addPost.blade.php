@extends('layouts.AdminPanel.app')

@section('content')
    <form action="{{url('/admin/post/add')}}" method="post">
        {{csrf_field()}}
        <input type="text" placeholder="title" name="title">
        <input type="text" placeholder="body" name="body">
        <input type="submit">
    </form>
@stop