@component('mail::message')
# Hello, {{$user->username}}

There is an update on your ticket

<a href="http://192.168.0.109/ticket/{{$ticket_id}}">Go to Ticket id {{$ticket_id}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
