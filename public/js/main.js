 $(document).ready(function() {
    $('#showSidebar').click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    $('.ui.left.fixed.vertical.icon.menu a').popup({position:'right center'});

});