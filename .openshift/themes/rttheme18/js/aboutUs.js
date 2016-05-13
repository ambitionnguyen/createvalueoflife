jQuery( document ).ready(function( $ ) {
    // Code using $ as usual goes here.


    $('.social p:first').hide();
    $('.social_one p:first').hide();
    $('.social_two p:first').hide();
    $('.social + p').hide();
    $('.social_one + p').hide();
    $('.social_two + p').hide();
    $('.ic_social + p').hide();


    if ( $.browser.msie ) {
        $( ".social" ).addClass( "social_ie" );
        $( ".social_one" ).addClass( "social_ie" );
        $( ".social_two" ).addClass( "social_ie" );
    }

    function popupwindow(url, title, w, h) {
      var left = (screen.width/2)-(w/2);
      var top = (screen.height/2)-(h/2);
      return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    } 

    $('.share_blog .icon-facebook').click(function(e) {
        e.preventDefault();
        FB.ui({
          method: 'share_open_graph',
          action_type: 'og.likes',
          action_properties: JSON.stringify({
              object:$(this).attr("href"),
          })
        }, function(response){});
    });

    $('.share_blog .icon-linkedin').click(function(e) {
        e.preventDefault();
        popupwindow($(this).attr('href'), 'Linkedin Share', 600, 600);
    });

    $('.share_blog .icon-gplus').click(function(e) {
        e.preventDefault();
        popupwindow($(this).attr("href"), 'Google + Share', 600, 600);
    });

    // $('.share_blog .icon-mail').click(function(e) {
    //     e.preventDefault();
    //     popupwindow($(this).attr("href"), 'Email', 600, 600);
    // });
    
});