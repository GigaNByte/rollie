	<?php 
	
add_action( 'widgets_init', function(){
	register_widget( 'Rollie_Smart_Widget' );
});

class Rollie_Smart_Widget extends WP_Widget {
  


	public function __construct() {
	$widget_ops = array( 
		'classname' => 'rollie_smart',
		'description' => 'A plugin for Rollie Theme',
	);
	parent::__construct( 'rollie_smart', 'Rollie Smart Widget', $widget_ops );
	}

	public function form( $instance ) {
	if ( empty( $instance[ 'rollie_query' ] ) ) {
	 $instance[ 'rollie_query' ] = 'categories';
	}
	if ( empty( $instance[ 'rollie_columns' ] ) ) {
	 $instance[ 'rollie_columns' ] = 1;
	}
	if ( empty( $instance[ 'rollie_content' ] ) ) {
	 $instance[ 'rollie_content' ] = '';
	}
	if ( empty( $instance[ 'rollie_height' ] ) ) {
	 $instance[ 'rollie_height' ] = '400';
	}
	if ( empty( $instance[ 'rollie_center' ] ) ) {
	 $instance[ 'rollie_center' ] = '';
	}

		?>

	<label for="<?php echo esc_attr( $this->get_field_id( 'rollie_query' ) ); ?>">
	<?php esc_attr_e( 'Smart Banner Type:', 'rollie' ); ?>
	</label> 
	<select id="<?php echo $this->get_field_id('rollie_query'); ?>" name="<?php echo $this->get_field_name('rollie_query') ?>" class="widefat" style="width:100%;">
	    <option <?php selected( $instance['rollie_query'], 'categories'); ?> value="categories"><?php _e('Categories')?></option>
<?php	if (class_exists('WooCommerce')){ ?>
	    <option <?php selected( $instance['rollie_query'], 'woo_categories'); ?> value="woo_categories"><?php _e('Woocommerce Product Categories','rollie')?></option>
<?php } ?>
	    <option <?php selected( $instance['rollie_query'], 'child_pages'); ?> value="child_pages"><?php _e('Child Pages','rollie')?></option> 
	</select>
	</br>
	<label for="<?php echo esc_attr( $this->get_field_id( 'rollie_columns' ) ); ?>">
		<?php esc_attr_e( 'Columns:', 'rollie' ); ?>
	</label>
<select id="<?php echo $this->get_field_id('rollie_columns'); ?>" name="<?php echo $this->get_field_name('rollie_columns'); ?>" class="widefat" style="width:100%;">
	    <option <?php selected( $instance['rollie_columns'], '1'); ?> value="1">1</option>
	    <option <?php selected( $instance['rollie_columns'], '2'); ?> value="2">2</option>
	    <option <?php selected( $instance['rollie_columns'], '3'); ?> value="3">3 </option> 
	    <option <?php selected( $instance['rollie_columns'], '4'); ?> value="4">4 </option> 
	</select>
	</br>
	<label for="<?php echo $this->get_field_id( 'rollie_content' ); ?>"><?php _e('Show excerpt on hover if availble','rollie')?></label>
	<input class="checkbox" type="checkbox" <?php checked( $instance[ 'rollie_content' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'rollie_content' ); ?>" name="<?php echo $this->get_field_name( 'rollie_content' ); ?>" /> 
		</br>
		<div>

	<label for="<?php echo $this->get_field_id( 'rollie_center' ); ?>"><?php _e('Center titles under images','rollie')?></label>
	<input class="checkbox" type="checkbox" <?php checked( $instance[ 'rollie_center' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'rollie_center' ); ?>" name="<?php echo $this->get_field_name( 'rollie_center' ); ?>" /> 
	</div>
</br>
	<div>
		<label for="<?php echo $this->get_field_id( 'rollie_height' ); ?>"><?php _e('Height of image (vh)','rollie')?></label>
	<input class="range" type="range"  min="0" max="100"  <?php checked( $instance[ 'rollie_height' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'rollie_height' ); ?>" name="<?php echo $this->get_field_name( 'rollie_height' ); ?>" /> 
    </div>
</p>
    <?php }    
	
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['rollie_query'] = ( ! empty( $new_instance['rollie_query'] ) ) ? strip_tags( $new_instance['rollie_query'] ) : '';		
	

	//$instance['rollie_query'] = array_map( 'sanitize_option', 'rollie_query' );

	$instance['rollie_columns'] = ( ! empty( absint($new_instance['rollie_columns']) ) ) ? strip_tags( $new_instance['rollie_columns'] ) : '';		
	$instance['rollie_height'] = ( ! empty( absint($new_instance['rollie_height']) ) ) ? strip_tags( $new_instance['rollie_height'] ) : '';		

 	
	   $instance[ 'rollie_content' ]  = $new_instance[ 'rollie_content' ] ? 'on' : '';
	   $instance[ 'rollie_center' ]  = $new_instance[ 'rollie_center' ] ? 'on' : '';

	return $instance;
}
	public function widget( $args, $instance ) {
		switch ( $instance['rollie_columns'] ) {
    case 1:
        $rollie_class = 'col-12';
        break;
    case 2:
        $rollie_class = 'col-6';
        break;
    case 3:
          $rollie_class = 'col-4';
        break;
    case 4:
          $rollie_class = 'col-6 col-md-3';
        break;
    case 5:
      $rollie_class = 'col-4 col-md-3';
	break; 
	 case 6:
	$rollie_class = 'col-4 col-md-2';
	break;        
    default:
      $rollie_class = 'col-12';
} 
if(isset($instance['rollie_content']) && $instance['rollie_content'] == 'on'){ 
$rollie_smart_content_display = true;
}else{
$rollie_smart_content_display = false;
}
if(isset($instance['rollie_center']) && $instance['rollie_center'] == 'on'){ 
$rollie_center = true;
}else{
$rollie_center = false;
}


		?>

			<div class="rollie_smart_banner row">	
			<?php	
		if (isset($instance['rollie_height']) && ($instance['rollie_height'] > 0 || $instance['rollie_height'] < 100)){
			$rollie_height = $instance['rollie_height'] ;
		}else{
			$rollie_height = 20;
		}
		if ($instance['rollie_query'] == 'child_pages'){
			global $post;
			$args = array(
				'post_parent' => $post->ID,
				'post_type'   => 'page',
				'orderby'     => 'menu_order',
			);

			$child_query = new WP_Query( $args );
			while ( $child_query->have_posts() ) :
				$child_query->the_post();
				

		if ( $rollie_alt_thumbnail = get_the_post_thumbnail_caption() ) {
		} else {
		    $rollie_alt_thumbnail = get_the_title();
		}
		$rollie_thumbnail_url = get_the_post_thumbnail_url();

		if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
			$rollie_smart_content = get_field( 'rollie_excerpt' );
		} else {
			$rollie_smart_content =get_the_excerpt();
		}

		$rollie_smart_content_title = get_the_title();
		$rollie_smart_main_title =  get_the_title( $post->post_parent ) ;
		$rollie_smart_main_subtitle =  get_the_title() ;


			$this->template($rollie_class,$rollie_height,$rollie_center,get_page_link(),$rollie_thumbnail_url,$rollie_alt_thumbnail,$rollie_smart_content_display,$rollie_smart_content_title,$rollie_smart_content,$rollie_smart_main_title,$rollie_smart_main_subtitle);

		endwhile; 
		wp_reset_postdata();
		}elseif($instance['rollie_query'] == 'categories'){ 	
			$categories = get_categories();
			if ( $categories ) {
			foreach($categories as $category) {
				$cat_id = get_cat_ID($category->name);

				$rollie_thumbnail_url = get_field('rollie_cat_img',$category );		
	
				$rollie_smart_content = get_field('rollie_category_excerpt',$category );
	
				$this->template($rollie_class,$rollie_height,$rollie_center,get_term_link($category),$rollie_thumbnail_url,$category->name,$rollie_smart_content_display,$category->name,$rollie_smart_content,$category->name,'');
				}
			}
			}elseif($instance['rollie_query'] ==  'woo_categories' &&  class_exists('WooCommerce')){
				
				$categories = get_terms( 'product_cat' );

				foreach($categories as $category) {
				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$rollie_thumbnail_url = wp_get_attachment_url( $thumbnail_id );
					$this->template($rollie_class,$rollie_height,$rollie_center,get_term_link($category),$rollie_thumbnail_url,$category->name,$rollie_smart_content_display, $category->name,wp_trim_words( $category->description, 30, '...' ),$category->name,'');
				}
			}
		?>
	
	</div>

	<?php 
	}


public function template ($rollie_class,$rollie_height,$rollie_center,$rollie_page_link,$rollie_thumbnail_url,$rollie_alt_thumbnail,$rollie_smart_content_display,$rollie_smart_content_title,$rollie_smart_content,$rollie_smart_main_title,$rollie_smart_main_subtitle){
		?>
		
		
				<div class="<?php echo $rollie_class?> rollie_smart_banner_single   ">
					<a href="<?php echo $rollie_page_link ?>" class='d-block'>
						<div class="position-relative rollie_second_color">

						
							
						<?php	

						if ($rollie_thumbnail_url){
							$rollie_thumbnail_url="src='".esc_url($rollie_thumbnail_url)."' alt='".esc_attr($rollie_alt_thumbnail)."'";
						}
					
							echo "<img style='height:".$rollie_height."vh;' class='rollie_smart_banner_img  d-block rollie_smart_banner_fade img-responsive  w-100' ".$rollie_thumbnail_url.">";
							
							if ($rollie_smart_content_display){
						?>
							
								<div <?php echo "style='height:".$rollie_height."vh;'"?>class=' rollie_smart_banner_content  row rollie_flex_text_center  w-100 rollie_second_text_color'>
									<div class='rollie_f_headings_h2 col-12'>
										<?php echo $rollie_smart_content_title; ?>	
									</div>
									<?php if (!empty($rollie_smart_content)){ ?>
									<div class='rollie_f_excerpt col-12'>
									<?php echo $rollie_smart_content;?>
									</div>
									<?php }?>
								</div>
						<?php } ?>	
						</div>
		
					<?php

					$rollie_center = ($rollie_center) ? 'text-center' : '';
					echo "<div class='".$rollie_center."'>";
					echo "<div class=' rollie_title_text_color d-inline-block '>" .$rollie_smart_main_title. '</div>';

					if (!empty($rollie_smart_main_subtitle)){
					echo "<div class=' rollie_child_page_a p-2 d-inline-block rollie_subtitle_text_color '>" .$rollie_smart_main_subtitle. '</div>';
					}
					echo "</div>";
					?>
					
				
			</a>	

		</div>


	<?php
}
}
?>