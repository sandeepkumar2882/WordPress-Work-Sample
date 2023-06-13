<?php
// Needed for adding the PHP Template Method blocks from within the plugin
use function Genesis\CustomBlocks\add_block;

add_block(
    'custom-genesis-rich-toggle-block', 
    array( 
        'title'    => 'Rich Toggle Block', 
        'category' => 'common', 
        'icon'     => 'waves', 
        // 'excluded' => array( 'page' ), 
        'keywords' => array( 'sad', 'glad', 'bad' ), 
        'fields'   => array( 
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
                                    'label' => __('Select Background Color', 'enhabitRichToggleBlock'),
                                ),
                            1 =>
                                array(
                                    'value' => 'bkg-purple-25',
                                    'label' => __('purple 25', 'enhabitRichToggleBlock'),
                                ),
                            2 =>
                                array(
                                    'value' => 'bkg-purple-10',
                                    'label' => __('purple 10', 'enhabitRichToggleBlock'),
                                ),
                            3 =>
                                array(
                                    'value' => 'bkg-orange-25',
                                    'label' => __('orange 25', 'enhabitRichToggleBlock'),
                                ),
                            4 =>
                                array(
                                    'value' => 'bkg-orange-10',
                                    'label' => __('orange 10', 'enhabitRichToggleBlock'),
                                ),
                            5 =>
                                array(
                                    'value' => 'bkg-teal-50',
                                    'label' => __('Teal 50', 'enhabitRichToggleBlock'),
                                ),
                        ),
                    'default' => 'white',
                    'name' => 'background-color',
                    'label' => __('Background Color', 'enhabitRichToggleBlock'),
                    'order' => 0,
                    'control' => 'select',
                    'type' => 'string',
                ),
            'toggle-block-title' => array(
                'label' => 'Toggle Block Title',
                'control' => 'text',
                'width'   => '100', 
                'default' => true,
            ),
            'thin' => array( 
                'label'   => 'Thin', 
                'control' => 'toggle', 
                'width'   => '25', 
                'default' => true, 
                ), 
            'fat' => array( 
                'label'   => 'Fat', 
                'control' => 'toggle', 
                'width'   => '25', 
                'default' => false, 
                ), 
            'colour'  => array( 
                'label'   => 'Colour', 
                'control' => 'select', 
                'width'   => '50', 
                'options' => array( 
                    array( 
                        'label' => 'Yellow', 
                        'value' => 'yellow', 
                    ), 
                    array( 
                        'label' => 'Red', 
                        'value' => 'red', 
                        ), 
                    array( 
                        'label' => 'Blue', 
                        'value' => 'blue', 
                        ), 
                    ), 
                ), 
            ), 
        ) 
    ); 