<?php get_header(); ?>

        <div class="row">
            <div class="col-md-9 col-md-offset-2 search-results">
                <h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>
            </div>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="row">
                <div class="col-md-2 post-info">
                    <?php echo get_avatar( get_the_author_email(), '50' ); ?>
                    <h5><strong>By <?php the_author(); ?></strong> <br/><?php the_date(); ?></h5>
                    <a href="<?php comments_link(); ?>">
                        <h5><i class="icon-comment"></i> <?php comments_number( '0', '1', '%' ); ?></h5>
                    </a>
                </div>

                <div class="col-md-8">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

<?php get_footer(); ?>