<?php
if( function_exists('acf_add_options_page') ):

    acf_add_options_page(array(
        'page_title' => 'Grundeinstellungen',
        'menu_slug' => '3d-settings',
        'menu_title' => 'Grundeinstellung',
        'capability' => 'edit_posts',
        'position' => '1.1',
        'parent_slug' => '',
        'icon_url' => 'dashicons-admin-generic',
        'redirect' => true,
        'post_id' => 'options',
        'autoload' => false,
        'update_button' => 'Aktualisierunen',
        'updated_message' => 'Erfolgreich Aktualisiert.',
    ));
    
    acf_add_options_page(array(
        'page_title' => 'Generelle Informationen',
        'menu_slug' => '3d-gernerell',
        'menu_title' => 'Generelle Informationen',
        'capability' => 'edit_posts',
        'position' => '1.1',
        'parent_slug' => '3d-settings',
        'icon_url' => '',
        'redirect' => false,
        'post_id' => 'options',
        'autoload' => true,
        'update_button' => 'Aktualisieren',
        'updated_message' => 'Erfolgreich aktualisiert.',
    ));
    
    acf_add_options_page(array(
        'page_title' => 'Design',
        'menu_slug' => '3d-design',
        'menu_title' => 'Design',
        'capability' => 'edit_posts',
        'position' => '2',
        'parent_slug' => '3d-settings',
        'icon_url' => 'dashicons-admin-customizer',
        'redirect' => false,
        'post_id' => 'options',
        'autoload' => false,
        'update_button' => 'Aktualisieren',
        'updated_message' => 'Erfolgreich aktualisiert.',
    ));
    
    acf_add_options_page(array(
        'page_title' => 'Struktur',
        'menu_slug' => '3d-struktur',
        'menu_title' => 'Struktur',
        'capability' => 'edit_posts',
        'position' => '3',
        'parent_slug' => '3d-settings',
        'icon_url' => '',
        'redirect' => false,
        'post_id' => 'options',
        'autoload' => false,
        'update_button' => 'Update',
        'updated_message' => 'Options Updated',
    ));
    
    endif;