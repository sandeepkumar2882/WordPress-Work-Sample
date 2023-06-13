<?php

$richTitle = block_value('rich-title');
$richContent = block_value('rich-content');
?>
<div class="module_feature-resource body-l alignfull <?php echo $background_color; ?>">
    <div class="grid-wrap block_col_2">
        <div class="support-your-need text-center">
            <?php if (isset($richTitle) && $richTitle !== ''): ?><h3><?php echo $richTitle; ?></h3><?php endif; ?>
            <?php if (isset($richContent) && $richContent !== ''): ?><p><?php echo $richContent; ?></p><?php endif; ?>
                <?php $card_elements = block_row_count('add-cards');
                    $card_layout_style = '';
                    ($card_elements == 6) ? $card_layout_style = 'card-6' : ''; 
                ?>
                <div class="slider_slick flex-wrap-center text-center <?php echo $card_layout_style; ?>">
            <?php if (block_rows('add-cards')) :
                while (block_rows('add-cards')) :
                    block_row('add-cards');
                    if (block_sub_field('title', false)) :
                        $selected_page = block_value('button-link');
                        $link = get_permalink($selected_page->ID);
                        ?>
                        <div class="card-small">
                            <div class="card_desc flex-wrap-center flex-column">
                                <div class="card-icon flex-wrap-center">
                                    <img src="<?php block_sub_field("card-icon"); ?>"
                                         alt="<?php block_sub_field("title") ?>">
                                </div>
                                <h5><?php block_sub_field("title") ?></h5>
                                <p><?php block_sub_field("excerpt") ?></p>
                            </div>
                        </div>
                    <?php
                    endif;
                endwhile;
            endif;
            reset_block_rows('add-cards');
            ?>
        </div>
        </div>
    </div>
</div>