@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')

<h4 class="ui horizontal divider header">Ticket Detail</h4>
<div class="ui segments">
	<div class="ui secondary clearing segment">
		<h3 class="ui header" style="margin-bottom: 10px">{{$ticket->title}}</h3>
		<h5 class="ui header" style="margin-top: 0px">
			<?php  
				$reportBy = DB::table('customers')->find($ticket->report_by)->username;
			?>
			<div class="avatar-circle left floated user_color">
				<span class="initials">{{strtoupper($reportBy[0])}}</span>
			</div>
			<div class="content" style="margin-left: 0.5em;">
				Report By
				<span class="sub header">{{$reportBy}}</span>
			</div>
			<div class="ui right floated">Report On 
				<span class="sub header">{{Carbon\Carbon::parse($ticket->created_at)->toDayDateTimeString()}}</span>
			</div>
			
		</h5>
	</div>
	<div class="ui very padded attached segment teal tertiary inverted" style="border-color: rgb(0, 181, 173);">
		{!!$ticket->description!!}
	</div>
	<div class="ui bottom attached button" id="edit_form_toggle">Ticket Info</div>
	<div class="ui segment clearing" id="edit_form_segment">
		<form class="ui form" id="edit_form">
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
								<div class="item" data-value="open">Open</div>
								<div class="item" data-value="pending">Pending</div>
								<div class="item" data-value="resolved">Resolved</div>
								<div class="item" data-value="closed">Closed</div>
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
			<button class="ui teal button right floated"> Edit Ticket </button>
	  	</form>
	</div>
</div>

<h4 class="ui horizontal divider header">Ticket Messages</h4>

@foreach($ticket->messages()->get() as $message)
	<div class="ui segments">
		<div class="ui secondary clearing segment">
			<h5 class="ui header">
				<?php  

					if($message->message_type == 'user'){
						$postedBy = DB::table('customers')->find($message->user_id)->username;
					}else{
						$postedBy = DB::table('agents')->find($message->user_id)->username;
					}

				?>
				<div class="avatar-circle left floated @if($message->message_type == 'user'){{'user_color'}}@else{{'admin_color'}}@endif">
					<span class="initials">{{strtoupper($postedBy[0])}}</span>
				</div>
				<div class="content" style="margin-left: 0.5em;">
					Posted By @if($message->message_type != 'user'){!!'<a>Agent</a>'!!}@endif 
					<span class="sub header">{{$postedBy}}</span>
				</div>
  				<div class="ui right floated">Posted On 
					<span class="sub header">{{Carbon\Carbon::parse($message->created_at)->toDayDateTimeString()}}</span>
  				</div>
			</h5>
		</div>
		<div class="ui @if($message->message_type == 'user'){{'teal'}}@elseif($message->message_type == 'admin'){{'orange'}}@else{{'red tertiary inverted'}}@endif very padded segment">
	  		{!!$message->text!!}
		</div>
	</div>

@endforeach

<div class="ui segments">
	<div class="ui segment">
		<textarea id="summernote" name="message"></textarea>
	</div>
</div>

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection