<?php 
function rollie_post_ajax_request() {
 
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
     
      $rollie_post_id = $_REQUEST['post_id'];

     if (! empty($rollie_post_id) ) {  
        global $withcomments;
        $withcomments = true; 

         $single_post_arg = array('p' => $rollie_post_id);
         $single_post = new WP_Query($single_post_arg);

       if ($single_post->have_posts()){
              while ( $single_post->have_posts() ) : $single_post->the_post(); 

           
            echo "<div class='rollie_status_ajax_z w-100 rollie_center_abs'>";
              echo "<div class='rollie_status_ajax  rollie_main_color ' >";
                    require locate_template( 'template-parts/post/content-index-classic.php' );   
                    if ( comments_open() || get_comments_number() ) {
                    comments_template();    
                 }
                  echo "</div>";
            echo "</div>";
          
            endwhile;
        
        }
 
      }
    }

   die();
}
 
add_action( 'wp_ajax_rollie_post_ajax_request', 'rollie_post_ajax_request' );
add_action( 'wp_ajax_nopriv_rollie_post_ajax_request', 'rollie_post_ajax_request' );