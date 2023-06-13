<?php
/* 
    Template Name: about-us
*/

    //the_field()
    the_field('myname');
    echo "<br>";
    //get_field()
    $file = get_field('job');
    echo $file;
    // echo var_dump($file);
    $fileurl = $file['url'];
    echo "<br>";
    echo get_field('myname'); 
    echo "<br>";
    //add_row()
    add_row('job', 'myjob');
    //get_field_object() 
    $field = get_field_object('job');
    echo $field['label'];
    //get_field_objects()    
    $fields = get_field_objects(); 
    echo $fields['label'];
    echo "<br>";
    //get_fields()
    $get_fields = get_fields();
    if($get_fields):
        foreach($get_fields as $name => $value): ?>
           <h4>Name:</h4> <?php echo $name; ?>
           <h4>Value:</h4> <?php echo $value;
            echo "<br>";
        endforeach;
    endif;
?>
    

    <?php if( have_rows('myname') ): ?>
        <?php while( have_rows('myname') ): the_row(); ?>
            <div class="accordion" id="accordion-<?php echo get_row_index(); ?>">
                <h3><?php the_sub_field('title'); ?></h3>
                <?php the_sub_field('text'); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>