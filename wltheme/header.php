<!doctype html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<title>The HTML5 Herald</title>
    	<meta name="description" content="The HTML5 Herald"/>
    	<meta name="author" content="SitePoint"/>
    	<?php wp_head(); ?>    	
    </head>
	<body <?php body_class();?>>

	<div class="container-wraper">
		<div class="wltstthm-header">
			<div class="wltstthm-header-top container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-8 wltstthm-logo">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {
								    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
								    
								} else {
								     echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
								}
							?>
						</div><!-- .logo -->

						<div class="col-4 wltstthm-phone">
                            <?php echo __( 'Phone: ', 'wl-test-theme' ) . get_theme_mod( 'title_tagline_phone' ); ?>;
						</div><!-- .menu -->
					</div><!-- .row -->
				</div><!-- .container -->
												
			</div><!-- .wltstthm-header-top -->

		</div><!-- .wltstthm-header -->
