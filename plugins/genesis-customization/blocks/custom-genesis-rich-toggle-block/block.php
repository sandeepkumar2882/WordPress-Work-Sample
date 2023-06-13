<?php
$blockTitle = block_value('toggle-block-title');
$toggleThin = block_value('thin');
$toggleFat = block_value('fat');
$selectColour = block_value('colour');
$block = block_config();
$icon  = $block['icon'];
$icons = genesis_custom_blocks()->get_icons();
?>
<div class="module_feature-resource body-l alignfull <?php echo $background_color; ?>">
    <div class="grid-wrap block_col_2">
        <div class="support-your-need text-center">
        <?php if (isset($blockTitle) && $blockTitle !== ''): ?><h2><?php echo $blockTitle; ?></h2><?php endif; ?>
        <?php if (isset($toggleThin) && $toggleThin !== ''): ?><p><?php if($toggleThin == 1): echo 'Thin Yes'; else: echo 'Thin No'; endif; ?></p><?php endif; ?>
            <?php if (isset($toggleFat) && $toggleFat !== ''): ?><p><?php if($toggleFat == 1): echo 'Fat Yes'; else: echo 'Fat No'; endif; ?></p><?php endif; ?>
                <?php
                    if ( isset( $icons[ $icon ] ) ) {
                        echo $icons[ $icon ];
                    }
                ?>
                <?php if(isset($selectColour) && $selectColour !== ''): ?><p>I have selected <?php echo $selectColour; ?> colour from admin panel.</p><?php endif; ?>
        </div>
        </div>
    </div>
</div>