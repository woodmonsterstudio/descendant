@inject('members','App\Member')
@extends('layouts.app')
@section('content')
<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Edit Family Tree
                    <button class="ui primary button pull-right" v-on:click="onSave()">
                    Save
                    </button>
                </div>
                <div class="panel-body text-center">
                    <div id="chart-container"></div>
                    <div id="edit-panel">
                        <label class="selected-node-group">Selected Node:</label>
                        <input type="text" id="selected-node" class="selected-node-group">
                        <label>New Node:</label>
                        <ul id="new-nodelist">
                            <li><input type="text" class="new-node"></li>
                        </ul>
                        <i class="fa fa-plus-circle btn-inputs" id="btn-add-input"></i>
                        <i class="fa fa-minus-circle btn-inputs" id="btn-remove-input"></i>
                        <span id="node-type-panel" class="radio-panel">
                            <input type="radio" name="node-type" id="rd-parent" value="parent"><label for="rd-parent">Parent(root)</label>
                            <input type="radio" name="node-type" id="rd-child" value="children"><label for="rd-child">Child</label>
                            <input type="radio" name="node-type" id="rd-sibling" value="siblings"><label for="rd-sibling">Sibling</label>
                        </span>
                        <button type="button" id="btn-add-nodes">Add</button>
                        <button type="button" id="btn-delete-nodes">Delete</button>
                        <button type="button" id="btn-reset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('member.store')}}" method="POST" role="form" id="app_store">
        {{csrf_field()}}
        <input type="hidden" name="hierarchy">
    </form>
</div>
@endsection

@section('scripts')
@include('edit_scripts')
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
    #edit-panel {
      position: relative;
      left: 10px;
      width: calc(100% - 40px);
      border-radius: 4px;
      float: left;
      margin-top: 10px;
      padding: 10px;
      color: #fff;
      background-color: #449d44;
    }
    #edit-panel .btn-inputs { font-size: 24px; }
    #edit-panel.edit-state>:not(#chart-state-panel) { display: none; }
    #edit-panel label { font-weight: bold; }
    #edit-panel.edit-parent-node .selected-node-group { display: none; }
    #chart-state-panel, #selected-node, #btn-remove-input { margin-right: 20px; }
    #edit-panel button {
      color: #333;
      background-color: #fff;
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    #edit-panel.edit-parent-node button:not(#btn-add-nodes) { display: none; }
    #edit-panel button:hover,.edit-panel button:focus,.edit-panel button:active {
      border-color: #eea236;
      box-shadow:  0 0 10px #eea236;
    }
    #new-nodelist {
      display: inline-block;
      list-style:none;
      margin-top: -2px;
      padding: 0;
      vertical-align: text-top;
    }
    #new-nodelist>* { padding-bottom: 4px; }
    .btn-inputs { vertical-align: sub; }
    #edit-panel.edit-parent-node .btn-inputs { display: none; }
    .btn-inputs:hover { text-shadow: 0 0 4px #fff; }
    .radio-panel input[type='radio'] { display: inline-block;height: 24px;width: 24px;vertical-align: top; }
    #edit-panel.view-state .radio-panel input[type='radio']+label { vertical-align: -webkit-baseline-middle; }
    #btn-add-nodes { margin-left: 20px; }
    .block{
        border:1px solid black;
    }
</style>
@endsection