@extends('layout')

@section('styles')
    <link rel="stylesheet" href="/css/checkbox.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="pull-left">
                        {{ $report->project->name }}
                        <small>
                            Reporting sent the {{ date("d F Y",strtotime($report->created_at)) }},
                        </small>
                        <small>
                            Operating System used : {{ $report->platform_version }},
                        </small>
                        <small>
                            Tested by {{ $report->user->name }}
                        </small>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fonctionnality to Test</th>
                                @foreach (Platform::all() as $platform)
                                    <th>{{ $platform->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        @foreach ($report->project->features as $feature)
                            <tr>
                                <th scope="row">{{ $feature->name }}</th>
                                @foreach (Platform::all() as $platform)
                                    <td>
                                        @if (!is_null(Test::where('report_id', $report->id)->where('feature_id', $feature->id)->where('platform_id', $platform->id)->first()))
                                            {{ Form::checkbox($feature->id.'[]', $platform->id, true, ['id'=>$feature->id.$platform->id, 'disabled', 'checked']) }}
                                        @else
                                            {{ Form::checkbox($feature->id.'[]', $platform->id, false, ['id'=>$feature->id.$platform->id, 'disabled', 'unchecked']) }}
                                        @endif
                                        <label for="{{$feature->id.$platform->id}}" class="check-box"></label>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <blockquote>
                        <p>{{ $report->note }}</p>
                        <footer>{{ $report->user->name }}</footer>
                    </blockquote>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <a href="#" onclick="window.print()" class="btn btn-block btn-info print">Print</a>
                </div>
            </div>
        </div>
    </div>
@stop