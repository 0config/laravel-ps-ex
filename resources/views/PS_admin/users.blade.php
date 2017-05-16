@extends('PS_base.PS_base')
@section('content')
    users   list..
    <br>
    <div class="row">
        @foreach( $users as $user )

            <div class=" col-lg-offset-1  col-md-offset-1 col-md-6 col-lg-6 ">{{ $user->id }}  > {{ $user->name }} </div>


            <div class="col-md-5 col-lg-5">
                   <img src="/images/ico/admin-{{ $user->is_admin }}.png"  >
                   <img src="/images/ico/verified-{{ $user->is_verified }}.png"  >

                <a href="/{{Request::path()}}/{{ $user->id }}/edit/" class=""><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> &nbsp;

                <a href="/{{Request::path()}}/{{ $user->id }}/"  ><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> &nbsp;

                <a href="#/{{Request::path()}}/{{ $user->id }}/delete/"  ><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a> &nbsp;

                {{ $user->updated_at }} </div>


        @endforeach

            <div class="text-center"><br>{{ $users->links() }}</div>

    </div>
    __________
    <hr>

@endsection