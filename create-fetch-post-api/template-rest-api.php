<?php
    /*
        Template Name: Rest Api Demo
    */
?>
<?php get_header(); ?>
<style>
    .admin-quick-add {
    background-color: #DDD;
    padding: 15px;
    margin-bottom: 15px;
}

.admin-quick-add input,
.admin-quick-add textarea {
    width: 100%;
    border: none;
    padding: 10px;
    margin: 0 0 10px 0;
    box-sizing: border-box;
}
</style>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php 
                while(have_posts()):
                    the_post();
            ?>
            <div class="admin-quick-add">
                <h3>Quick Add Post</h3>
                <input type="text" name="title" placeholder="Title">
                <textarea name="content" placeholder="Content"></textarea>
                <button id="quick-add-button">Create Post</button>
                <div id="response"></div>
            </div>
            <div>
                <button id="posts-btn">Load Posts</button>
                <div id="posts-container"></div>
            </div>
            <?php endwhile; ?>
        </main>
    </div>
</div>
<?php get_footer(); ?>