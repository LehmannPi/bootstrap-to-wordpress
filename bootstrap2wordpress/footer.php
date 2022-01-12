<footer>
		<div class="footer-calltoaction text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-8 offset-md-2 overflow-hidden">
						<p class="sub-title"><?php echo esc_html__(get_theme_mod( 'footer_sub_heading', 'Join the movement' ))?></p>
						<h2 class="footer-heading"><?php echo get_theme_mod( 'footer_calltoaction_heading', 'Bootstrap to WordPress' )?></h2>
						<p class="ftca-desc">
							<?php echo get_theme_mod( 'footer_calltoaction_desc', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, maiores aperiam? Tenetur eos
							voluptatibus nihil vero ')?>
							<!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, maiores aperiam? Tenetur eos
							voluptatibus nihil vero asperiores, veniam excepturi amet autem ex quam reiciendis molestiae laudantium
							sit sint beatae corrupti! -->
						</p>
						<a href="<?php echo esc_url(get_theme_mod( 'footer_cta_link', '#' ))?>" class="btn btn-primary">
							<?php echo get_theme_mod( 'footer_calltoaction_btn', 'Join!' )?>
							<!-- Join now! -->
						</a>
					</div>
				</div>
			</div>	
		</div>
		<div class="copyright text-center">
			<p><?php echo wp_kses_post(get_theme_mod('footer_copyright',"Copyright Brightside Studios Inc."))?></p>
		</div>
	</footer>


	<?php wp_footer(); ?>
	
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="assets/js/main-script.js"></script> -->
</body>

</html>