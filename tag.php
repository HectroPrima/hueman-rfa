<?php 
$data = get_mytags_desc();
get_header(); 
?>

<section class="content">

    <div class="page-title pad group">
    <?php
    if (isset($data) && $data->post_title) {
        echo "<h1><i class=\"fa fa-tags\"></i>Группа меток: <span>".$data->post_title."</span></h1>";
    } else {
        echo "<h1>".hu_get_term_page_title()."</h1>";
    }
    ?>
    </div>
    <div class="pad group">
    <?php
        if (isset($data) && !empty($data->post_content) ) {
            echo "<div class=\"notebox\">";
            echo $data->post_content;
            edit_post_link( __( 'Edit', 'twentyeleven' ), '<div class="edit-link">', '</div>', $data->ID );
            echo "</div>";
        } else {
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) ) {
                /**
                 * Filter the default Twenty Eleven tag description.
                 *
                 * @since Twenty Eleven 1.0
                 *
                 * @param string The default tag description.
                 */
                echo "<div class=\"notebox\">";
                echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
                echo "</div>";
            }
        }
    ?>

        <?php if ( have_posts() ) : ?>

            <?php if ( hu_is_checked('blog-standard') ): ?>
                <?php while ( have_posts() ): the_post(); ?>
                    <?php get_template_part('content-standard'); ?>
                <?php endwhile; ?>
            <?php else: ?>
            <div class="post-list group">
                <?php global $wp_query; echo '<div class="post-row">'; while ( have_posts() ): the_post(); ?>
                    <?php get_template_part('content'); ?>
                <?php if( ( $wp_query->current_post + 1 ) % 2 == 0 ) { echo '</div><div class="post-row">'; }; endwhile; echo '</div>'; ?>
            </div><!--/.post-list-->
            <?php endif; ?>

            <?php get_template_part('parts/pagination'); ?>

        <?php endif; ?>

    </div><!--/.pad-->

</section><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>