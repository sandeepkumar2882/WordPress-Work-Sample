<?php
/**
 * Title: Hidden No Results Content
 * Slug: rich-portfolio/hidden-no-results-content
 * Inserter: no
 */
?>
<!-- wp:paragraph -->
<p>
<?php echo esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Message explaining that there are no results returned from a search', 'rich-portfolio' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'rich-portfolio' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'rich-portfolio' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'rich-portfolio' ); ?>","buttonUseIcon":true} /-->
