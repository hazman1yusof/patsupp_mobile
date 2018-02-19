@extends('layouts.main')

@section('content')
	<form class="ui form" method="POST" action="/ticket/create">
		<div class="ui segment clearing">
			{{csrf_field()}}
			<div class="field">
				<label>Ticket Title</label>
				<input type="text" name="title" placeholder="Title">
			</div>

			<div class="two fields">
				<div class="field">
					<label>Ticket Category</label>
					<div class="ui fluid search normal selection dropdown" id="for_category">
						<input type="hidden" name="category">
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
				<div class="field">
					<label>Ticket Priority</label>
					<div class="ui fluid search normal selection dropdown" id="for_priority">
						<input type="hidden" name="priority">
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
			</div>

			<div class="field">
				<label>Ticket Body</label>
				<textarea id="summernote" name="description"></textarea>
			</div>


			<div class="two fields">
				<div class="field">
					<label>Assign To</label>
					<div class="ui fluid search normal selection dropdown" id="for_assignto">
						<input type="hidden" name="assign_to">
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
					<label>Created By</label>
					<input type="text" name="created_by" placeholder="Created By" value="{{Auth::user()->username}}" readonly>
				</div>
			</div>

			@if(Auth::user()->type == 'agent')
			<div class="field">
				<label>Report By</label>
				<div class="ui fluid search normal selection dropdown" id="for_reportby">
					<input type="hidden" name="report_by">
					<i class="dropdown icon"></i>
					<div class="default text">Report By</div>
					<div class="menu">
						@foreach ($customers as $customer)
							<div class="item" data-value="{{$customer->id}}">{{$customer->username}}</div>
						@endforeach
					</div>
				</div>
			</div>
			@endif

            <div class="ui error message"></div>
			<button class="ui teal button right floated"> Create Ticket </button>
		</div>
	</form>

	@if($errors->any())
	<div class="segment">
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
	<script src="{{ asset('js/ticket_create.js') }}"></script>
@endsection