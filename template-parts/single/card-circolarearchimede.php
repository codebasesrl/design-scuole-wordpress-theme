<?php
global $circolare;

?><div class="card card-bg bg-white card-thumb-rounded">
	<div class="card-body">
		<div class="card-content">
			<h3 class="h5"><a href="<?php echo esc_url( add_query_arg( 'id', $circolare->id, site_url( '/circolare-archimede/' ) ) )?>"><?php echo $circolare->titolo; ?></a></h3>
            <small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $circolare->numero; ?></small>
			<p><?php echo $circolare->corpoAnteprima; ?></p>
		</div>
	</div><!-- /card-body -->
</div><!-- /card --><?php
