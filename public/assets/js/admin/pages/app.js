$(function() {
    
    var history_url = document.referrer;
    var history_item = history_url.split('/')[6];
    
    if(history_item == undefined)
        $('.menu-panel').removeClass('active');
    else
        $('.menu-'+history_item).removeClass('active');    

    var string_url = window.location.href;
    var item = string_url.split('/')[6];

    if(item == undefined) {
        $('.menu-panel').addClass('active');
    } else {
        $('.menu-'+item).addClass('active');
    }
});