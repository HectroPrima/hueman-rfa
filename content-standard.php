<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'group', 'grid-item') ); ?>>
    <div class="post-inner post-hover">


        <div class="post-content">

            <div class="post-meta group">
                <p class="post-category"><?php the_category(' / '); ?></p>
                <?php get_template_part('parts/post-list-author-date'); ?>
            </div><!--/.post-meta-->

            <h2 class="post-title entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h2><!--/.post-title-->

            <?php if (hu_get_option('excerpt-length') != '0'): ?>
            <div class="entry excerpt entry-summary">
                <?php 
                if ( has_post_format('video') ){
                    $meta = get_post_custom($post->ID);
                    if ( isset($meta['_video_url'][0]) && !empty($meta['_video_url'][0]) ) {
                        global $wp_embed;
                        $video = $wp_embed->run_shortcode('[embed]'.$meta['_video_url'][0].'[/embed]');
                        echo $video;
                    }
                }
                the_excerpt(); 
                ?>
            </div><!--/.entry-->
            <?php endif; ?>

        </div><!--/.post-content-->

    </div><!--/.post-inner-->
</article><!--/.post-->