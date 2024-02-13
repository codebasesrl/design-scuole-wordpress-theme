<?php
global $post, $autore, $circolare;
if(!empty($circolare)){ ?>
<?php
								$numerazione_circolare = $circolare->numero;

							?><div class="card card-bg bg-white card-thumb-rounded">
	        						<div class="card-body">
							                <div class="card-content">
	                    						    <h3 class="h5"><a href="#"><?php echo $circolare->titolo; ?></a></h3>
	            									<small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
	                        						<p><?php echo $circolare->corpoAnteprima; ?></p>
		                				</div>
		        						</div><!-- /card-body -->
								</div>

<?php } 
else{
	
$autore = get_user_by("ID", $post->post_author);

$image_id= get_post_thumbnail_id($post);
$image_url = get_the_post_thumbnail_url($post, "vertical-card");

?><div class="card card-bg card-vertical-thumb bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h3 class="h5"><a href="<?php echo get_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h3>
			<p><?php echo get_the_excerpt($post); ?></p>
		</div>
		<?php if($image_url) { ?>
			<div class="card-thumb">
            	<?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
			</div>
		<?php  } ?>
	</div><!-- /card-body -->
	<div class="card-comments-wrapper">
		<?php get_template_part("template-parts/autore/card"); ?>
        <?php
        if($post->post_type == "post") {
	        ?>
            <div class="comments">
                <p><?php echo $post->comment_count; ?></p>
            </div><!-- /comments -->
	        <?php
        }
            ?>
	</div><!-- /card-comments-wrapper -->
</div><!-- /card -->
<?php } ?>
<?php 
