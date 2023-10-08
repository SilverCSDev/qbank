<?php
/**
 * Plugin Name: qbankrestapi
 * Description: Custom REST API endpoint for qbank.
 * Version: 1.0
 */

function custom_qbank_api_endpoint() {
    register_rest_route(
        'qbank/v1',
        'qbank-api',
        array(
            'methods'  => 'GET',
            'callback' => 'get_qbank_posts',
        )
    );
}

add_action('rest_api_init', 'custom_qbank_api_endpoint');

function get_qbank_posts($request) {
    $args = array(
        'post_type' => 'quesrion',
        'posts_per_page' => -1, // Get all posts
    );

    $query = new WP_Query($args);

    $response = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Get post data
            $post_data = get_post();
            $post_id = $post_data->ID;

            // Get post meta fields
            $meta_fields = get_post_meta($post_id);

            $response[] = array(
                'post_data' => $post_data,
                'meta_fields' => $meta_fields,
            );
        }
    }

    wp_reset_postdata();

    return rest_ensure_response($response);
}
