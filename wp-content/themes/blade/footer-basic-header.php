			<!-- SIDE AREA -->
			<?php
				$grve_sidearea_data = blade_grve_get_sidearea_data();
				blade_grve_print_side_area( $grve_sidearea_data );
			?>
			<!-- END SIDE AREA -->

			<!-- HIDDEN MENU -->
			<?php blade_grve_print_hidden_menu(); ?>
			<!-- END HIDDEN MENU -->

			<!-- CART AREA -->
			<?php blade_grve_print_cart_area(); ?>
			<!-- END CART AREA -->

			<?php blade_grve_print_search_modal(); ?>
			<?php blade_grve_print_form_modals(); ?>
			<?php blade_grve_print_language_modal(); ?>
			<?php blade_grve_print_social_modal(); ?>

			<?php do_action( 'blade_grve_footer_modal_container' ); ?>

			<?php blade_grve_print_back_top(); ?>

		</div> <!-- end #grve-theme-wrapper -->
		<?php do_action( 'blade_grve_wp_footer' ); ?>
		<?php wp_footer(); // js scripts are inserted using this function ?>
	</body>
</html>