<?php $menus = block_value('menus-fetch'); 
?>
<?php wp_nav_menu(
              array(
                'theme-location' => $menus,
                'options_page' => 'option',
                'container' => '',
                'li_class' => 'nav-item',
                'a_class' => 'nav-link',
                'active_class' =>'active'
              )
            ) ?>