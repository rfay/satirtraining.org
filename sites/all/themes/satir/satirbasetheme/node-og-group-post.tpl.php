<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner">
<h2 class="art-postheader"><img src="<?php echo get_full_path_to_theme(); ?>/images/postheadericon.png" width="11" height="11" alt="" /> <?php echo art_node_title_output($title, $node_url, $page); ?>
</h2>
<div class="art-postcontent">
    <!-- article-content -->
<div class="art-article"><?php print $picture; ?><?php echo $content; ?>
<?php if (isset($node->links['node_read_more'])) { echo '<div class="read_more">'.get_html_link_output($node->links['node_read_more']).'</div>'; }?></div>
    <!-- /article-content -->
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
