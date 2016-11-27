@extends('layouts.AdminPanel.app')

@section('content')

  <form action="{{url('/admin/post/'.$post->id)}}" method="post">
      {{csrf_field()}}
      <input type="text" name="body" value="{{$post->body}}" >
      <input type="text" name="title" value=" {{$post->title}}">
      <input type="submit">
  </form>


    {{$post->title}}
    {{$post->body}}
    @stop