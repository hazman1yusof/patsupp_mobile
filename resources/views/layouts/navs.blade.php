<div id="top"></div>
<a href="#top" class="ui circular icon button" id="toTop" data-slide="slide">
    <i class="angle up icon"></i>
</a>
<div class="ui fixed top menu sidemenu">
    <a class="item"><i class="sidebar inverted icon" id="showSidebar"></i></a>
</div>

<div class="ui sidebar inverted vertical menu sidemenu">
    @foreach($navbar as $item)
        {!!$item->condition2!!}
    @endforeach
    <a class="item" href="\logout"><i style="float: left" class="plug inverted big icon link"></i>Log Out</a>
</div>