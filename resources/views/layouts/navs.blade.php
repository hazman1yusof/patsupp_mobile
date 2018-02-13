<div class="ui fixed top menu sidemenu">
    <a class="item"><i class="sidebar inverted icon" id="showSidebar"></i></a>
</div>
<div class="ui sidebar inverted vertical menu sidemenu">
    <a class="item {{(Request::is('dashboard') ? 'active' : '')}}" href="\dashboard">Dashboard</a>
    <a class="item @if(Request::is('ticket') || Request::is('ticket/*')) {{'active'}} @endif" href="\ticket">Tickets</a>
    <a class="item {{(Request::is('customer') ? 'active' : '')}}" href="\customer">Customer</a>
    <a class="item {{(Request::is('agent') ? 'active' : '')}}" href="\agent">Agent</a>
    <a class="item {{(Request::is('settings') ? 'active' : '')}}" href="\settings">Settings</a>
</div>

<div class="ui left fixed vertical icon menu sidemenu">
    <a class="item {{(Request::is('dashboard') ? 'active' : '')}}" data-content="Dashboard" href="\dashboard"><i class="dashboard inverted big icon link"></i></a>
    <a class="item @if(Request::is('ticket') || Request::is('ticket/*')) {{'active'}} @endif" data-content="Tickets" href="\ticket"><i class="ticket inverted big link icon"></i></a>
    <a class="item {{(Request::is('customer') ? 'active' : '')}}" data-content="Customer" href="\customer"><i class="user circle inverted big link icon"></i></a>
    <a class="item {{(Request::is('agent') ? 'active' : '')}}" data-content="Agent" href="\agent"><i class="spy inverted big link icon"></i></a>
    <a class="item {{(Request::is('settings') ? 'active' : '')}}" data-content="Settings" href="\settings"><i class="settings inverted big link icon"></i></a>
</div>