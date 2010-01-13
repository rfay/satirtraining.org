<div class="art-Post">
    <div class="art-Post-body">
<div class="art-Post-inner">

	<div class="comment<?php if ($comment->status == COMMENT_NOT_PUBLISHED) echo ' comment-unpublished'; ?>">
<h2 class="art-PostHeader"><img src="<?php echo get_full_path_to_theme(); ?>/images/PostHeaderIcon.png" width="11" height="11" alt="" /> 
			<?php if ($title) {echo $title; } ?>

		</h2>
		
		<?php if ($submitted): ?>
			<span class="submitted"><?php echo $submitted; ?></span>
			<div class="cleared"></div>
		<?php endif; ?>	
		<?php if ($comment->new) : ?>
			<span class="new"><?php print drupal_ucfirst($new) ?></span>
		<?php endif; ?>
<div class="art-PostContent">
		
			<div class="art-article">
				<?php print $picture ?>
				<?php echo $content; ?>
			</div>

		</div>
		<div class="cleared"></div>
		
		<div class="links"><?php echo $links; ?><div class="cleared"></div></div>	
	</div>

</div>

    </div>
</div>
