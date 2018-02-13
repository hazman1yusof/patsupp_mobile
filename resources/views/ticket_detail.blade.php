@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')
<h4 class="ui horizontal divider header">Ticket Detail</h4>
<textarea id="summernote" name="message"></textarea>

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection