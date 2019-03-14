<?php

if ( is_active_sidebar( 'sidebar_bottom' ) ) {
		echo '<section class="row rollie_sidebar_bottom">';
			dynamic_sidebar( 'sidebar_bottom' );
		echo '</section >';
}
