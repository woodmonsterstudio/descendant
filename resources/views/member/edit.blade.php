@inject('members','App\Member')
@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-default" href="{{route('member.index')}}" role="button">Back</a>
    <br>
    <br>
    <form action="{{route('member.update',$member->id)}}" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{csrf_field()}}
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-4">Name</label>
                    <div class="col-sm-8">
                            <input type="text" class="input-sm form-control" name="name" value="{{$member->name or old('name')}}">
                    </div>
                    @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group{{ $errors->has('local_name') ? ' has-error' : '' }}">
                    <label class="col-sm-4">Local Name</label>
                    <div class="col-sm-8">
                            <input type="text" class="input-sm form-control" name="local_name" value="{{$member->local_name or old('local_name')}}">
                    </div>
                    @if ($errors->has('local_name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('local_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    <label class="col-sm-4">DOB</label>
                    <div class="col-sm-8">
                            <input type="text" class="input-sm form-control datepicker" name="dob" value="{{$member->dob or old('dob')}}">
                    </div>
                    @if ($errors->has('dob'))
                    <span class="help-block">
                            <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-4">Spouse</label>
                    <div class="col-sm-8">
                        <select name="relation_spouse[]" class="form-control bs-select2" multiple="multiple">
                            @foreach($members->all() as $row)
                            <option value="{{$row->id}}" {{ in_array($row->id, $member->spouse->pluck('id')->toArray()) ? 'selected' : null }}>{{$row->name}}</option>
                            @endforeach
                        </select>
                            {{-- <input type="text" class="input-sm form-control" name="name" value="{{$member->name or old('name')}}"> --}}
                    </div>
                    @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-4">Children</label>
                    <div class="col-sm-8">
                        <select name="relation_children[]" class="form-control bs-select2" multiple="multiple">
                            @foreach($members->all() as $row)
                            <option value="{{$row->id}}" {{ in_array($row->id, $member->children->pluck('id')->toArray()) ? 'selected' : null }}>{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id="avatar-1" name="file" type="file">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary pull-right">Save</button>
    </form>
    
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
<script type="text/javascript">
$(document).ready(function() {
    $('.bs-select2').select2();
    $('.datepicker').datepicker({format: 'yyyy-mm-dd',});

    $("#avatar-1").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        @if($member->file)
        defaultPreviewContent: '<img src="/{{$member->file}}" width="200px" alt="Your Avatar">',
        @else
        defaultPreviewContent: '',
        @endif
        layoutTemplates: {main2: '{preview} ' + '{browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
});

</script>
@endsection

@section('styles')
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
@endsection