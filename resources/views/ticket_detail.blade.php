@extends('layouts.main')

@section('content')
@include('layouts.ticketFilter')

@endsection


@section('js')
	<script src="{{ asset('js/ticket.js') }}"></script>
@endsection