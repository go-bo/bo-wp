<?php

add_action( 'gform_pre_submission_1', 'pre_submission_handler' );
function pre_submission_handler( $form ) {
    // create empty array
    $selectedOpportunities = array();
    
    foreach ($_POST['input_9'] as $choice) {
        //console_dump($choice . "\n Bullhorn id #1234");
        $opportunityTitle = get_the_title($choice);
        $opportunity_identifier = get_field('opportunity_identifier', $choice);
        if($opportunity_identifier) {
            $opportunity_identifier = " — " . $opportunity_identifier;
        }
        //$selectedOpportunities[] = array('name' => $opportunityTitle, 'identifier' => $opportunity_identifier);
        array_push($selectedOpportunities, $opportunityTitle . $opportunity_identifier);
    }
    $_POST['input_9'] = $selectedOpportunities;
    console_dump($_POST['input_9']);
}