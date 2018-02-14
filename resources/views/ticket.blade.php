@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')	

	<h4 class="ui horizontal divider header">Ticket List</h4>

	<div class="ui four stackable cards">
		@foreach ($tickets as $ticket)
			<div class="card">
				<div class="content">

					@if($ticket->priority == 'Low')
						{!!'<div class="ui olive right ribbon label">Low</div>'!!}
					@elseif($ticket->priority == 'Medium')
						{!!'<div class="ui green right ribbon label">Medium</div>'!!}
					@elseif($ticket->priority == 'High')
						{!!'<div class="ui orange right ribbon label">High</div>'!!}
					@elseif($ticket->priority == 'Urgent')
						{!!'<div class="ui red right ribbon label">Urgent</div>'!!}
					@endif

					<div class="header"><a href="ticket\{{$ticket->id}}">{{$ticket->title}}</a></div>
					<div class="meta">Report By: <span class="ui teal sub header">{{DB::table('customers')->find($ticket->report_by)->username}}</span></div>
					<div class="meta">Assign To: <span class="ui orange sub header">{{DB::table('agents')->find($ticket->assign_to)->username}}</span></div>
					<div class="description">
						{{str_limit($ticket->description,200,' ...')}}
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="ui basic center aligned segment">
		    <div class="ui pagination menu">
		    	<a href="{{ $tickets->url(1) }}" class="ui {{ ($tickets->currentPage() == 1) ? ' disabled' : '' }} icon item">
		            <i class="angle double left icon"></i>
		        </a>
		        <a href="{{ $tickets->previousPageUrl() }}" class="ui {{ ($tickets->currentPage() == 1) ? ' disabled' : '' }} icon item">
		            <i class="angle left icon"></i>
		        </a>
		        @if ($tickets->currentPage() < $tickets->lastPage() && $tickets->currentPage() != 1)
		        	<?php
		        		$loopUntil=0;
		        		if($tickets->lastPage() >= $tickets->currentPage()+2){
		        			$loopUntil=$tickets->currentPage()+2;
		        		}else{
		        			$loopUntil=$tickets->lastPage();
		        		}
		        	?>
			        @for ($i = $tickets->currentPage()-1; $i <= $loopUntil; $i++)
			            <a href="{{ $tickets->url($i) }}" class="{{ ($tickets->currentPage() == $i) ? ' active' : '' }} item">
			                {{ $i }}
			            </a>
			        @endfor
			    @elseif ($tickets->currentPage() >= $tickets->lastPage())
					<?php
		        		$loopFrom=0;
		        		if($tickets->currentPage()-3 <= 0){
		        			$loopFrom=1;
		        		}else{
		        			$loopFrom=$tickets->currentPage()-3;
		        		}
		        	?>
			    	@for ($i = $loopFrom; $i <= $tickets->currentPage(); $i++)
			            <a href="{{ $tickets->url($i) }}" class="{{ ($tickets->currentPage() == $i) ? ' active' : '' }} item">
			                {{ $i }}
			            </a>
			        @endfor
			    @else

			    	<?php
		        		$loopUntil=0;
		        		if($tickets->lastPage() >= $tickets->currentPage()+3){
		        			$loopUntil=$tickets->currentPage()+3;
		        		}else{
		        			$loopUntil=$tickets->lastPage();
		        		}
		        	?>
			    	@for ($i = $tickets->currentPage(); $i <= $loopUntil; $i++)
			            <a href="{{ $tickets->url($i) }}" class="{{ ($tickets->currentPage() == $i) ? ' active' : '' }} item">
			                {{ $i }}
			            </a>
			        @endfor
			    @endif

		        <a href="{{ $tickets->nextPageUrl() }}" class="ui {{ ($tickets->currentPage() == $tickets->lastPage()) ? ' disabled' : '' }} icon item">
		            <i class="angle right icon"></i>
		        </a>
		        <a href="{{ $tickets->url($tickets->lastPage()) }}" class="ui {{ ($tickets->currentPage() == $tickets->lastPage()) ? ' disabled' : '' }} icon item">
		            <i class="angle double right icon"></i>
		        </a>
		    </div>
	</div>

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection