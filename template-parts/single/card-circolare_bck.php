<?php
							global $circolare;
							$numerazione_circolare = $circolare->numero;

							?><div class="card card-bg bg-white card-thumb-rounded">
	        						<div class="card-body">
							                <div class="card-content">
	                    						    <h3 class="h5"><a href="#"><?php echo $circolare->titolo; ?></a></h3>
	            									<small class="h6 text-greendark"><?php _e("circ. n.", "design_scuole_italia"); echo $numerazione_circolare; ?></small>
	                        						<p><?php echo $circolare->corpoAnteprima; ?></p>
		                				</div>
		        						</div><!-- /card-body -->
								</div><!-- /card -->
<?php