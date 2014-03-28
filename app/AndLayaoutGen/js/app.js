function alertinfo(data){
    jQuery("#message-box").show("slow");
    jQuery("#message-box").html('<p>'+data+'</p>');
    jQuery("#message-box").delay(4000).hide("slow");
}

function attrfromstyle(style,attr){
    var splitres = style.split(';');
    for (var index = 0; index < splitres.length; index++) {
        if(splitres[index].indexOf(attr) != -1){
            var splitval = splitres[index].split(':');
            return splitval[1];
        }
    }
    return 0;
}

function removeattrstyle(style,attr){
    var splitres = style.split(';');
    var res = '';
    for (var index = 0; index < splitres.length; index++) {
        if(splitres[index].indexOf(attr) == -1 && splitres[index] != ""){
            res += splitres[index]+";";
        }
    }
    return res;
}

jQuery.fn.extend({
    objectadd :  function () {
            jQuery(this).draggable({
            stop: function( event, ui ) {
                jQuery(this).css('left',0);
                jQuery(this).css('top',0);
            }
        });
    },
    objectmove : function () {
        jQuery(this).draggable({
            stop: function( event, ui ) {
                var leftpos = parseInt(jQuery(this).css('left'));
                var toppos = parseInt(jQuery(this).css('top'));
                if(leftpos < 0 || toppos < 0){
                    jQuery(this).objectremove();
                }else if(leftpos > jQuery('#navegador #content-xml').width() || toppos > jQuery('#navegador #content-xml').height()){
                    jQuery(this).objectremove();
                }else{
                    jQuery.post( '/ajax/objectmap',
                        { action : 'moveobject',
                          map : Layaout,
                          id : jQuery(this).attr("data-id"),
                          positionleft : Math.round(jQuery(this).position().left),
                          positiontop : Math.round(jQuery(this).position().top),
                        },
                        function(data) {
                            alertinfo(data);
                        }
                    );
                }
            }
        });
    },
    objectremove : function(){
        jQuery.post( '/ajax/objectmap',
            { action :'removeobject',
              map : Layaout,
              id : jQuery(this).attr("data-id"),
            },
            function(data) {
                alertinfo(data);
            }
        );
        jQuery(this).remove();
    }
});

jQuery(document).ready(function(){
    
    var toolsOpen = false;
    var optionsOpen = false;
    
    jQuery('#message-box').css("left", Math.round(jQuery('.app-content').width()*3/8)+ "px");
    //jQuery('#tools').css("height", Math.round(jQuery('.app-content').height())+ "px");
    //jQuery('#options').css("height", Math.round(jQuery('.app-content').height())+ "px");
    
    jQuery('#tools-opener').click(
        function() {
            if(!toolsOpen){
                jQuery('#tools').css("margin","0 0 0 0");
                jQuery('#options').css("margin","0 -50% 0 0");
                jQuery('#navegador').css("margin","0 -25% 0 0");
                toolsOpen = true;
            }else{
                jQuery('#tools').css("margin","0 0 0 -24%");
                jQuery('#options').css("margin","0 -24% 0 0");
                jQuery('#navegador').css("margin","0 0 0 0");
                toolsOpen = false;
            }
        }
    );
    
    jQuery('#options-opener').click(
        function() {
            if(!optionsOpen){
                jQuery('#tools').css("margin","0 0 0 -50%");
                jQuery('#options').css("margin","0 0 0 0");
                jQuery('#navegador').css("margin","0 0 0 0");
                optionsOpen = true;
            }else{
                jQuery('#tools').css("margin","0 0 0 -24%");
                jQuery('#options').css("margin","0 -24% 0 0");
                jQuery('#navegador').css("margin","0 0 0 0");
                optionsOpen = false;
            }
        }
    );
    
    jQuery('#button-ajax').click(
        function() {
            
        }
    );
    
    jQuery('.divdrop').droppable({
        drop: function( event, ui ) {
            var dragclass = ui.draggable.attr('class');
            if(dragclass.indexOf('divdragadd') != -1){
                dragclass = dragclass.replace("divdragadd","divdragmove");
                
                var clone = ui.draggable.clone();
                var style = clone.attr('style');
                var left = parseInt(attrfromstyle(style,'left').replace("px","") );
                var top = parseInt(attrfromstyle(style,'top').replace("px","") );
                
                var newleft = Math.round(left - jQuery('#navegador #content-xml').position().left);
                var newtop = Math.round(top - jQuery('#navegador #content-xml').position().top);
                style = removeattrstyle(style,"left");
                style = removeattrstyle(style,"top");
                style += "left :"+newleft+"px;";
                style += "top:"+newtop+"px;";
                clone.attr('class',dragclass);
                clone.objectmove();
                clone.appendTo(jQuery(this));
                clone.attr('style',style);
                jQuery.post( '/ajax/objectmap',
                    { action :'addobject',
                      map : Layaout,
                      type : clone.attr("data-type"),
                      positionleft : Math.round(clone.position().left),
                      positiontop : Math.round(clone.position().top),
                    },
                    function(data) {
                        // get Id
                        clone.attr('data-id','test');
                        alertinfo(data);
                    }
                );
            }
        }
    });
    
    jQuery('.divdragmove').objectmove();
    jQuery('.divdragadd').objectadd();
});
    