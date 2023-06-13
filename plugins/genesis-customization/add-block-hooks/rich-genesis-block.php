<?php
// Needed for adding the PHP Template Method blocks from within the plugin
use function Genesis\CustomBlocks\add_block;

add_block(
    'custom-genesis-rich-genesis-block',
    array(
        'title' => 'Rich Genesis Block',
        'category' => 'common',
        'icon' => 'account_circle',
        'keywords' => array('text', 'post', 'image'),
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
                                    'label' => __('Select Background Color', 'enhabitRichGenesisBlock'),
                                ),
                            1 =>
                                array(
                                    'value' => 'bkg-purple-25',
                                    'label' => __('purple 25', 'enhabitRichGenesisBlock'),
                                ),
                            2 =>
                                array(
                                    'value' => 'bkg-purple-10',
                                    'label' => __('purple 10', 'enhabitRichGenesisBlock'),
                                ),
                            3 =>
                                array(
                                    'value' => 'bkg-orange-25',
                                    'label' => __('orange 25', 'enhabitRichGenesisBlock'),
                                ),
                            4 =>
                                array(
                                    'value' => 'bkg-orange-10',
                                    'label' => __('orange 10', 'enhabitRichGenesisBlock'),
                                ),
                            5 =>
                                array(
                                    'value' => 'bkg-teal-50',
                                    'label' => __('Teal 50', 'enhabitRichGenesisBlock'),
                                ),
                        ),
                    'default' => 'white',
                    'name' => 'background-color',
                    'label' => __('Background Color', 'enhabitRichGenesisBlock'),
                    'order' => 0,
                    'control' => 'select',
                    'type' => 'string',
                ),
            'rich-title' =>
                array(
                    'location' => 'editor',
                    'width' => '100',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'name' => 'title',
                    'label' => __('Rich Title', 'enhabitRichGenesisBlock'),
                    'control' => 'text',
                    'type' => 'string',
                    'order' => 1,
                ),
            'rich-content' =>
                array(
                    'location' => 'editor',
                    'width' => '100',
                    'help' => '',
                    'default' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'number_rows' => 4,
                    'new_lines' => 'autop',
                    'name' => 'content',
                    'label' => __('Rich Content', 'enhabitRichGenesisBlock'),
                    'order' => 2,
                    'control' => 'textarea',
                    'type' => 'string',
                ),
                'add-cards' =>
                array(
                    'help' => '',
                    'min' => '',
                    'max' => 6,
                    'sub_fields' =>
                        array(
                            'card-icon' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '25',
                                    'help' => '',
                                    'name' => 'card-icon',
                                    'label' => __('Card Icon (Required)', 'enhabitRichGenesisBlock'),
                                    'order' => 0,
                                    'control' => 'image',
                                    'type' => 'integer',
                                    'parent' => 'add-cards',
                                ),
                            'title' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '50',
                                    'help' => '',
                                    'default' => '',
                                    'placeholder' => '',
                                    'maxlength' => '',
                                    'name' => 'title',
                                    'label' => __('Title (Required)', 'enhabitRichGenesisBlock'),
                                    'control' => 'text',
                                    'type' => 'string',
                                    'order' => 1,
                                    'parent' => 'add-cards',

                                ),
                            'excerpt' =>
                                array(
                                    'location' => 'editor',
                                    'width' => '25',
                                    'help' => '',
                                    'default' => '',
                                    'placeholder' => '',
                                    'maxlength' => '',
                                    'name' => 'excerpt',
                                    'label' => __('Excerpt (Required)', 'enhabitRichGenesisBlock'),
                                    'control' => 'textarea',
                                    'type' => 'string',
                                    'order' => 2,
                                    'parent' => 'add-cards',
                                ),

                        ),
                    'name' => 'add-cards',
                    'label' => __('Add Cards', 'enhabitRichGenesisBlock'),
                    'location' => 'editor',
                    'order' => 3,
                    'control' => 'repeater',
                    'type' => 'object',
                ),
        ),
    )
);
