<?php
global $post;

$image_url = get_the_post_thumbnail_url($post, "article-simple-thumb");
$class = dsi_get_post_types_color_class($post->post_type);
$icon = dsi_get_post_types_icon_class($post->post_type);


$excerpt =  dsi_get_meta("descrizione", "", $post->ID);
if(!$excerpt)
    $excerpt = get_the_excerpt($post);

$argomenti = dsi_get_argomenti_of_post();
$numerazione_circolare =  dsi_get_meta("numerazione_circolare", "", $post->ID);

 global $circolare;
            $json=file_get_contents("http://accesso.registroarchimede.it/archimede/seam/resource/rest/comunicazioni/lista/".get_option('idScuola')."/1/12");
            $json=json_decode($json);
            $listaCircolari=$json->listaCircolari;
            if(!empty($listaCircolari)) {
		    foreach ($listaCircolari as $circolare) { 
 $split = explode("/", $circolare->data);
 $circdata = $split[1]."/".$split[0]."/".$split[2];

?>
		   
		    <a class="presentation-card-link"  href="<?php echo esc_url( add_query_arg( 'id', $circolare->id, site_url( '/circolare-archimede/' ) ) )?>">
    <div class="card card-bg card-article card-article-greendark cursorhand" >
        <div class="card-body">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>
                    <div class="date">
                        <span class="year"><?php echo date_i18n("Y", strtotime($circdata)); ?></span>
                        <span class="day"><?php echo date_i18n("d", strtotime($circdata)); ?></span>
                        <span class="month"><?php echo date_i18n("M", strtotime($circdata)); ?></span>
                    </div>

                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>

                </div>
                <div class="card-article-content">
                    <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $circolare->numero; ?></small>
                    <h2 class="h3"><?php echo $circolare->titolo ; ?></h2>
                    <p><?php echo $circolare->corpo ?></p>
                    <?php /* if(is_array($argomenti) && count($argomenti)) { ?>
                        <div class="badges">
                            <?php foreach ( $argomenti as $item ) { ?>
                                <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
                                   class="badge badge-sm badge-pill badge-outline-<?php echo $class; ?>"><?php echo $item->name; ?></a>
                            <?php } ?>
                        </div><!-- /badges -->
                    <?php } */ ?>
                </div><!-- /card-avatar-content -->

        </div><!-- /card-body -->
    </div><!-- /card card-bg card-article -->
</a>

<?php }
                }
            ?>
<?php if ($post->post_type == 'circolare') { ?>
<a class="presentation-card-link" href="<?php the_permalink(); ?>">
    <article class="card card-bg card-article card-article-<?php echo $class; ?> cursorhand" >
        <div class="card-body">
                <div class="card-article-img"  <?php if($image_url) echo 'style="background-image: url(\''.$image_url.'\');"'; ?>>

                    <div class="date">
                        <span class="year"><?php echo date_i18n("Y", strtotime($post->post_date)); ?></span>
                        <span class="day"><?php echo date_i18n("d", strtotime($post->post_date)); ?></span>
                        <span class="month"><?php echo date_i18n("M", strtotime($post->post_date)); ?></span>
                    </div>

                    <?php if(!$image_url){ ?>
                        <svg class="icon-<?php echo $class; ?> svg-<?php echo $icon; ?>"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php echo $icon; ?>"></use></svg>
                    <?php } ?>

                </div>
                <div class="card-article-content">
                    <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
                    <h2 class="h3"><?php the_title(); ?></h2>
                    <p><?php echo $excerpt; ?></p>
                    <?php /* if(is_array($argomenti) && count($argomenti)) { ?>
                        <div class="badges">
                            <?php foreach ( $argomenti as $item ) { ?>
                                <a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
                                   class="badge badge-sm badge-pill badge-outline-<?php echo $class; ?>"><?php echo $item->name; ?></a>
                            <?php } ?>
                        </div><!-- /badges -->
                    <?php } */ ?>
                </div><!-- /card-avatar-content -->

        </div><!-- /card-body -->
    </article><!-- /card card-bg card-article -->
</a>
<?php } ?>
