<!-- Hintergrund -->
<style>	

.elementor-kit-8 {
	background-color: <?php the_field('3d_rockpage_hintergrund', 'option') ?> !important;
	--e-global-color-primary: <?php the_field('primere_farbe', 'option') ?> !important;
	--e-global-color-secondary: <?php the_field('sekundare_farbe', 'option') ?> !important;
	--e-global-color-text: <?php the_field('3d_rockpage_schriftfarbe', 'option') ?> !important;
	--e-global-color-accent: <?php the_field('akzent_farbe', 'option') ?> !important;
	
    --e-global-typography-primary-font-family: <?php the_field('schriftart_uberschriften', 'option') ?> !important;
    --e-global-typography-primary-font-weight: 600 !important;
    --e-global-typography-secondary-font-family: <?php the_field('schriftart_uberschriften', 'option') ?> !important;
    --e-global-typography-secondary-font-weight: 600 !important;
    --e-global-typography-text-font-family: <?php the_field('schriftart_texte', 'option') ?> !important;
    --e-global-typography-text-font-weight: 400 !important;
    --e-global-typography-accent-font-family: <?php the_field('schriftart_texte', 'option') ?> !important;
    --e-global-typography-accent-font-weight: 600 !important;
}
	
.elementor-kit-8 button {
    border-radius: <?php the_field('buttonradius', 'option') ?>px <?php the_field('buttonradius', 'option') ?>px <?php the_field('buttonradius', 'option') ?>px <?php the_field('buttonradius', 'option') ?>px !important;
}

/* Style Button bei Mitarbeiter */
.elementor-1440 .elementor-element.elementor-element-c2bcb58 .infiniteScroll button {
    margin-top: 30px;
}

.infiniteScroll button {
    font-size: 15px !important;
    padding: 10px 20px !important;
}
</style>