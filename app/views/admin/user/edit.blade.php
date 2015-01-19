@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $user->name }}'s profile</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::model($user, ['route'=>['admin.user.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal']) }}
                <div class="form-group">
                    {{ Form::label("first_name", 'First Name', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('first_name', null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label("last_name", 'Last Name', ['class'=>'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('last_name', null, ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop