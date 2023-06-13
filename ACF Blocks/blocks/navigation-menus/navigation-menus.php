<?php  

$menuLocation = get_field('menus_list');
$headerLogo = get_field('header_logo');
$applyNowLink = get_field('header_apply_now');

?>

<nav class="navbar">
    <!-- Rubico Logo -->
    <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
        <img src="<?php echo $headerLogo['url']; ?>" class="navbar-img lozad" alt="Rubico IT Logo">
    </a>
    <?php 
      if( $applyNowLink ): 
            $linkUrl = $applyNowLink['url'];
            $linkTitle = $applyNowLink['title'];
            $linkTarget = $applyNowLink['target'] ? $applyNowLink['target'] : '_self';
      ?>
    <a class="nav-link btn-primary ml-auto" href="<?php esc_url( $linkUrl ); ?>"
        target="<?php echo esc_attr( $linkTarget ); ?>"> <?php echo $linkTitle; ?></a>
    <?php endif; ?>
    <!-- Navbar Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="top-bar navbar-hamburger-icon"></span>
        <span class="middle-bar navbar-hamburger-icon"></span>
        <span class="bottom-bar navbar-hamburger-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav text-right w-100">
            <li class="nav-item"><a class="nav-link">
                    <?php wp_nav_menu(
              array(
                'theme-location' => $menuLocation,
                'options_page' => 'option',
                'container' => '',
                'li_class' => 'nav-item',
                'a_class' => 'nav-link',
                'active_class' =>'active'
              )
            ) ?></a>
            </li>
            <li class="nav-item">
                <?php 
            while(have_rows('social_icons_repeater')): 
              the_row();
          ?>
                <a href="<?php echo get_sub_field('rubico_social_icons')['url']; ?> "><i
                        class="fab <?php echo get_sub_field('rubico_social_icons')['title']; ?> social-links"></i></a>
                <?php endwhile; ?>
            </li>
        </ul>
    </div>
</nav>