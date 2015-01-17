@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Login</h2>
            {{ Form::open(['route'=>'session.store', 'class'=>'form-horizontal']) }}
                <div class="form-group">
                    {{ Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
                    </div>
                </div>
         
                <div class="form-group">
                    {{ Form::label('password', 'Password', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::password('password', ['class'=>'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('remember_me', true) }}
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Login', ['class'=>'btn btn-success']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop