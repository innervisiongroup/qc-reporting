@extends('layout')

@section('content')
    <div class="row">
        {{ Form::open(['route'=>'admin.user.store']) }}
            <div class="col-md-3">
                {{ Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'First Name']) }}
            </div>
            <div class="col-md-2">
                {{ Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) }}
            </div>
            <div class="col-md-3">
                {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
            </div>
            <div class="col-md-2">
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
            </div>
            <div class="col-md-2">
                {{ Form::submit('Quick Add User', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Users</h2>
            @if (count($users))
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">
                                    {{ $user->id }}
                                </th>
                                <td>
                                    {{ $user->first_name }}
                                </td>
                                <td>
                                    {{ $user->last_name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                No users at the moment.
            @endif
        </div>
    </div>
@stop