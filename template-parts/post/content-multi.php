	</div>
					<?php

					if ( is_active_sidebar( 'sidebar_right' ) ) {
						echo "<aside class='rollie_sidebar_right  offset-lg-1 col-2 '>";// offset-1
							dynamic_sidebar( 'sidebar_right' );
						echo '</aside>';
					}

					?>		
			</div>
		</div>
	</div>
<?php


		get_sidebar( 'bottom_1' );

?>
