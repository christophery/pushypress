<?php get_header(); ?>
    
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="row col-md-11">
                <div class="col-md-2 post-info clearfix">
                    <?php echo get_avatar( get_the_author_email(), '50' ); ?>
                    <h5 class="author"><strong>By <?php the_author(); ?></strong></h5>
                    <a href="<?php comments_link(); ?>">
                        <h5><i class="icon-comment"></i> <?php comments_number( '0', '1', '%' ); ?></h5>
                    </a>
                </div>

                <div class="col-md-10">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </article>

            <?php comments_template(); ?>

        <?php endwhile; else: ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

        <?php endif; ?>

<?php get_footer(); ?>