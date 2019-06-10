@extends('layouts.main')

@section('style')

.fc-bgevent{
	opacity: .8;
}

.fc-event {
    position: relative;
    display: block;
    font-size: .85em;
    line-height: 1.3;
    border-radius: 3px;
    border: 1px solid #3a87ad;
}

.fc-event .selected {
    position: relative;
    display: block;
    font-size: .85em;
    line-height: 1.3;
    border-radius: 3px;
    border: 1px solid #3a87ad;
}

td.fc-event-container a.selected{
	background-color: dimgray !important;
}


@endsection

@section('content')
	<input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
	<input type="hidden" name="ALCOLOR" id="ALCOLOR" value="{{ $ALCOLOR->pvalue1 }}">

	<div class="ui teal segment" style="padding-bottom: 30px;">
		<div class="ui grid">
			<div class="column">
			    <label>Select Doctor</label>
				<div class="ui fluid search normal selection dropdown" id="resourcecode">
					<input type="hidden" name="resourcecode">
					<i class="dropdown icon"></i>
					<div class="default text">Select Doctor</div>
					<div class="menu">
						@foreach ($resources as $resource)
							<div class="item" data-value="{{$resource->resourcecode}}">{{$resource->description}}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="ui orange segment" style="padding-bottom: 30px;">
		<div id="calendar"></div>
	</div>

@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fullcalendar-3.7.0/fullcalendar.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css">
@endsection

@section('js')
	<script type="text/ecmascript" src="{{ asset('assets/fullcalendar-3.7.0/fullcalendar.min.js') }}"></script>
	<script type="text/ecmascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script type="text/ecmascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>
    <script type="text/ecmascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
	<script type="text/ecmascript" src="{{ asset('js/appointment.js') }}"></script>
@endsection