<?php


//Gutenberg est le nouvel éditeur de contenu propre à Wordpress. Il nous interesse pas pour l'utilisation du thème que nous allons créer. On va donc le désactiver.

// Disable Gutenberg on the back end.   = pour posts
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.      = pour widgets
add_filter( 'use_widgets_block_editor', '__return_false' );

//enlever script de Gutenberg
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );


// activer lutilisation de vignettes (d 'images de ecouverture) sur nos post types
add_theme_support( 'post-thumbnails', ['recipe', 'travel']);

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":

register_post_type( 'recipe', [
    'label' => 'Recettes',
    'description' => 'Les recettes liés à nos voyages',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-carrot',
    'public' => true,
    'rewrite'=> [
        'slug' => 'recettes',
        ],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
]);

// add travel post type

register_post_type( 'travel', [
    'label' => 'Voyages',
    'description' => 'Les voyages des derniers années',
    'menu_position' => 7,
    'menu_icon' => 'dashicons-airplane',
    'public' => true,
    'rewrite'=> [
        'slug' => 'voyages',
    ],
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
]);