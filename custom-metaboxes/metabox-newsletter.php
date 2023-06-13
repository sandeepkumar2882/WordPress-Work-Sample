<?php
//custom post data change with every post

function custom_calendar_post_type(){

    add_meta_box("my_calendar_id","my-calendar-metabox","my_newsletter_calendar_metabox_function","calendar","normal","high");
}
add_action("add_meta_boxes_calendar","custom_calendar_post_type");



function my_newsletter_calendar_metabox_function(){
    ?>
        <?php $imgurl = isset( $values['calendar_image_metakey'] ) ? esc_attr( $values['calendar_image_metakey'][0] ) : ''; ?>
        Calendar Image : <input type="file" name="calendar_image" value="<?php echo $imgurl; ?>" alt="calendar-image">
        <input type="text" name="calendar_month" value="<?php echo get_post_meta(get_the_ID(), 'calendar_month_metakey', true); ?>" placeholder="Calendar Month">
    <?php
}

function save_calendar_data($calendar_id){

    $calendar_month_data = sanitize_text_field($_POST['calendar_month']);
    if(isset($_POST['calendar_month'])){
        if(get_post_meta($calendar_id, 'calendar_month_metakey', true) != ''){
            update_post_meta($calendar_id, 'calendar_month_metakey', $calendar_month_data);
        }
        else{
            add_post_meta($calendar_id, 'calendar_month_metakey', $calendar_month_data);
        }
    }
    

    if(isset($_FILES['calendar_image'])){
       $file = $_FILES['calendar_image'];
       $attachment_id =  upload_image_to_media($file['tmp_name'], $file['name']);
       $calendar_url=  wp_get_attachment_url($attachment_id);
            update_post_meta($calendar_id, 'calendar_image_metakey',  $calendar_url);      
    }

}
add_action('save_post','save_calendar_data');


//Static data for all posts on newsletter page

function metabox_newsletter(){
    $specific_page = ['Newsletter'];
    foreach($specific_page as $pages):
        if(get_the_title()==$pages):
            add_meta_box("my_newsletter_id","my-newsletter-metabox","my_newsletter_metabox_function","page","normal","high");
        endif;
    endforeach;
}
add_action("add_meta_boxes_page","metabox_newsletter");


function my_newsletter_metabox_function(){
    ?>
        <input type="text" name="newsletter_heading" value="<?php echo get_post_meta(get_the_ID(), 'news-heading', true); ?>" placeholder="NewsLetter Heading">
        <input type="text-area" name="newsletter_paragraph" value="<?php echo get_post_meta(get_the_ID(), 'news-pargraph', true); ?>" placeholder="NewsLetter Paragraph">
        <?php $imgurl = isset( $values['newsletter_image'] ) ? esc_attr( $values['newsletter_image'][0] ) : ''; ?>
        Newsletter Image : <input type="file" name="newsletter_image" value="<?php echo $imgurl; ?>" alt="calendar-image">
        <input type="text" name="newsletter_archive" value="<?php echo get_post_meta(get_the_ID(), 'news-archive', true); ?>" placeholder="NewsLetter Archive">
        <input type="text-area" name="newsletter_archive_data" value="<?php echo get_post_meta(get_the_ID(), 'news-archive-data', true); ?>" placeholder="NewsLetter Archive Data">
    <?php
}

function save_newsletter_data($post_id){
    $field_data = sanitize_text_field($_POST['newsletter_heading']);
    if(isset($_POST['newsletter_heading'])){
        if(get_post_meta($post_id, 'news-heading', true) != ''){
            update_post_meta($post_id, 'news-heading', $field_data);
        }
        else{
            add_post_meta($post_id, 'news-heading', $field_data);
        }
    }

    $field_data = sanitize_text_field($_POST['newsletter_paragraph']);
    if(isset($_POST['newsletter_paragraph'])){
        if(get_post_meta($post_id, 'news-pargraph', true) != ''){
            update_post_meta($post_id, 'news-pargraph', $field_data);
        }
        else{
            add_post_meta($post_id, 'news-pargraph', $field_data);
        }
    }
    

    if(isset($_FILES['newsletter_image'])){
       $file = $_FILES['newsletter_image'];
       $attachment_id =  upload_image_to_media($file['tmp_name'], $file['name']);
       $attach_url=  wp_get_attachment_url($attachment_id);
            update_post_meta($post_id, 'news-image',  $attach_url);      
    }


    $field_data = sanitize_text_field($_POST['newsletter_archive']);
    if(isset($_POST['newsletter_archive'])){
        if(get_post_meta($post_id, 'news-archive', true) != ''){
            update_post_meta($post_id, 'news-archive', $field_data);
        }
        else{
            add_post_meta($post_id, 'news-archive', $field_data);
        }
    }

    $field_data = sanitize_text_field($_POST['newsletter_archive_data']);
    if(isset($_POST['newsletter_archive_data'])){
        if(get_post_meta($post_id, 'news-archive-data', true) != ''){
            update_post_meta($post_id, 'news-archive-data', $field_data);
        }
        else{
            add_post_meta($post_id, 'news-archive-data', $field_data);
        }
    }
}
add_action('save_post','save_newsletter_data');



?>