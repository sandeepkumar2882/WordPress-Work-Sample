<?php
    /*
        Plugin Name: Sandeep Plugin
        Description: This is a simple plugin for purpose of learning about wordpress meta boxes
        Version: 1.0.0
        Author: Rubico IT
    */

    function custom_metabox(){

        //post
        add_meta_box("my_post_id","my post metabox","my_posts_function","post","normal","high");

    }
    add_action("add_meta_boxes","custom_metabox");

    //custom post meta box
    function custom_post_type(){

        add_meta_box("my_blogs_id","my-positions-metabox","my_positions_function","positions","normal","high");
    }
    add_action("add_meta_boxes_positions","custom_post_type");

    //wp dashboard setup
    function register_dashboard_metabox(){

        add_meta_box("my_dashboard_id","my dashboard metabox","my_dashboard_function","dashboard","normal","high");

    }
    add_action("wp_dashboard_setup","register_dashboard_metabox");

    function my_dashboard_function(){
        echo "Hii Dashboard";
    }

    function my_positions_function(){
        ?>
        <form>
        <label for="my_meta_field_1">My Meta Field 1 </label>
        <input type="text" placeholder="Your First Name" name="my_meta_field_1" value="<?php echo get_post_meta(get_the_ID(), 'my-meta-data', true); ?>">
        <label for="my_meta_field_1">My Meta Field 2 </label>
        <input type="text" placeholder="Your Last Name" name="my_meta_field_2" value="<?php echo get_post_meta(get_the_ID(), 'my-second-meta-data', true); ?>">
        </form>
        <?php
    }

    function save_my_meta_data($post){
        $field_data = sanitize_text_field($_POST['my_meta_field_1']);
        if(isset($_POST['my_meta_field_1'])){
            if(get_post_meta($post, 'my-meta-data', true) != ''){
                update_post_meta($post, 'my-meta-data', $field_data);
            }
            else{
                add_post_meta($post, 'my-meta-data', $field_data);
            }
        }
    }
    add_action('save_post','save_my_meta_data');

    function save_my_second_meta_data($post){
        $field_data = sanitize_text_field($_POST['my_meta_field_2']);
        if(isset($_POST['my_meta_field_2'])){
            if(get_post_meta($post, 'my-second-meta-data', true) != ''){
                update_post_meta($post, 'my-second-meta-data', $field_data);
            }
            else{
                add_post_meta($post, 'my-second-meta-data', $field_data);
            }
        }
    }
    add_action('save_post','save_my_second_meta_data');

    function my_posts_function(){
        echo "Hii Posts";
        ?>
        <input type="text" placeholder="Your Name">
        <?php
    }

    function my_pages_function(){
        echo "Hii Pages";
    }


    //remove meta boxes

        //wp dashboard setup
    function remove_dashboard_metabox(){

        remove_meta_box("dashboard_site_health","dashboard","normal");
        remove_meta_box("dashboard_quick_press","dashboard","side");

        //These are default meta boxes provided by WordPress we can remove these by this technique

        // remove_meta_box("dashboard_right_now","dashboard","side");
        // remove_meta_box("dashboard_recent_comments","dashboard","side");
        // remove_meta_box("dashboard_incoming_links","dashboard","side");
        // remove_meta_box("dashboard_plugins","dashboard","side");
        // remove_meta_box("dashboard_recent_drafts","dashboard","side");
        // remove_meta_box("dashboard_primary","dashboard","side");
        // remove_meta_box("dashboard_secondary","dashboard","side");
    }
    add_action("wp_dashboard_setup","remove_dashboard_metabox");



// dropdown list of authors

    function custom_meta_author_list(){

        add_meta_box("my_author_id","my-author-metabox","my_author_function","positions","normal","high");
    }
    add_action("add_meta_boxes_positions","custom_meta_author_list");

    function my_author_function(){
        ?>
            <p>
                <label for="ddauthor">Select author</label>
                <select name="ddauthor">
                    <?php 
                        $all_authors = get_users(array("role" => "author")); 
                        foreach($all_authors as $author):
                    ?>
                    <option value="<?php echo $author->data->ID;?>"><?php echo $author->data->display_name ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
        <?php
    }

    add_action('save_post','cutom_author_callback_function');
    
    function custom_author_callback_function(){
        echo "hii custom author";

    }

?>