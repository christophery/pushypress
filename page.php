<?php get_header(); ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="row">
                <div class="col-md-9 col-md-offset-2">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </article>

            <?php comments_template(); ?>

        <?php endwhile; else: ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            
        <?php endif; ?>

<?php get_footer(); ?>