<?php
global $post;
get_header(); ?>
<?php

$values = get_post_meta( $post->ID, 'fuel_car' );
$color_car = get_post_meta( $post->ID, 'color_car' );
$fuel_car = get_post_meta( $post->ID, 'fuel_car' );
$power_car = get_post_meta( $post->ID, 'power_car' );
$price_car = get_post_meta( $post->ID, 'price_car' );
$add_file_id = get_post_meta($post->ID, 'add_file_id', true);
$file_icon = wp_get_attachment_image( $add_file_id, 'thumbnail', true) ;
$model = get_the_terms( $post->ID, 'model');
$country = get_the_terms( $post->ID, 'country');

?>
		<div class="wltstthm-content">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-9 left-column">
						
						<!-- Start the Loop. -->
						<?php
							if ( have_posts() ) :
						 	while ( have_posts() ) :
						 	the_post();
						?>
			 			<div <?php  post_class();  ?>>

				 			<div class="meta"><span><?php _e( 'Posted by', 'wl-test-theme' ); ?> <?php the_author_posts_link(); ?><?php echo ' / '?></span><span><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago / '; ?></div>
                            <h2 class="title-post"><?php the_title(); ?></h2>
                            <h4 class="title-model"><?php if ( ! empty( $model ) ) echo $model[0]->name ?></h4>
                            <h4 class="title-country"><?php if ( ! empty( $country ) )echo $country[0]->name ?></h4>

				 		</div> <!-- closes the first div box -->

                                <table class="form-table">
                                    <tr>
                                        <th scope="row"><?php _e( 'Image', 'wl-test-theme' ); ?></th>
                                        <td>
                                            <div id="wltstthm_image_custom">
                                                <?php echo $file_icon ?>
                                            </div>
                                        </td>
                                    <tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Color :', 'wl-test-theme' ); ?></th>
                                        <td>
                                            <div class="theme-color" style="background-color: <?php echo $color_car[0] ?>;" >

                                            </div>

                                        </td>
                                    <tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Fuel :', 'wl-test-theme' ); ?></th>
                                        <td>
                                            <?php echo $fuel_car[0]  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Сar power :', 'wl-test-theme' ); ?></th>
                                        <td>
                                            <?php echo $power_car[0] ?> KW
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php _e( 'Сar price :', 'wl-test-theme' ); ?></th>
                                        <td>
                                            <?php echo $price_car[0] ?> $
                                        </td>
                                    </tr>
                                </table>


						<?php endwhile;
						 	else : ?>
							<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'wl-test-theme' ); ?></p>
						 	<?php endif; ?>
							
					</div><!-- .left-column -->

					<div class="col-12 col-md-3 d-sm-none d-md-block right-column">
					</div><!-- .right-column -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .content-wrapper -->
<?php get_footer(); ?>
