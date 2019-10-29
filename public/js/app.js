$(document).ready(function () {
    $('input[type="submit"]').click(function(){
        $(this).attr("disabled", true);
    });
});
