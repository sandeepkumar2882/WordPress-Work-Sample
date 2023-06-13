<?php

    function cardPatternContent(){
        return '<!-- wp:heading -->
        <h2>Card Pattern</h2>
        <!-- /wp:heading -->
        
        <!-- wp:create-block/rich-card-block -->
        <div class="card-details"><div class="image-wrapper"><img class="card-image"/></div><div class="card-title"></div><div class="card-content"></div></div>
        <!-- /wp:create-block/rich-card-block -->
        
        <!-- wp:create-block/rich-media-upload -->
        <div class="image-wrapper"><img/></div>
        <!-- /wp:create-block/rich-media-upload -->
        
        <!-- wp:create-block/rich-color-picker -->
        <div><div><h1></h1></div></div>
        <!-- /wp:create-block/rich-color-picker -->';
    }

?>