<div class="art-Post">
    <div class="art-Post-body">
<div class="art-Post-inner">
<h2 class="art-PostHeader"> <?php echo art_node_title_output($title, $node_url, $page); ?>
</h2>
<div class="art-PostContent">
<div class="art-article"><?php print $picture; ?><?php echo $content; ?>
<?php if (isset($node->links['node_read_more'])) { echo '<div class="read_more">'.get_html_link_output($node->links['node_read_more']).'</div>'; }?></div>
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
