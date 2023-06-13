<?php
/* 
  Create Future of Enhabit block(block fields) for the back-end(dashboard).
  Created By: Sandeep Kumar
*/

// Needed for adding the PHP Template Method blocks from within the plugin
use function Genesis\CustomBlocks\add_block;

add_block(
    'custom-genesis-future-of-enhabit',
    array(
        'title' => 'Future Of Enhabit',
        'category' => 'common',
        'icon' => 'account_circle',
        'keywords' => array('enhabit future', 'jobs enhabit', 'ehab', 'enhabit', 'future of enhabit', 'future'),
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
                                    'label' => __('Select Background Color', 'enhabitFutureOfEnhabit'),
                                ),
                            1 =>
                                array(
                                    'value' => 'bkg-purple-25',
                                    'label' => __('purple 25', 'enhabitFutureOfEnhabit'),
                                ),
                            2 =>
                                array(
                                    'value' => 'bkg-purple-10',
                                    'label' => __('purple 10', 'enhabitFutureOfEnhabit'),
                                ),
                            3 =>
                                array(
                                    'value' => 'bkg-orange-25',
                                    'label' => __('orange 25', 'enhabitFutureOfEnhabit'),
                                ),
                            4 =>
                                array(
                                    'value' => 'bkg-orange-10',
                                    'label' => __('orange 10', 'enhabitFutureOfEnhabit'),
                                ),
                            5 =>
                                array(
                                    'value' => 'bkg-teal-50',
                                    'label' => __('Teal 50', 'enhabitFutureOfEnhabit'),
                                ),
                            6 =>
                                array(
                                    'value' => 'bkg-teal-35',
                                    'label' => __('Teal 35', 'enhabitFutureOfEnhabit'),
                                ),
                            7 =>
                                array(
                                    'value' => 'bkg-teal-15',
                                    'label' => __('Teal 15', 'enhabitFutureOfEnhabit'),
                                ),
                            8 =>
                                array(
                                    'value' => 'bkg-pink-25',
                                    'label' => __('Pink 25', 'enhabitFutureOfEnhabit'),
                                ),
                            9 =>
                                array(
                                    'value' => 'bkg-pink-10',
                                    'label' => __('Pink 10', 'enhabitFutureOfEnhabit'),
                                ),
                            10 =>
                                array(
                                    'value' => 'bkg-blue-25',
                                    'label' => __('Blue 25', 'enhabitFutureOfEnhabit'),
                                ),
                            11 =>
                                array(
                                    'value' => 'bkg-blue-10',
                                    'label' => __('Blue 10', 'enhabitFutureOfEnhabit'),
                                ),
                            12 =>
                                array(
                                    'value' => 'bkg-gradient-purple',
                                    'label' => __('Gradient purple', 'enhabitFutureOfEnhabit'),
                                ),
                            13 =>
                                array(
                                    'value' => 'bkg-gradient-orange',
                                    'label' => __('Gradient orange', 'enhabitFutureOfEnhabit'),
                                ),
                            14 =>
                                array(
                                    'value' => 'bkg-purple-bottom',
                                    'label' => __('Purple bottom', 'enhabitFutureOfEnhabit'),
                                ),
                            15 =>
                                array(
                                    'value' => 'bkg-orange-bottom',
                                    'label' => __('Orange bottom', 'enhabitFutureOfEnhabit'),
                                ),
                            16 =>
                                array(
                                    'value' => 'bkg-purple-top',
                                    'label' => __('Purple-top', 'enhabitFutureOfEnhabit'),
                                ),
                            17 =>
                                array(
                                    'value' => 'bkg-orange-top',
                                    'label' => __('Orange top ', 'enhabitFutureOfEnhabit'),
                                ),
                            18 =>
                                array(
                                    'value' => 'bkg-purple-mid',
                                    'label' => __('Purple-mid', 'enhabitFutureOfEnhabit'),
                                ),
                            19 =>
                                array(
                                    'value' => 'bkg-orange-mid',
                                    'label' => __('Orange mid', 'enhabitFutureOfEnhabit'),
                                ),
                        ),
                    'default' => 'white',
                    'name' => 'background-color',
                    'label' => __('Background Color', 'enhabitFutureOfEnhabit'),
                    'order' => 0,
                    'control' => 'select',
                    'type' => 'string',
                ),
            'title' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'title',
                    'label' => __('Heading', 'enhabitFutureOfEnhabit'),
                    'control' => 'text',
                    'type' => 'string',
                    'order' => 1,
                ),
            'content' =>
                array(
                    'location' => 'editor',
                    'width' => '50',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'number_rows' => 4,
                    'new_lines' => 'autop',
                    'name' => 'content',
                    'label' => __('Content', 'enhabitFutureOfEnhabit'),
                    'control' => 'textarea',
                    'type' => 'string',
                    'order' => 2,
                ),
            'button-1-text' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'button-1-text',
                    'label' => __('Button 1 Text', 'enhabitFutureOfEnhabit'),
                    'control' => 'text',
                    'type' => 'string',
                    'order' => 3,
                ),
            'button-1-url' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'button-1-url',
                    'label' => __('Button 1 URL', 'enhabitFutureOfEnhabit'),
                    'control' => 'url',
                    'type' => 'string',
                    'order' => 4,
                ),
            'button-2-text' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'button-2-text',
                    'label' => __('Button 2 Text', 'enhabitFutureOfEnhabit'),
                    'control' => 'text',
                    'type' => 'string',
                    'order' => 5,
                ),
            'button-2-url' =>
                array(
                    'location' => 'editor',
                    'width' => '25',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'button-2-url',
                    'label' => __('Button 2 URL', 'enhabitFutureOfEnhabit'),
                    'control' => 'url',
                    'type' => 'string',
                    'order' => 6,
                ),
            'add-swiper-slider' =>
                array(
                    'help' => '',
                    'min' => 1,
                    'max' => 10,
                    'sub_fields' =>
                        array(
                            'swiper-slider-title' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '50',
                                    'help' => '',
                                    'default' => '',
                                    'placeholder' => '',
                                    'maxlength' => '',
                                    'name' => 'swiper-slider-title',
                                    'label' => __('Add Title (Required)', 'enhabitFutureOfEnhabit'),
                                    'control' => 'text',
                                    'type' => 'string',
                                    'order' => 0,
                                    'parent' => 'add-swiper-slider',
                                ),
                            'swiper-slider-image' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '50',
                                    'help' => __('Optimal image size 295px x 263px', 'enhabitFutureOfEnhabit'),
                                    'name' => 'swiper-slider-image',
                                    'label' => __('Add Image (Required)', 'enhabitFutureOfEnhabit'),
                                    'order' => 1,
                                    'control' => 'image',
                                    'type' => 'integer',
                                    'parent' => 'add-swiper-slider',
                                ),
                            'swiper-slider-designation' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '50',
                                    'help' => '',
                                    'default' => '',
                                    'placeholder' => '',
                                    'maxlength' => '',
                                    'name' => 'swiper-slider-designation',
                                    'label' => __('Add Designation (Required)', 'enhabitFutureOfEnhabit'),
                                    'control' => 'text',
                                    'type' => 'string',
                                    'order' => 3,
                                    'parent' => 'add-swiper-slider',
                                ),
                        ),
                    'name' => 'add-swiper-slider',
                    'label' => __('Add Tab', 'enhabitFutureOfEnhabit'),
                    'location' => 'editor',
                    'order' => 8,
                    'control' => 'repeater',
                    'type' => 'object',
                ),
        ),
    )
);