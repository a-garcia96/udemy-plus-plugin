<?php

function up_recipe_post_type()
{
    $labels = array(
        'name' => _x('recipes', 'Post type general name', 'udemy-plus'),
        'singular_name' => _x('recipe', 'Post type singular name', 'udemy-plus'),
        'menu_name' => _x('recipes', 'Admin Menu text', 'udemy-plus'),
        'name_admin_bar' => _x('recipe', 'Add New on Toolbar', 'udemy-plus'),
        'add_new' => __('Add New', 'udemy-plus'),
        'add_new_item' => __('Add New recipe', 'udemy-plus'),
        'new_item' => __('New recipe', 'udemy-plus'),
        'edit_item' => __('Edit recipe', 'udemy-plus'),
        'view_item' => __('View recipe', 'udemy-plus'),
        'all_items' => __('All recipes', 'udemy-plus'),
        'search_items' => __('Search recipes', 'udemy-plus'),
        'parent_item_colon' => __('Parent recipes:', 'udemy-plus'),
        'not_found' => __('No recipes found.', 'udemy-plus'),
        'not_found_in_trash' => __('No recipes found in Trash.', 'udemy-plus'),
        'featured_image' => _x('recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'udemy-plus'),
        'archives' => _x('recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'udemy-plus'),
        'insert_into_item' => _x('Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'udemy-plus'),
        'uploaded_to_this_item' => _x('Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'udemy-plus'),
        'filter_items_list' => _x('Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'udemy-plus'),
        'items_list_navigation' => _x('recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'udemy-plus'),
        'items_list' => _x('recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'udemy-plus'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'recipe'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
        'description' => __('A custom post type for recipes', 'udemy-plus'),
        'taxonomies' => ['category', 'post_tag']
    );

    register_post_type('recipe', $args);

    register_taxonomy('cuisine', 'recipe', [
        'label' => __("Cuisine", 'udemy-plus'),
        'rewrite' => ['slug' => 'cuisine'],
        'show_in_rest' => true
    ]);
}