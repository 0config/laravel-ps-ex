<?php
if (Auth::check()) {
    $userId = Auth::user()->id;
    $gAll = \App\User::select('name')->get()->toArray();
    $gAllFlat = array_flatten($gAll);
    if (Auth::user() && Auth::user()->is_admin == 1) {
        session(['ps_group' => $gAllFlat]);
    }
}  ?>
@extends('PS_base.PS_base')
@section('title', 'Home ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php    var_dump(Session::all());

    ?>
@endsection
