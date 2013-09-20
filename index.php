<?php get_header(); ?>
            <div class="row ">
            <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
                <div class="col-md-9">
            <?php else: ?>    
                <div class="col-md-11">
            <?php endif; ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article class="col-md-12 clearfix">
                        <div class="col-md-2 post-info clearfix">
                            <?php echo get_avatar( get_the_author_email(), '50' ); ?>
                            <h5 class="author"><strong>By <?php the_author(); ?></strong><br/><?php the_date('M j, Y'); ?></h5>
                            <a href="<?php comments_link(); ?>">
                                <h5><i class="icon-comment"></i> <?php comments_number( '0', '1', '%' ); ?></h5>
                            </a>
                        </div>

                        <div class="col-md-10">
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php
                            // check if the post has a Post Thumbnail assigned to it.
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } 
                            ?>
                            <?php the_content(); ?>
                        </div>
                    </article>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
                </div>
                <!-- Sidebar -->
                <?php get_sidebar(); ?>
            </div>

        <div class="row pagination-bar">
            <div class="col-xs-6 prev-btn">
                <?php next_posts_link('<i class="icon-chevron-left"></i>') ?>
            </div>
            <div class="col-xs-6 text-right next-btn">
                <?php previous_posts_link('<i class="icon-chevron-right"></i>') ?>
            </div>
        </div>

<?php get_footer(); ?>