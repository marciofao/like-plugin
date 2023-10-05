<?php
/*
 * Plugin Name:       Like
 * Description:       Cria Botão de like e Shortcodes para ranque de posts: [top-likes]
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Márcio Fão
 * Author URI:        https://marciofao.github.io/
 * Plugin URI:        https://github.com/marciofao/like-buildbox
 * License:           GPL v2 or later
 */

$scripts_version = 1.0;
//dev cache boosting
//$scripts_version = time();

function like_dislike_enqueue_scripts()
{
    global $scripts_version;
    wp_enqueue_script('like-dislike-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), $scripts_version, true);
    wp_enqueue_style('like-dislike-style', plugin_dir_url(__FILE__) . 'css/styles.css');
}

add_action('wp_enqueue_scripts', 'like_dislike_enqueue_scripts');



/**
 * Gerencia o Submit do like
 *
 * @return void
 */
function handle_like_dislike_vote()
{
    $post_id = $_POST['post_id'];
    $vote_type = $_POST['vote_type'];
    $current_vote = get_post_meta($post_id, 'like_dislike_votes', true);

    if ($vote_type === 'like') {
        $current_vote++;
    } elseif ($vote_type === 'dislike' && $current_vote > 0) {
        $current_vote--;
    }

    update_post_meta($post_id, 'like_dislike_votes', $current_vote);
    echo json_encode(array('status' => 'success'));
    die();
}

add_action('wp_ajax_handle_like_dislike_vote', 'handle_like_dislike_vote');


/**
 * Adicionar shortcode [top-liked] para listar posts mais populares
 *
 * @return void
 */
function top_liked_posts_shortcode() {
    $args = array(
        'post_type' => 'post',
        'meta_key' => 'like_dislike_votes',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);
    $output = '<h2>Top Liked</h2>';
    $output.= '<ul class="top-liked-posts"> ';
    
    while ($query->have_posts()) : $query->the_post();
        $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . ' - ' . get_post_meta(get_the_ID(), 'like_dislike_votes', true) . ' Likes</a></li>';
    endwhile;

    $output .= '</ul>';
    wp_reset_postdata();
    return $output;
}



add_shortcode('top-liked', 'top_liked_posts_shortcode');

/**
 * Intercepts content and add button
 *
 * @param string $content
 * @return void
 */
function like_add_the_button($content)
{
    if (is_single()) {
        global $post;
        $content .= '<script>var like_post_id = ' . $post->ID . ';</script>';
        return $content . '<p><u><a  class="like-btn"  data-vote-type="like">Like</a></u> <u><a  class="like-btn"  data-vote-type="dislike">Dislike</a></u></p>';
    }
}
add_filter('the_content', 'like_add_the_button');

