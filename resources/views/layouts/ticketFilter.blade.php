<?php
	$display = (Auth::user()->type=='customer') ? "none":"";
?>

<div class="ui teal segment">
	<a class="ui teal bottom right attached label" id="toggleFilter">Advanced Search</a>
  	<form method="GET" class="ui form" id="filterForm" action="/ticket" name="ticketSearch" >
  		<div class="field">
			<label>Ticket Title</label>
			<input type="text" name="title" placeholder="Title" value="@if(!empty(Request::input('title'))){{Request::input('title')}}@endif">
		</div>
		<div id="toggle_adv" style="display: none;">
		<h4 class="ui dividing header">Advanced Search</h4>
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Assign To</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_assignto">
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
			</div>
		</div>
		<div class="field">
			<div class="two fields">
				<div class="field" style="display: {{$display}}">
					<label>Report By</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_reportby">
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
				<div class="field" style="display: {{$display}}">
					<label>Created By</label>
					<input type="text" name="created_by" placeholder="Created By" value="@if(!empty(Request::input('created_by'))){{Request::input('created_by')}}@endif">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="three fields">
				<div class="field">
					<label>Priority</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_priority">
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
				<div class="field">
					<label>Status</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_status">
						<input type="hidden" name="status">
						<i class="dropdown icon"></i>
						<div class="default text">Status</div>
						<div class="menu">
							<div class="item" data-value="Open">Open</div>
							<div class="item" data-value="Answered">Answered</div>
							<div class="item" data-value="Resolved">Resolved</div>
							<div class="item" data-value="closed">Closed</div>
						</div>
					</div>
				</div>
				<div class="field">
					<label>Category</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_category">
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
			</div>
		</div>
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Date From</label>
					<input type="date" name="date_from" placeholder="Date From" value="@if(!empty(Request::input('date_from'))){{Request::input('date_from')}}@endif">
				</div>
				<div class="field">
					<label>Date To</label>
					<input type="date" name="date_to" placeholder="Date To" value="@if(!empty(Request::input('date_to'))){{Request::input('date_to')}}@endif">
				</div>
			</div>
		</div>
		</div>

		<label class="ui sub header" style="padding-top: 10px">Show </label>
		<div class="ui normal selection dropdown" id="for_paginate">
			<input type="hidden" name="paginate">
			<i class="dropdown icon"></i>
			<div class="text">
				@if(!empty(Request::input('paginate'))){{Request::input('paginate')}}@else{{25}}@endif
			</div>
			<div class="menu">
				<div class="item" data-value="20">20</div>
				<div class="item" data-value="40">40</div>
				<div class="item" data-value="80">80</div>
				<div class="item" data-value="100">100</div>
			</div>
		</div>
		<label class="ui sub header" style="padding-top: 10px"> Entries</label>
		<button class="ui teal button " style="margin-left: 10px;margin-top: 10px"> Search Ticket </button>
		<button class="ui grey button " type="button" id="reset"> Reset </button>
  	</form>

</div>