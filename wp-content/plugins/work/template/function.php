<?php

/* HIDE BACKEND MENU */
function remove_menus(){
// get current login user's role
$roles = wp_get_current_user()->roles;
//  role
if( !in_array('editor',$roles)){
return;
}
//remove menu from site backend.
remove_menu_page( 'edit.php?post_type=elementor_library' ); // Elementor Templates
remove_menu_page( 'elementor' ); // Elementor
remove_menu_page( 'edit.php?post_type=page' ); // Seiten bearbeiten
remove_menu_page( 'edit.php' ); // Beiträge/Blog	
remove_menu_page( 'edit-comments.php' ); // Komment	
remove_menu_page( 'tools.php' ); // Werkzeuge		
}
add_action( 'admin_menu', 'remove_menus' , 100 );

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

/* ADD FUNCTION Reverse Columns */
function add_responsive_column_order( $element, $args ) {
    $element->add_responsive_control(
    'responsive_column_order',
    [
    'label' => __( 'Responsive Column Order', 'elementor-extras' ),
    'type' => \Elementor\Controls_Manager::NUMBER,
    'separator' => 'before',
    'selectors' => [
    '{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
    ],
    ]
    );
    }
    add_action( 'elementor/element/column/layout/before_section_end', 'add_responsive_column_order', 10, 3 );

////// ADD FAVICON //////
function my_favicon() { ?>
<link rel="shortcut icon" href="<?php the_field('favicon_der_webseite', 'option') ?>" >
<link rel="icon" href="<?php the_field('favicon_der_webseite', 'option') ?>" sizes="32x32">
<link rel="icon" href="<?php the_field('favicon_der_webseite', 'option') ?>" sizes="192x192">
<link rel="apple-touch-icon" href="<?php the_field('favicon_der_webseite', 'option') ?>">

<?php }