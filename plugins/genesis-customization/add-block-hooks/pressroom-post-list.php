<?php
/* 
  Create Pressroom Post List block(block fields) for the back-end(dashboard).
  Created By: Sandeep
*/

// Needed for adding the PHP Template Method blocks from within the plugin
use function Genesis\CustomBlocks\add_block;

add_block(
    'custom-genesis-pressroom-post-list',
    array(
        'title' => 'Pressroom Post List',
        'category' => 'common',
        'icon' => 'account_circle',
        'keywords' => array('text', 'post', 'image', 'pagination', 'category', 'pressroom', 'title', 'post list', 'category post'),
        'displayModal' => false,
        'fields' => array(
            'background-color' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'options' =>
                        array(
                            0 =>
                                array(
                                    'value' => '',
                                    'label' => __('Select Background Color', 'enhabitPressroomPostList'),
                                ),
                            1 =>
                                array(
                                    'value' => 'bkg-purple-25',
                                    'label' => __('purple 25', 'enhabitPressroomPostList'),
                                ),
                            2 =>
                                array(
                                    'value' => 'bkg-purple-10',
                                    'label' => __('purple 10', 'enhabitPressroomPostList'),
                                ),
                            3 =>
                                array(
                                    'value' => 'bkg-orange-25',
                                    'label' => __('orange 25', 'enhabitPressroomPostList'),
                                ),
                            4 =>
                                array(
                                    'value' => 'bkg-orange-10',
                                    'label' => __('orange 10', 'enhabitPressroomPostList'),
                                ),
                            5 =>
                                array(
                                    'value' => 'bkg-teal-50',
                                    'label' => __('Teal 50', 'enhabitPressroomPostList'),
                                ),
                            6 =>
                                array(
                                    'value' => 'bkg-teal-35',
                                    'label' => __('Teal 35', 'enhabitPressNews'),
                                ),
                            7 =>
                                array(
                                    'value' => 'bkg-teal-15',
                                    'label' => __('Teal 15', 'enhabitPressNews'),
                                ),
                            8 =>
                                array(
                                    'value' => 'bkg-pink-25',
                                    'label' => __('Pink 25', 'enhabitPressNews'),
                                ),
                            9 =>
                                array(
                                    'value' => 'bkg-pink-10',
                                    'label' => __('Pink 10', 'enhabitPressNews'),
                                ),
                            10 =>
                                array(
                                    'value' => 'bkg-blue-25',
                                    'label' => __('Blue 25', 'enhabitPressNews'),
                                ),
                            11 =>
                                array(
                                    'value' => 'bkg-blue-10',
                                    'label' => __('Blue 10', 'enhabitPressNews'),
                                ),
                            12 =>
                                array(
                                    'value' => 'bkg-gradient-purple',
                                    'label' => __('Gradient purple', 'enhabitPressNews'),
                                ),
                            13 =>
                                array(
                                    'value' => 'bkg-gradient-orange',
                                    'label' => __('Gradient orange', 'enhabitPressNews'),
                                ),
                            14 =>
                                array(
                                    'value' => 'bkg-purple-bottom',
                                    'label' => __('Purple bottom', 'enhabitPressNews'),
                                ),
                            15 =>
                                array(
                                    'value' => 'bkg-orange-bottom',
                                    'label' => __('Orange bottom', 'enhabitPressNews'),
                                ),
                            16 =>
                                array(
                                    'value' => 'bkg-purple-top',
                                    'label' => __('Purple-top', 'enhabitPressNews'),
                                ),
                            17 =>
                                array(
                                    'value' => 'bkg-orange-top',
                                    'label' => __('Orange top ', 'enhabitPressNews'),
                                ),
                            18 =>
                                array(
                                    'value' => 'bkg-purple-mid',
                                    'label' => __('Purple-mid', 'enhabitPressNews'),
                                ),
                            19 =>
                                array(
                                    'value' => 'bkg-orange-mid',
                                    'label' => __('Orange mid', 'enhabitPressNews'),
                                ),
                        ),
                    'default' => 'white',
                    'name' => 'background-color',
                    'label' => __('Background Color', 'enhabitPressroomPostList'),
                    'order' => 0,
                    'control' => 'select',
                    'type' => 'string',
                ),
            'title' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => 'Browse our Posts',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'title',
                    'label' => __('Heading', 'enhabitPressroomPostList'),
                    'control' => 'text',
                    'type' => 'string',
                    'order' => 1,
                ),
            'content' =>
                array(
                    'location' => 'editor',
                    'width' => '50',
                    'help' => '',
                    'default' => 'Default content for this block, You can edit it by dashboard where you are using it. It will shown downside of the heading.',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'content',
                    'label' => __('Content', 'enhabitPressroomPostList'),
                    'control' => 'textarea',
                    'type' => 'string',
                    'order' => 2,
                ),
            'posts-per-page' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'options' => array( 0=>array('label'=>'5', 'value'=>'5'), 1=>array('label'=>'10', 'value'=>'10'),
                        2=> array('label'=>'15', 'value'=>'15'), 3 => array('label' => '20', 'value' => '20')),
                    'default' => '10',
                    'name' => 'posts-per-page',
                    'label' => __('Posts per page', 'enhabitPaginatedPostList'),
                    'control' => 'select',
                    'type' => 'string',
                    'order' => 4,
                ),
            'select-post-category' =>
                array(
                    'location' => 'editor',
                    'width' => '50',
                    'help' => 'Choose a category or leave empty for all posts.',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name'=>'select-post-category',
                    'options'=> getCategories(),
                    'default' => '',
                    'label' => __('Category', 'enhabitPressroomPostList'),
                    'control' => 'select',
                    'type' => 'string',
                    'order' => 3,
                ),
            'order-by' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name'=>'order-by',
                    'options'=> array( 0 => array('label'=>'Newest', 'value'=>'DESC'),
                        1 => array('label'=>'Oldest', 'value'=>'ASC'), 2 => array('label'=>'Name', 'value'=>'title')),
                    'default' => 'DESC',
                    'label' => __('Order By', 'enhabitPressroomPostList'),
                    'control' => 'select',
                    'type' => 'string',
                    'order' => 5,
                ),
        ),
    )
);

function getCategories(){
    $categories = get_categories();
    $categoryArray = array(array('value' => '', 'label' => 'Select Category'));
    foreach($categories as $cat):
        $categoryArray[] = array('value' =>$cat->term_id, 'label' => $cat->name );
    endforeach;
    return $categoryArray;
}
