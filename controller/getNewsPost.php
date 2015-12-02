<?php

    //output the html directly to the target page
    require_once('../blog/wp-blog-header.php');

    $args = array(
        'posts_per_page' => 1,
        'category_name' => 'News',
    );

    $recent_posts = get_posts( $args, ARRAY_A );

    foreach($recent_posts as $post) :
        setup_postdata($post);
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
?>
    <div class="blog-content" name="<?php the_id() ?>">
        <h2 class="subtitle center-text"><a href="javascript:void 0;" onclick="Utils.loadPage('blog-id-<?php the_id() ?>')"><?php the_title() ?></a></h2>
        <h3 class="subtitle center-text"><?php the_date() ?></h3>
        <p>
            <?php echo $content ?>
        </p>
    </div>

<?php    
    endforeach;
    wp_reset_postdata();    
?>