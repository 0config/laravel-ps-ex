@extends('PS_base.PS_base')
@section('content')
    ps_group detail..
    <br>
    {{ $ps_group->id }} <br>


    __________
    {{ dump($ps_group) }}
@endsection
