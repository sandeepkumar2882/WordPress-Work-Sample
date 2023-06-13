<?php

//It required for load to wp_mail function
require_once("../../../../wp-load.php");

add_filter('wp_mail_content_type', function( $content_type ) {
    return 'text/html';
});

require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../../wp-config.php');
if (isset($_POST['name'])):
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $email = $_POST['email'];
    $current_salary = $_POST['current_salary'];
    $referred_by = $_POST['referred_by'];
    $expected_salary = $_POST['expected_salary'];
    $hometown = $_POST['hometown'];
    //code for attachment store into media of wordpress
    $file = $_FILES['attach-resume'];

    $attachment_id =  upload_image_to_media($file['tmp_name'], $file['name']);
    $meta_key = get_post_meta($attachment_id, '_wp_attached_file', true);
    $attachments= wp_upload_dir()['basedir']."/".$meta_key;

    global $wpdb;
    $table_name=$wpdb->prefix.'custom_form';

    if($wpdb->query("INSERT INTO wp_custom_form(name,phone,experience,email,current_salary,referred_by,expected_salary,hometown,attach_resume) VALUES('$name','$phone','$experience','$email','$current_salary','$referred_by','$expected_salary','$hometown','$meta_key')"))
    {
        $to = 'shailaansandeep@gmail.com';
        $subject = 'New User as '.$name;      
        $html = "  
        <head>
            <style>
                table{
                    min-width:1000px;
                    color:red; border:solid green 2px; text-align:center; background-color:sky-blue; 
                    border-collapse:collapse; 
                }
                th,td{
                    border: 1px solid black;
                }
            </style>
        </head>
        <body><table><tr><th> Name</th> <th> Phone</th> <th> Experience</th> <th> Email</th> <th> Current Salary</th> <th> Referred By</th> <th> Expected Salary</th> <th> HomeTown</th></tr><tr> <td> $name</td> <td>  $phone</td> <td>  $experience</td> <td>$email</td> <td>$current_salary </td> <td>  $referred_by</td> <td> $expected_salary</td> <td>  $hometown</td> <td> $attach </td> </tr></table>
        </body>";
        
        //it will get proper path of the attachment
        $headers = array( 'Content-Type: text/html; charset=UTF-8' );
        
        //wp mail accepts fix 5 parameters, if u give more than 5 than it will check only 5 not next
        if(wp_mail( $to, $subject, $html, $headers, $attachments )){        
            header('Location: http://dynamic.test/wp-content/plugins/sandeep-custom-plugin/includes/thank-you.php');
        }
        else{
            echo " Mail not sent "; 
        }
    }
    else{
        echo " data not submitted ";
    }
endif;

?>
