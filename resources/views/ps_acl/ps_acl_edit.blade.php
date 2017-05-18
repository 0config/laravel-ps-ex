@extends('PS_base.PS_base')
@section('content')

    @if( (count($errors)> 0 ))
        <errorContainer>
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        </errorContainer>
    @endif


    <?php  // variable assignment starts

    $name = $ps_acl->name;
    $uid = $ps_acl->uid;
    $gid = $ps_acl->gid;
    $comments = $ps_acl->comments;
    $del_stat = $ps_acl->del_stat;


    // for old post
    $old_name= old('name') ;
    $old_uid= old('uid') ;
    $old_gid= old('gid') ;
    $old_comments= old('comments') ;
    $old_del_stat= old('del_stat') ;

    // if old post exist check
    if ($old_name or $old_uid or $old_gid or $old_comments or $old_del_stat)
    {
        $name = $old_name ;
        $uid = $old_uid ;
        $gid = $old_gid ;
        $comments = $old_comments ;
        $del_stat = $old_del_stat ;
    }

    ?>
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 success">
        {!! Form::open(['url' => url('#') , 'class' => 'class' , 'data-toggle' => 'validator', 'novalidate' => 'true'   ]) !!}

        {!! Form::label('name', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::text('name', $name, [  'class'=>'form-control ' , 'data-error'=>'' ,  'data-minlength'=>'5'  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('Select User', '') !!} :
        <div class="form-group has-feedback ">
            {{--{!! Form::number('uid', $uid, [  'class'=>'form-control ' , 'data-error'=>''  , 'required'=>'required',  'data-minlength'=>'1'  ]  ) !!}--}}
            {!!   Form::select('uid', \App\User::pluck('email', 'id') , $uid, [  'class' => 'form-control ', 'required' =>'required']   )    !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('Group ID', '') !!} :
        <div class="form-group has-feedback ">
{{--            {!! Form::number('gid', $gid, [  'class'=>'form-control ' , 'data-error'=>''  , 'required'=>'required',  'data-minlength'=>'1'  ]  ) !!}--}}
            {!!   Form::select('gid', \App\Ps_group::pluck('name', 'id') , $gid , [  'class' => 'form-control ', 'required' =>'required']   )    !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('comments', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::textarea('comments', $comments, [  'class'=>'form-control ' , 'data-error'=>'' ,  'data-minlength'=>'10'  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('del_stat', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::number('del_stat', $del_stat, [  'class'=>'form-control ' , 'data-error'=>''  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>




        {!! Form::submit() !!}
        {!! Form::close() !!}

    </div>
    <div class='clear-fix'></div>

    <!--// note : form options allowed Form:: label, text, number, password, email, file, checkbox, radio, select, date, selectRange, selectMonth-->

@endsection