@extends('PS_base.PS_base')
@section('content')
    ps_groups   list.. <a href="create/" class="   "> create new record <span class="glyphicon glyphicon-file" aria-hidden="true"></span></a> &nbsp;

    <br>
    <div class="row">
        @foreach( $ps_groups as $ps_group )

            <div class=" col-lg-offset-1  col-md-offset-1 col-md-7 col-lg-7 ">{{ $ps_group->id }}  > {{ $ps_group->name }} </div>


            <div class="col-md-4 col-lg-4">
                <a href="/{{Request::path()}}/{{ $ps_group->id }}/edit/" class=""><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> &nbsp;

                <a href="/{{Request::path()}}/{{ $ps_group->id }}/"  ><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> &nbsp;

                <a href="#/{{Request::path()}}/{{ $ps_group->id }}/delete/"  ><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a> &nbsp;

                {{ $ps_group->updated_at }} </div>


        @endforeach
    </div>
    __________
    <hr>
    {{ $ps_groups->links() }}

    {{  dump( $ps_groups ) }}
@endsection