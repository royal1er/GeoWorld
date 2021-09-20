$(function() {
    $('#mainContent div:not(:first)').hide();

    $('span a').click(function() {
        $('div#modal-header a').removeClass('selected');
        
        $(this).addClass('selected');
 
        var href = $(this).attr('href');
        var split = href.split('#');
 
        $('#mainContent div').hide();
        $('#mainContent div#' + split[1]).fadeIn();
 
        return false;
    });
});