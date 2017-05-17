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

    $name = $ps_group->name;
    $del_stat = $ps_group->del_stat;
    $comments = $ps_group->comments;


    // for old post
    $old_name= old('name') ;
    $old_del_stat= old('del_stat') ;
    $old_comments= old('comments') ;

    // if old post exist check
    if ($old_name or $old_del_stat or $old_comments)
    {
        $name = $old_name ;
        $del_stat = $old_del_stat ;
        $comments = $old_comments ;
    }

    ?>
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 success">
        {!! Form::open(['url' => url('#') , 'class' => 'class' , 'data-toggle' => 'validator', 'novalidate' => 'true'   ]) !!}

        {!! Form::label('name', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::text('name', $name, [  'class'=>'form-control ' , 'data-error'=>''  , 'required'=>'required',  'data-minlength'=>'5'  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('del_stat', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::number('del_stat', $del_stat, [  'class'=>'form-control ' , 'data-error'=>'' ,  'data-minlength'=>'1'  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>

        {!! Form::label('comments', '') !!} :
        <div class="form-group has-feedback ">
            {!! Form::textarea('comments', $comments, [  'class'=>'form-control ' , 'data-error'=>'' ,  'data-minlength'=>'5'  ]  ) !!}
            <div class="clearfix help-block with-errors"></div>
            <span class="glyphicon form-control-feedback"></span>
        </div><br>




        {!! Form::submit() !!}
        {!! Form::close() !!}

    </div>
    <div class='clear-fix'></div>

    <!--// note : form options allowed Form:: label, text, number, password, email, file, checkbox, radio, select, date, selectRange, selectMonth-->

@endsection