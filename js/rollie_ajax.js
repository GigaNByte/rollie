
jQuery(document).ready(function($) {
$('.rollie_show_post_trigger').on('click',function(){

$("<div class='overlay   rollie_show_post_trigger_overlay'></div>").appendTo("body").fadeIn(300);

var rollie_post_id  = $(this).attr('rollie_post_id');
        $.ajax({
            url: rollie_ajax_obj.ajaxurl, 
            data: {
                'action': 'rollie_post_ajax_request',
                'post_id' : rollie_post_id,
               
            },

            success:function(data) {
          
                   console.log(data);
              //  $(this).after(asd);

            $(data).appendTo( 'body' ).fadeIn(300);
               $([document.documentElement, document.body]).animate({
                    scrollTop: $(".rollie_status_ajax").offset().top-10
                }, 300);
            $('.rollie_show_post_trigger_overlay').css('display','block');
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });  
    }); 
$(document).mouseup(function (e){
        var container = $(".rollie_status_ajax");
        if (!container.is(e.target) && container.has(e.target).length === 0 && container.parent().length){
            container.parent().fadeOut(300,function(){ this.empty()});   
            $('.rollie_show_post_trigger_overlay').fadeOut(300,function(){this.remove()});      
        }
    }); 
 
});


         