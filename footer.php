<?php
if (plato_active_footer() != false): ?>
	<section id="plato-footer-area" class="full-section-60">
		<?php
		$plato_footer_info = plato_active_footer();
		$plato_footer_class = $plato_footer_info['class'];
		$plato_sidebars_count = $plato_footer_info['sidebars_count'];
		?>

		<div class="container">
			<div class="row">
				<div id="plato-footer-sidebars">
					<?php for($i=1; $i<$plato_sidebars_count+1; $i++): ?>

						<div class="<?php echo $plato_footer_class; ?> plato-footer-sidebar">
							<?php if (!dynamic_sidebar('plato-footer-'.$i)): ?>
								<div class="pre-widget">

								</div>
							<?php endif; ?>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section id="plato-copyright" class="full-section-10">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p>
					<?php _e('created by','plato'); ?>
					<a rel="nofollow" href="<?php echo esc_url(__('http://platotheme.com/','plato')); ?>"><?php printf(__('Plato Theme','plato')); ?> </a>
					- <?php bloginfo('name'); ?>
				</p>
			</div>
		</div>
	</div>
</section>
<?php wp_footer(); ?>
</body>
</html>