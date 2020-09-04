$(document).ready(function(){
    $('.submit-prevent').submit(function() {
        $('.submit-prevent-btn').attr('disable','true');
        $('.spinner').show();
    });
});


