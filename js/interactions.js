    // Scroller
    $(document).ready(function(){
        var movable,calcul;
        $('#indicator').mousedown(function(e){
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           if (calcul>0 && calcul< $('.scroller').innerHeight()-30) {
                if (movable) {
                    $('#indicator').css({"margin-top":calcul});
                }
            }
           movable=true;
        });
        $('.scroller').mousemove(function(e){ 
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           if (calcul>0 && calcul< $('.scroller').innerHeight()-30 ) {
                if (movable) {
                    $('#indicator').css({"margin-top":calcul});
                }
            }
        });
        $('#indicator').mouseup(function(e){
           calcul = e.pageY-($('h1').outerHeight()+$('.clear').outerHeight());
           if (calcul>0 && calcul< $('.scroller').innerHeight()-30) {
                if (movable) {
                    $('#indicator').css({"margin-top":calcul});
                }
            }
           movable=false;
        });
        $('.list').bind('mousewheel DOMMouseScroll', function(event){
            if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
                calcul = parseFloat($('#indicator').css('margin-top'));
                if (calcul>0) {
                    $('#indicator').css('margin-top', (parseFloat($('#indicator').css('margin-top')) - 10) + 'px');
                }
            }
            else {
                calcul = parseFloat($('#indicator').css('margin-top'));
                if (calcul< $('.scroller').innerHeight()-30) {
                    $('#indicator').css('margin-top', (parseFloat($('#indicator').css('margin-top')) + 10) + 'px');
                }
            }
        });
    });