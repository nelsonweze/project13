<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package robolist_lite
 */

get_header();

if(isset($_GET['rl_post_type']) && ($_GET['rl_post_type']=='listing')) {
    get_template_part('template-parts/content', 'job_listing');
}
else{
    ?>
    <div class="section page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <?php
                            if (have_posts()) : ?>

                                <header class="page-header">
                                    <?php
                                    the_archive_title('<h1 class="page-title">', '</h1>');
                                    the_archive_description('<div class="archive-description">', '</div>');
                                    ?>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', get_post_format());

                                endwhile;

                                the_posts_navigation();

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
                <div class="col-md-4">
                    <?php
                    get_sidebar();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}
get_footer();
