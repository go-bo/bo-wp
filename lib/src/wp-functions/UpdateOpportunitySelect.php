<?php

add_filter( 'gform_pre_render_1', 'populate_posts' );
add_filter( 'gform_pre_validation_1', 'populate_posts' );
add_filter( 'gform_pre_submission_filter_1', 'populate_posts' );
add_filter( 'gform_admin_pre_render_1', 'populate_posts' );
function populate_posts( $form ) {

    foreach ( $form['fields'] as &$field ) {
       // console_dump($field);
        if ( $field->type != 'multiselect' || strpos( $field->cssClass, 'populate-posts' ) === false ) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_type=opportunities' );

        $choices = array();

        foreach ( $posts as $post ) {
            setup_postdata($post);
            $currentID = $post->ID;
            $opportunity_identifier = get_field('opportunity_identifier', $currentID);
            $choices[] = array( 'text' => $post->post_title, 'value' => $currentID);
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select an Opportunity';
        $field->choices = $choices;

    }

    return $form;
}

add_filter( 'gform_notification_1', 'change_notification_format', 10, 3 );
function change_notification_format( $notification, $form, $entry ) {

    // change notification format to text from the default html
    //$notification['message_format'] = 'text';

    console_dump($form);


    return $notification;
}