@extends('layouts.main')


@section('_style')
		.description{
			 text-align:center;
		}
@endsection

@section('content')
<div class="ui cards">
		<h1 class="ui center aligned icon header">Welcome back {{Auth::user()->username}}</h1>

	<h4 class="ui horizontal divider header">Dashboard List</h4>

	@if(Auth::user()->type == 'agent')

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?assign_to={{Auth::id()}}&status=Open">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$open}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Open tickets - need your reply</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?assign_to={{Auth::id()}}&status=Answered">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$answered}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Answered tickets - waiting reply</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?status=Open">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$open_all}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Open tickets</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?status=Answered">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$answered_all}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Answered tickets</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket/answer/{{$user->id}}">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$answered2}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Ticket replied by you</div>
		</div>
	</div>


	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/customer?agent_id={{Auth::id()}}&status=Active">
					<div class="ui statistic">
						<div class="value">
	      					<i class="user icon"></i>{{$user_me}}
						</div>
						<div class="label">Users</div>
					</div>
				</a>
			</div>
			<div class="description">No. of your active customers</div>
		</div>
	</div>


	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/customer?status=Active">
					<div class="ui statistic">
						<div class="value">
	      					<i class="user icon"></i>{{$user_all}}
						</div>
						<div class="label">Users</div>
					</div>
				</a>
			</div>
			<div class="description">No. of all active customers</div>
		</div>
	</div>


	@endif

	@if(Auth::user()->type == 'customer')


	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?report_by={{Auth::id()}}">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$report_by}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Ticket Created by you</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?report_by={{Auth::id()}}&status=Answered">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$answered}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Answered ticket for you</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?report_by={{Auth::id()}}&status=Open">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$open}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Open ticket</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?report_by={{Auth::id()}}&status=Resolved">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$resolved}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Resolved ticket</div>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="ui center aligned header">
				<a class="ui button center" href="/ticket?report_by={{Auth::id()}}&status=Closed">
					<div class="ui statistic">
						<div class="value">
	      					<i class="ticket icon"></i>{{$closed}}
						</div>
						<div class="label">Tickets</div>
					</div>
				</a>
			</div>
			<div class="description">Closed ticket</div>
		</div>
	</div>
	@endif

</div>
	
@endsection


@section('js')
	<!-- <script src="{{ asset('js/ticket.js') }}"></script> -->
@endsection