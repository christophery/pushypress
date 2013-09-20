<?php
if ( post_password_required() )
	return;
?>

<!-- Comments List -->
<?php if ($comments) : ?>

	<div class="row comments">
        <div class="col-md-9 col-md-offset-2">
            <h2>Comments</h2>
        </div>
    </div>

    <div class="row comments-list">
        <div class="col-md-9 col-md-offset-2">

        <ul class="media-list">
	        <?php foreach ($comments as $comment) : ?>
	            <li class="media comment" id="comment-<?php comment_ID() ?>">
	                <a class="pull-left" href="#">
	             		<?php echo get_avatar( $comment, '50' ); ?>
	                </a>
	                <div class="media-body">
	                    <h4 class="media-heading"><?php comment_author_link() ?></h4>
	                    <?php if ($comment->comment_approved == '0') : ?>
						<em>Your comment is awaiting moderation.</em>
						<?php endif; ?>
						<p class="small"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> (<a href="#comment-<?php comment_ID() ?>" title="">#</a>) <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></p>

						<?php comment_text() ?>
	                </div>
	            </li>
	        <?php endforeach; /* end for each comment */ ?>
        </ul>
        </div>
    </div>

		<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

		<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div class="row">
			<div class="col-md-10 col-md-offset-2 text-center no-comments">
				<h3><i class="icon-comments"></i> Comments are closed.</h3>
			</div>
		</div>


		<?php endif; ?>

		<?php endif; ?>
        

    <!-- Comment Form -->
	<?php if ('open' == $post->comment_status) : ?>

	<div class="row comments">
	    <div class="col-md-9 col-md-offset-2">
	        <h2>Leave a Comment</h2>
	    </div>
	</div>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	
	<?php else : ?>
	<div class="row comments-form">
		<div class="col-md-7 col-md-offset-2">
			<form role="form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>

		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

	<?php else : ?>
		<div class="form-group">
			<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
			<input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
		</div>

		<div class="form-group">
			<label for="email">Email (will not be published) <?php if ($req) echo "(required)"; ?></label>
			<input class="form-control" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />	
		</div>

		<div class="form-group">
			<label for="url">Website</label>
			<input class="form-control" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		</div>

	<?php endif; ?>

		<div class="form-group">
			<label for="comment">Comment</label>
			<textarea class="form-control" name="comment" id="comment" cols="10" rows="8" tabindex="4"></textarea>
		</div>

		<button type="submit" class="btn btn-default">Submit</button>
		<!-- <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /> -->
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

		<?php do_action('comment_form', $post->ID); ?>

			</form>
		</div>
	</div>

	<?php endif; // If registration required and not logged in ?>

	<?php endif; // if you delete this the sky will fall on your head ?>