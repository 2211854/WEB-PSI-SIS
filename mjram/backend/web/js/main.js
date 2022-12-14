$(document).ready(function(){
    $("#myBtn").click(function () {
        if ($('body').hasClass('dark-mode')) {
            $('body').removeClass('dark-mode');
        } else {
            $('body').addClass('dark-mode');
        }
    });

    $('#pista-designacao').keypress(function(e) {
        if (e.which == 32){
            return false;
        }
    });
});