    // Scroller
    $(document).ready(function(){
        var movable,calcul;
        $('#indicator').mousedown(function(e){
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           $(this).css({"margin-top":calcul});
           movable=true;
        });
        $('.scroller').mousemove(function(e){
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           if (movable) {
            $('#indicator').css({"margin-top":calcul});
           }
        });
        $('#indicator').mouseup(function(e){
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           $(this).css({"margin-top":calcul});
           console.log(calcul);
           movable=false;
        });
        $('.list').bind('mousewheel DOMMouseScroll', function(event){
            if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
                console.log("Scroll Up !");
            }
            else {
                console.log("Scroll Down !");
            }
        });
    });