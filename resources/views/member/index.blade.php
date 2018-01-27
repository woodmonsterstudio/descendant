@inject('members','App\Member')
@extends('layouts.app')
@section('content')
<div class="container">
	<a class="btn btn-default pull-left" href="{{route('home')}}" role="button">Home</a>

	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Local Name</th>
						<th>DOB</th>
						<th>Age</th>
						<th>ChineseZodiac</th>
						<th class="text-center">Spouse</th>
						<th class="text-center">Children</th>
						<th class="text-center">Image</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($members->get() as $row)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$row->name}}</td>
						<td>{{$row->local_name}}</td>
						<td>{{$row->dob}}</td>
						<td>{{$row->age}}</td>
						<td>{{$row->chinese_zodiac}}</td>
						<td class="text-center">
							@if($row->spouse->count())
							<a class="pointer fa fa-info-circle" data-toggle="popover" data-placement="bottom" data-container="body" data-trigger="hover" data-content="{{$row->spouse->pluck('name')->implode('<br>')}}">View</a>
							@endif
						</td>
						<td class="text-center">
							@if($row->children->count())
							<a class="pointer fa fa-info-circle" data-toggle="popover" data-placement="bottom" data-container="body" data-trigger="hover" data-html="true" data-content="{{$row->children->pluck('name')->implode('<br>')}}">View</a>
							@endif
						</td>
						<td class="text-center">
							@if($row->file)
								<img src="{{$row->file}}" height="50px">
							@endif
						</td>
						<td class="text-center"><a class="pointer btn-link" href="{{route('member.edit',$row->id)}}" role="button">Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
			
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('[data-toggle="popover"]').popover(); 
});
</script>
@endsection