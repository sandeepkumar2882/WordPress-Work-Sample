<?php
/*
    Plugin Name: Genesis Customization
    Plugin URI: genesis-customization
    Text Domain: genesis-customizations
    Description: Extend blocks in genesis blocks
    Version: 0.1.2
    Author: Sandeep Kumar
    */

// Needed for adding the PHP Template Method blocks from within the plugin
use function Genesis\CustomBlocks\add_block;

define("CUSTOM_GENESIS_PLUGIN_URL", plugin_dir_url(__FILE__));
define("CUSTOM_GENESIS_PLUGIN_DIR", plugin_dir_path(__FILE__));

function plugin_alternate_template_path($path)
{
    unset($path);
    return __DIR__;
}

add_filter('genesis_custom_blocks_template_path', 'plugin_alternate_template_path');


// removes the code editor option for users without required roles
function disable_code_editor_mode($block_editor_settings)
{
    $user = wp_get_current_user();
    if (!in_array('administrator', (array)$user->roles)) {
        $block_editor_settings['codeEditingEnabled'] = FALSE;
    }

    return $block_editor_settings;
}

add_filter('block_editor_settings', 'disable_code_editor_mode', 10, 1);

/**
 * Function to add menu locations, so that could call them in navigation module/block
 * Created By: Sandeep Kumar
 * @package Genesis Customization
 */
if (!function_exists('register_customization_genesis_nav')) {
    function register_customization_genesis_nav()
    {
        register_nav_menu('top_nav', __('Customization Top Menu'));
        register_nav_menu('main_nav', __('Customization Primary Menu'));
        register_nav_menu('footer_nav', __('Customization Footer Menu'));
    }

    add_action('init', 'register_customization_genesis_nav');
}

// Add PHP Template Method blocks from within the plugin
function add_customization_genesis_manual_blocks()
{
    //Include add-block-hooks function's files here from add-block-hooks folder.

    //Pressroom Post List (Rich Sandeep)
    require_once(__DIR__ . '/add-block-hooks/pressroom-post-list.php');

    //Rich Genesis Block (Learning)
    require_once(__DIR__ . '/add-block-hooks/rich-genesis-block.php');

    //Rich Toggle Block (Learning)
    require_once(__DIR__ . '/add-block-hooks/rich-toggle-block.php');

    //Future Of Enhabit (Learning)
    require_once(__DIR__ . '/add-block-hooks/future-of-enhabit.php');
}

add_action('genesis_custom_blocks_add_blocks', 'add_customization_genesis_manual_blocks');

// Add/include Collection from collection-hooks/layouts folder here
function customization_genesis_collection()
{
    // Ensure a proper version of Genesis Blocks is active before continuing.
    if (!function_exists('genesis_blocks_register_layout_component')) {
        return;
    }
    //Demo Block Section - Testing only Collection. We will remove this section after some time
    require_once('collection-hooks/add-all-section.php');
    require_once('collection-hooks/add-all-layout.php');

    // Load plugin css and scripts for frontend
    function customization_genesis_collections_plugin_script()
    {
        // Add plugin specific js
        wp_enqueue_script('customization-genesis-swiper-slider-cdn', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', ' ',1); //swiper slider js cdn

        // Add plugin specific css
        wp_enqueue_style('customization-genesis-collections-css-material-icon', 'https://fonts.googleapis.com/css2?family=Material+Icons');
        wp_enqueue_style('customization-genesis-collections-style', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css'); //swiper slider cdn for  future-of-enhabit block
        wp_enqueue_style('customization-genesis-collections-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css'); //bootstrap cdn for future of enhabit block
        wp_enqueue_style('customization-genesis-collections-css-variables', plugins_url('/css/variables.css', __FILE__));
        wp_enqueue_style('customization-genesis-collections-styles', plugins_url('/css/custom.css', __FILE__));
    }

    add_action('wp_enqueue_scripts', 'customization_genesis_collections_plugin_script');
    add_action('admin_enqueue_scripts', 'customization_genesis_collections_plugin_script', 0);

    // Remove other collections
    function non_brand_collection_remover()
    {
        // Clean up other collections and only show the customization genesis collection and sections
        add_filter(
            'genesis_blocks_allowed_layout_components',
            function ($layouts) {
                // Return an array of unique section/layout keys that are allowed.
                return [
                    'genesis_pressroom_post_list',
                ];
            }
        );
    }

    add_action('plugins_loaded', 'non_brand_collection_remover', 13);
}

add_action('plugins_loaded', 'customization_genesis_collection', 12);

//load pot file module
//function my_plugin_init(){
    //load_plugin_textdomain('customization-genesis-collections',false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
 //}
 //add_action('plugins_loaded', 'my_plugin_init');

//Array for getting all text domains from all blocks
$allTextDomains = array('enhabitEnhanced2ColumnTextPhoto','enhabitTextAndVideo','enhabitThreeFeatureText','enhabitBrandNarrative','enhabitCallToAction','enhabitCardsTextModule','enhabitCompactTestimonialSlider','enhabitGetInTouchForm','enhabitGetInTouchForm','enhabitEnhancedFeaturedResource','enhabitFeaturedCards','enhabitFeaturedResource','enhabitFocusCards','enhabitFooterSocialIcon','enhabitOurServices','enhabitPaginatedPostList','enhabitCTAWithOptional','enhabitHeroWithImage','enhabitL2Hero','enhabitLargeQuoteCard','enhabitLeadershipTeam','enhabitLocationServiceFinder','enhabitMediaWithSubheadingRepeater','enhabitOurServices','enhabitPatientCare','enhabitPersonaSelfSelector','enhabitPressNews','enhabitProcessModule','enhabitQuickLinks','enhabitRelatedResources','enhabitRelatedResources','enhabitResourceCategory','enhabitSocialShare','enhabitDynamicStatPanel5','enhabitStatPanel','enhabitTabbedTestimonial','enhabitTestimonialSlider','enhabitTextAndPhoto','enhabitTextAndQuoteCard','enhabitTitleWithBulletCard');

//find path of .mo file and called to .mo file for translation execution
$mofile = sprintf( '%s/%s-%s.mo', CUSTOM_GENESIS_PLUGIN_DIR.'languages','customization-genesis-collections', $locale );
$domain_path = path_join( CUSTOM_GENESIS_PLUGIN_DIR, "languages" );
foreach($allTextDomains as $textDomain):
    $loaded = load_textdomain( $textDomain, path_join( $domain_path, $mofile ) ); //using all text domains one by one using loop
endforeach;
