<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

if (is_front_page()) {
  $context['is_homepage'] = true;
} else {
  $context['is_homepage'] = false;
}
// ================================================================================
// Team members
// ================================================================================
$context['team_members'] = Timber::get_posts('post_type=team_members');

// ================================================================================
// Footer Info
// ================================================================================
$context['footer'] = get_fields('options');

// ================================================================================
// Submit Resume
// ================================================================================
$context['submit_resume'] = Timber::get_post(134);


Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );