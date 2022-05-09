<?php 

    // Custom Post type para Banner

        add_action( 'init', 'register_cpt_banner' );

        function register_cpt_banner() {

            $labels = array( 
                'name' => _x( 'Banners', 'banner' ),
                'singular_name' => _x( 'Banner', 'banner' ),
                'add_new' => _x( 'Adicionar Novo', 'banner' ),
                'add_new_item' => _x( 'Adicionar Novo Banner', 'banner' ),
                'edit_item' => _x( 'Editar Banner', 'banner' ),
                'new_item' => _x( 'Novo Banner', 'banner' ),
                'view_item' => _x( 'Ver Banner', 'banner' ),
                'search_items' => _x( 'Buscar Banners', 'banner' ),
                'not_found' => _x( 'Nenhum Banner Encontrado', 'banner' ),
                'not_found_in_trash' => _x( 'Nenhum Banner Encontrado na lixeira', 'banner' ),
                'parent_item_colon' => _x( 'Parent Banner:', 'banner' ),
                'menu_name' => _x( 'Banners', 'banner' ),
            );

            $args = array( 
                'labels' => $labels,
                'hierarchical' => false,
                'description' => 'Custom post type para banners',
                'supports' => array( 'title', 'thumbnail', 'page-attributes' ),
                
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-images-alt2',
                'show_in_nav_menus' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'has_archive' => false,
                'query_var' => true,
                'can_export' => true,
                'rewrite' => true,
                'capability_type' => 'post'
            );

            register_post_type( 'banner', $args );
        }