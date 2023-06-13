<?php

add_action('rest_api_init', function(){
    register_rest_route('apisubmit/v2','formsubmitapi',[
        'methods' => 'POST',
        'callback' => 'api_form_submit_callback'
    ]);
});

function api_form_submit_callback(){

    global $wpdb;
    $data = json_encode($_POST);
    $post = $wpdb->insert('custom_api_form_submit', array(
        'submitData' => $data
        // 'email' => $data,
        // 'phoneNumber' => $data,
        // 'address' => $data,
        // 'country' => $data,

    ));
    return rest_ensure_response($_REQUEST);
}

?>