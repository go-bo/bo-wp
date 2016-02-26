<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array('page--opportunities.twig', 'archive.twig', 'index.twig' );

$context = Timber::get_context();

$post = new TimberPost();
$context['post'] = $post;
$context['title'] = post_type_archive_title( '', false );

/*
global $paged;
if (!isset($paged) || !$paged){
  $paged = 1;
}
*/




// ================================================================================
// Opportunities
// ================================================================================

$args = array('post_type' => 'opportunities');
query_posts($args);

/*
$custom_query = new WP_Query($args);
while($custom_query->have_posts()) {
    $custom_query->the_post(); 
*/

$context['posts'] = Timber::get_posts();

$context['position_types'] = Timber::get_terms('opportunity_type');










/*
$context['pagination'] = Timber::get_pagination();
$context['categories'] = Timber::get_terms('category');
$context['page_headline'] = get_field('page_headline', 54);
$context['page_subhead'] = get_field('page_subhead', 54);
*/

// Get Footer info
$context['footer'] = get_fields('options');

console_dump($context['posts']);
Timber::render( $templates, $context );