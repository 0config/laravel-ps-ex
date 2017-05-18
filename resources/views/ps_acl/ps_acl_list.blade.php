@extends('PS_base.PS_base')
@section('content')
    ps_acls   list..
    <a href="{{ route('ps_group.create') }}" class="   "> create new record <span class="glyphicon glyphicon-file"
                                                                                  aria-hidden="true"></span></a> &nbsp;

    <br>
    <div class="row">
        @foreach( $ps_acls as $ps_acl )

            <div class=" col-lg-offset-1  col-md-offset-1 col-md-7 col-lg-7 ">{{ $ps_acl->id }}
                > {{ $ps_acl->name }} </div>


            <div class="col-md-4 col-lg-4">
                <a href="/{{Request::path()}}/edit/{{ $ps_acl->id }}/" class=""><span class="glyphicon glyphicon-pencil"
                                                                                      aria-hidden="true"></span></a>

                <a href="/{{Request::path()}}/detail/{{ $ps_acl->id }}/"><span class="glyphicon glyphicon-list"
                                                                               aria-hidden="true"></span></a> &nbsp;

                <a href="#/{{Request::path()}}/delete/{{ $ps_acl->id }}/"><span
                            class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a> &nbsp;



                {{--route('profile', ['id' => 1])--}}
                <a href="{{ route('ps_group.edit', ['id' => $ps_acl->id ]) }}" class=""><span class="glyphicon glyphicon-pencil"
                                                                                      aria-hidden="true"></span></a>
                &nbsp; <a href="{{ route('ps_group.detail', ['id' => $ps_acl->id ]) }}"><span class="glyphicon glyphicon-list"
                                                                                      aria-hidden="true"></span></a>
                &nbsp; <a href="#/{{Request::path()}}/delete/{{ $ps_acl->id }}/"><span
                            class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a> &nbsp;

                {{ $ps_acl->updated_at }} </div>


        @endforeach
    </div>
    __________
    <hr>
    {{ $ps_acls->links() }}

    {{  dump( $ps_acls ) }}
@endsection