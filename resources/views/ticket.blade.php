@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')	

	<h4 class="ui horizontal divider header">Ticket List</h4>

	<div class="ui four stackable cards">
		@foreach ($tickets as $ticket)
			<div class="card">
				<div class="content">
					<div class="header"><a href="ticket\{{$ticket->id}}">{{$ticket->title}}</a></div>
					<div class="meta">Report By: {{$ticket->report_by}}</div>
					<div class="meta">Assign To: {{$ticket->assign_to}}</div>
					<div class="description">
						{{str_limit($ticket->description,200,' ...')}}
					</div>
				</div>
			</div>
		@endforeach
	</div>

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection