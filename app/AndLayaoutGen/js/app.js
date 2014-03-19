$(document).ready(function(){
    
    var toolsOpen = false;
    var optionsOpen = false;
    var toolmidleheight = Math.round(($('.app-content').height()/2) - $('.tools-content').height());
    var optionmidleheight = Math.round(($('.app-content').height()/2) - $('.options-content').height());

    $('#tools').css("height", Math.round($('.app-content').height())+ "px");
    $('#options').css("height", Math.round($('.app-content').height())+ "px");
    $('#tools-opener').css("margin", toolmidleheight +"px -5% 0 0");
    $('#options-opener').css("margin", optionmidleheight +"px 0 0 -5%");
    
    $('#tools-opener').click(
        function() {
            if(!toolsOpen){
                $('#tools').css("margin","0 0 0 0");
                $('#tools').children('.tools-opener').children('.arrow-right').attr('class','arrow-left');
                $('#tools').children('.tools-opener').css("margin",toolmidleheight +"px 0 0 0 ");
                $('#options').css("margin","0 -50% 0 0");
                $('#navegador').css("margin","0 -25% 0 0");
                toolsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -24%");
                $('#options').css("margin","0 -24% 0 0");
                $('#tools').children('.tools-opener').children('.arrow-left').attr('class','arrow-right');
                $('#tools').children('.tools-opener').css("margin",toolmidleheight +"px -5% 0 0 ");
                $('#navegador').css("margin","0 0 0 0");
                toolsOpen = false;
            }
        }
    );
    
    $('#options-opener').click(
        function() {
            if(!optionsOpen){
                $('#tools').css("margin","0 0 0 -50%");
                $('#options').css("margin","0 0 0 0");
                $('#options').children('.options-opener').children('.arrow-left').attr('class','arrow-right');
                $('#options').children('.options-opener').css("margin",optionmidleheight +"px 0 0 0 ");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = true;
            }else{
                $('#tools').css("margin","0 0 0 -24%");
                $('#options').css("margin","0 -24% 0 0");
                $('#options').children('.options-opener').children('.arrow-right').attr('class','arrow-left');
                $('#options').children('.options-opener').css("margin",optionmidleheight +"px 0 0 -5% ");
                $('#navegador').css("margin","0 0 0 0");
                optionsOpen = false;
            }
        }
    );
});
    