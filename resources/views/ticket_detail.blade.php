@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')

<h4 class="ui horizontal divider header">Ticket Detail</h4>
<input type="hidden" id="scroll_btm" value="@if(session()->has('data')){{session('data')}}@endif">
<div class="ui segments">
	<div class="ui secondary clearing segment">
		<h3 class="ui header" style="margin-bottom: 10px"><span style="font-size: small;">#{{$ticket->id}}.</span> {{$ticket->title}}</h3>
		<h5 class="ui header" style="margin-top: 0px">
			<?php  
				$reportBy = DB::table('users')->find($ticket->report_by)->username;
			?>
			<div class="avatar-circle left floated user_color">
				<span class="initials">{{strtoupper($reportBy[0])}}</span>
			</div>
			<div class="content" style="margin-left: 0.5em;">
				Report By 
				@if($ticket->updflg)
					<span style="color: red;opacity: 0.5">*Edited Message</span>
				@endif
				<span class="sub header">{{$reportBy}} </span>
			</div>
			<div class="ui right floated" >
				@if(Auth::id() == $ticket->report_by)
					<button class="ui blue mini basic button right floated" type="button" data-id="{{$ticket->id}}" data-type="ticket" edit>Edit</button>
				@endif
				<span class="sub header">{{Carbon\Carbon::parse($ticket->created_at)->toDayDateTimeString()}}</span>
			</div>
			
		</h5>
	</div>
	<div class="ui clearing padded attached segment teal tertiary inverted" style="border-color: rgb(0, 181, 173);">

		<form method="POST" class="ui form" id="messageForm" action="/ticket/{{$ticket->id}}">
			{{csrf_field()}}

    		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="text" id="ticket_{{$ticket->id}}_text">
			<div id="ticket_{{$ticket->id}}">
				{!!$ticket->description!!}
			</div>
			<div class="ui buttons right floated" style="display: none; margin-top: 10px" id="ticket_{{$ticket->id}}_button">
				<button class="ui button" type="button" data-id="{{$ticket->id}}" data-type="ticket" cancel>Cancel</button>
				<button class="ui teal button" data-id="{{$ticket->id}}" data-type="ticket" save>Update</button>
			</div>
		</form>

	</div>
	<div class="ui bottom attached button" id="edit_form_toggle">Ticket Info</div>
	<div class="ui segment clearing" id="edit_form_segment">
		<form class="ui form" id="ticketEditForm" method="POST" class="ui form" action="/ticket/{{$ticket->id}}">
			{{csrf_field()}}
    		<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="ticket_id" value="{{$ticket->id}}">
			<div class="field">
				<div class="four fields">
					<div class="field">
						<label>Assign To</label>
						<div class="ui fluid search normal selection dropdown" id="for_assignto">
							<input type="hidden" name="assign_to" value="{{$ticket->assign_to}}"}>
							<i class="dropdown icon"></i>
							<div class="default text">Assign To</div>
							<div class="menu">
								@foreach ($agents as $agent)
									<div class="item" data-value="{{$agent->id}}">{{$agent->username}}</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="field">
						<label>Status</label>
						<div class="ui fluid search normal selection dropdown" id="for_status">
							<input type="hidden" name="status" value="{{$ticket->status}}">
							<i class="dropdown icon"></i>
							<div class="default text">Status</div>
							<div class="menu">
								<div class="item" data-value="Open">Open</div>
								<div class="item" data-value="Answered">Answered</div>
								<div class="item" data-value="Resolved">Resolved</div>
								<div class="item" data-value="Closed">Closed</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Priority</label>
						<div class="ui fluid search normal selection dropdown" id="for_priority">
							<input type="hidden" name="priority" value="{{$ticket->priority}}">
							<i class="dropdown icon"></i>
							<div class="default text">Priority</div>
							<div class="menu">
								<div class="item" data-value="Low">Low</div>
								<div class="item" data-value="Medium">Medium</div>
								<div class="item" data-value="High">High</div>
								<div class="item" data-value="Urgent">Urgent</div>
							</div>
						</div>
					</div>
					<div class="field">
						<label>Category</label>
						<div class="ui fluid search normal selection dropdown" id="for_category">
							<input type="hidden" name="category" value="{{$ticket->category}}">
							<i class="dropdown icon"></i>
							<div class="default text">Category</div>
							<div class="menu">
								<div class="item" data-value="None">None</div>
								<div class="item" data-value="Question">Question</div>
								<div class="item" data-value="Incident">Incident</div>
								<div class="item" data-value="Problem">Problem</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if(Auth::id() == $ticket->report_by||Auth::user()->type == 'agent')
				<button class="ui teal button right floated"> Update </button>
			@endif
	  	</form>
	</div>
</div>

<h4 class="ui horizontal divider header">Ticket Messages</h4>

@foreach($ticket->messages()->get() as $message)
	<?php
		$showsegment = ($message->message_type == 'remark' && Auth::user()->type == 'customer') ? false : true;
	?>
	@if($showsegment)
	<div class="ui segments" id="segment_{{$message->id}}">
		<div class="ui secondary clearing segment">
			<h5 class="ui header">
				<?php  
					$postedBy = DB::table('users')->find($message->user_id)->username;
				?>
				<div class="avatar-circle left floated @if($message->message_type == 'customer'){{'user_color'}}@else{{'admin_color'}}@endif">
					<span class="initials">{{strtoupper($postedBy[0])}}</span>
				</div>
				<div class="content" style="margin-left: 0.5em;">
					Posted By 
					@if($message->message_type != 'customer'){!!'<a>Agent</a>'!!}@endif 
					@if($message->updflg)<span style="color: red;opacity: 0.5">*Edited Message</span>@endif
					@if($message->message_type == 'remark'){!!'<a>as Remark</a>'!!}@endif
					<span class="sub header">{{$postedBy}}</span>
				</div>
  				<div class="ui right floated" >
					@if(Auth::id() == $message->user_id)
						<button class="ui blue mini basic button right floated" type="button" data-id="{{$message->id}}" data-type="message" edit>Edit</button>
					@endif
					<span class="sub header" >{{Carbon\Carbon::parse($message->created_at)->toDayDateTimeString()}}</span>
  				</div>
			</h5>
		</div>
		<div class="ui clearing @if($message->message_type == 'customer'){{'teal'}}@elseif($message->message_type == 'agent'){{'orange'}}@else{{'yellow tertiary inverted'}}@endif padded segment" style="color: black !important">

			<form method="POST" class="ui form" id="messageForm" action="/message/{{$message->id}}">
				{{csrf_field()}}
    			<input type="hidden" name="_method" value="PUT">
    			<input type="hidden" name="text" id="message_{{$message->id}}_text">
		  		<div id="message_{{$message->id}}">{!!$message->text!!}</div>
		  		<div class="ui buttons right floated" style="display: none; margin-top: 10px" id="message_{{$message->id}}_button">
					<button class="ui button" type="button" data-id="{{$message->id}}" data-type="message" cancel>Cancel</button>
					<button class="ui teal button" data-id="{{$message->id}}" data-type="message" save>Update</button>
				</div>
			</form>

		</div>
	</div>
	@endif

@endforeach

	<form method="POST" class="ui form" id="messageForm" action="/message" id="submit_form">
		{{csrf_field()}}
        <div class="ui error message"></div>
		<input type="hidden" name="status" value="normal">
		<input type="hidden" name="ticket_id" value="{{$ticket->id}}">
		<div class="ui segments clearing" id="newMessage">
			<div class="ui segment">
				<textarea id="summernote" name="message"></textarea>
			</div>
			<div class="ui segment">
				<div class="fields">
					<div class="field">
						<div class="ui teal buttons">
							<button class="ui button" type="submit" id="submit_message">Submit Message</button>
							<div class="ui combo top right pointing dropdown icon button" id="submitMessage">
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item" data-value="Resolved">Submit and Resolve</div>
									<div class="item" data-value="Closed">Submit and Closed</div>
									<div class="item" data-value="normal">Submit Message</div>
								</div>
							</div>
						</div>
					</div>
					@if(Auth::user()->type == 'agent')
						<div class="field">
							<div class="ui checkbox column" style="margin-left: 10px;margin-top: 10px" data-content="Remark wont be seen by customer, only among agents can see remark messages">
								<input type="checkbox" tabindex="0" class="hidden"  name="remark">
								<label>Post as remark</label>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

	@if($errors->any())
	<div class="ui centered grid">
		<div class="ui error message">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
	</div>
	@endif

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection