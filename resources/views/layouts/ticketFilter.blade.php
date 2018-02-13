<div class="ui teal segment" style="padding-bottom: 50px;">
	<a class="ui teal top left attached label" id="toggleFilter">Toggle Filter Visibility</a>
  	<form class="ui form" id="filterForm">
		<h4 class="ui dividing header">Filter Ticket</h4>
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Title</label>
					<input type="text" name="title" placeholder="Title">
				</div>
				<div class="field">
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
			</div>
		</div>
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
				<div class="field">
					<label>Created By</label>
					<input type="text" name="created_by" placeholder="Created By">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="three fields">
				<div class="field">
					<label>Status</label>
					<div class="ui fluid multiple search normal selection dropdown" id="for_status">
						<input type="hidden" name="status">
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
		<button class="ui teal button right floated"> Filter Ticket </button>
  	</form>
</div>