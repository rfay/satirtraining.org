<div class="art-Post">
    <div class="art-Post-body">
<div class="art-Post-inner">
<h2 class="art-PostHeader"><img src="<?php echo get_full_path_to_theme(); ?>/images/PostHeaderIcon.png" width="11" height="11" alt="" /> <a href="<?php echo $node_url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
</h2>
<div class="art-PostContent">
<div class="art-article"><?php print $picture; ?><?php echo $content; ?>
<?php if (isset($node->links['node_read_more'])) { echo '<div class="read_more">'.get_html_link_output($node->links['node_read_more']).'</div>'; }?></div>
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
