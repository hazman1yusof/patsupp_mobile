<div id="top"></div>
<a href="#top" class="ui circular icon button" id="toTop" data-slide="slide">
    <i class="angle up icon"></i>
</a>
<div class="ui fixed top menu sidemenu">
    <a class="item"><i class="sidebar inverted icon" id="showSidebar"></i></a>
</div>
<div class="ui sidebar inverted vertical menu sidemenu">
    <a class="item {{(Request::is('dashboard') ? 'active' : '')}}" href="\dashboard">Dashboard</a>
    <a class="item @if(Request::is('ticket') || Request::is('ticket/*')) {{'active'}} @endif" href="\ticket">Tickets</a>
    @if(Auth::check() && Auth::user()->type=='agent')
        <a class="item {{(Request::is('customer') ? 'active' : '')}}" href="\customer">Customer</a>
        <a class="item {{(Request::is('agent') ? 'active' : '')}}" href="\agent">Agent</a>
        <a class="item {{(Request::is('backup') ? 'active' : '')}}" href="\backup">Backup & Restore</a>
    @endif
    <!-- <a class="item" href="\settings\change_password">Change Password</a> -->
    <a class="item" href="\logout">Log Out</a>
</div>

<div class="ui left fixed vertical icon menu sidemenu">
    <a class="item {{(Request::is('dashboard') ? 'active' : '')}}" data-content="Dashboard" href="\dashboard"><i class="dashboard inverted big icon link"></i></a>
    <a class="item @if(Request::is('ticket') || Request::is('ticket/*')) {{'active'}} @endif" data-content="Tickets" href="\ticket"><i class="ticket inverted big link icon"></i></a>
    @if(Auth::check() && Auth::user()->type=='agent')
        <a class="item @if(Request::is('customer') || Request::is('agent_detail/*')) {{'active'}} @endif" data-content="Customer" href="\customer"><i class="user circle inverted big link icon"></i></a>
        <a class="item {{(Request::is('agent') ? 'active' : '')}}" data-content="Agent" href="\agent"><i class="spy inverted big link icon"></i></a>
        <a class="item {{(Request::is('backup') ? 'active' : '')}}" data-content="Backup & Restore" href="\backup"><i class="server inverted big link icon"></i></a>
    @endif
    <!-- <a class="item {{(Request::is('settings/change_password') ? 'active' : '')}}" data-content="Change Password" href="\settings\change_password"><i class="settings inverted big link icon"></i></a> -->
    <a class="item {{(Request::is('login') ? 'active' : '')}}" data-content="LogOut" href="\logout"><i class="plug inverted big icon"></i></a>
</div>