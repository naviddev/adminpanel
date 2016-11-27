@extends('layouts.AdminPanel.app')

@section('content')

    <form action="{{url("/superadmin/feature/".$admin->id)}}" method="post">
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox">
                    Checkbox 1
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox">
                    Checkbox 2
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" disabled>
                    Checkbox disabled
                </label>
            </div>
        </div>
        <input type="submit">
    </form>
    @stop