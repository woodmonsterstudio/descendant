@inject('people','App\Member')
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Family Tree
                    <a class="ui primary button pull-right" href="{{route('member.index')}}">
                    Edit
                    </a>
                </div>
                <div class="panel-body text-center">
                    <div id="chart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('scripts')
@endsection

@section('styles')
<style type="text/css">
    #edit-panel input{
        color:black;
    }
    #chart-container { background-color: #eee; height: 500px; }
    .orgchart { background: #fff; }
    .orgchart.edit-state .edge { display: none; }
    .orgchart .node { width: 150px; }
    .orgchart .node .title { height: 30px; line-height: 30px; }
    .orgchart .node .title .symbol { margin-top: 1px; }
    .block{
        border:1px solid black;
    }
    .nowrap {
        white-space:nowrap;
    }
</style>
@endsection