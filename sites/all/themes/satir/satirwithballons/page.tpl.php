<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo get_page_language($language); ?>" xml:lang="<?php echo get_page_language($language); ?>">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />  
  <?php echo $head; ?>
  <title><?php if (isset($head_title )) { echo $head_title; } ?></title>  
  <?php echo $styles ?>
  <?php echo $scripts ?>
  <!--[if IE 6]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie6.css" type="text/css" /><![endif]-->  
  <!--[if IE 7]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body>
<div id="art-page-background-simple-gradient">
    <div id="art-page-background-gradient"></div>
</div>
<div id="art-main">
<div class="art-sheet">
    <div class="art-sheet-tl"></div>
    <div class="art-sheet-tr"></div>
    <div class="art-sheet-bl"></div>
    <div class="art-sheet-br"></div>
    <div class="art-sheet-tc"></div>
    <div class="art-sheet-bc"></div>
    <div class="art-sheet-cl"></div>
    <div class="art-sheet-cr"></div>
    <div class="art-sheet-cc"></div>
    <div class="art-sheet-body">
<div class="art-header">
    <div class="art-header-jpeg"></div>

</div>
<?php if (!empty($navigation)): ?>
<div class="art-nav">
    <div class="l"></div>
    <div class="r"></div>
    <?php echo $navigation; ?>
</div>
<?php endif;?>
<?php if (!empty($banner1)) { echo '<div id="banner1">'.$banner1.'</div>'; } ?>
<?php echo art_placeholders_output($top1, $top2, $top3); ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php $l = art_sidebar($left, $sidebar_left);
if (!empty($l) || !empty($vnavigation_left)) echo '<div class="'.art_get_sidebar_style($l, $vnavigation_left, 'art-sidebar1').'">' . $vnavigation_left . $l . "</div>"; ?>
<?php $l = art_sidebar($left, $sidebar_left);
echo '<div class="'.art_get_sidebar_style($l, $vnavigation_left, 'art-content').'">'; ?>
<?php if (!empty($banner2)) { echo '<div id="banner2">'.$banner2.'</div>'; } ?>
<?php if ((!empty($user1)) && (!empty($user2))) : ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top"><td class="half-width"><?php echo $user1; ?></td>
<td><?php echo $user2; ?></td></tr>
</table>
<?php else: ?>
<?php if (!empty($user1)) { echo '<div id="user1">'.$user1.'</div>'; }?>
<?php if (!empty($user2)) { echo '<div id="user2">'.$user2.'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner3)) { echo '<div id="banner3">'.$banner3.'</div>'; } ?>
<?php if (!empty($breadcrumb)) { echo $breadcrumb; } ?>
<?php if (($is_front) || (isset($node) && isset($node->nid))): ?>              
<?php if (!empty($tabs) || !empty($tabs2)): ?>
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner">
<div class="art-postcontent">
    <!-- article-content -->
<?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<?php if (!empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo $help; } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php $art_post_position = strpos($content, "art-post"); ?>
<?php if ($art_post_position === FALSE): ?>
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner">
<div class="art-postcontent">
    <!-- article-content -->
<?php endif; ?>
<?php echo art_content_replace($content); ?>
<?php if ($art_post_position === FALSE): ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<?php else: ?>
<div class="art-post">
    <div class="art-post-body">
<div class="art-post-inner">
<div class="art-postcontent">
    <!-- article-content -->
<?php if (!empty($title)): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
<?php if (!empty($tabs)) { echo $tabs.'<div class="cleared"></div>'; }; ?>
<?php if (!empty($tabs2)) { echo $tabs2.'<div class="cleared"></div>'; } ?>
<?php if (!empty($mission)) { echo '<div id="mission">'.$mission.'</div>'; }; ?>
<?php if (!empty($help)) { echo $help; } ?>
<?php if (!empty($messages)) { echo $messages; } ?>
<?php echo art_content_replace($content); ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<?php if (!empty($banner4)) { echo '<div id="banner4">'.$banner4.'</div>'; } ?>
<?php if (!empty($user3) && !empty($user4)) : ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top"><td class="half-width"><?php echo $user3; ?></td>
<td><?php echo $user4; ?></td></tr>
</table>
<?php else: ?>
<?php if (!empty($user3)) { echo '<div id="user1">'.$user3.'</div>'; }?>
<?php if (!empty($user4)) { echo '<div id="user2">'.$user4.'</div>'; }?>
<?php endif; ?>
<?php if (!empty($banner5)) { echo '<div id="banner5">'.$banner5.'</div>'; } ?>
</div>

    </div>
</div>
<div class="cleared"></div>
<?php echo art_placeholders_output($bottom1, $bottom2, $bottom3); ?>
<?php if (!empty($banner6)) { echo '<div id="banner6">'.$banner6.'</div>'; } ?>
<div class="art-footer">
    <div class="art-footer-inner">
        <div class="art-footer-text">
        <?php
            if (!empty($footer_message) && (trim($footer_message) != '')) {
                echo $footer_message;
            }
            else {
                echo '<p><a href="#">Contact Us</a>&nbsp;|&nbsp;<a href="#">Terms of Use</a>&nbsp;|&nbsp;<a href="#">Trademarks</a>&nbsp;|&nbsp;<a href="#">Privacy Statement</a><br />'.
                     'Copyright &copy; 2010&nbsp;'.$site_name.'.&nbsp;All Rights Reserved.</p>';
            }
        ?>
        <?php if (!empty($copyright)) { echo $copyright; } ?>
        </div>
    </div>
    <div class="art-footer-background"></div>
</div>

    </div>
</div>
<div class="cleared"></div>
<p class="art-page-footer"></p>

</div>


<?php print $closure; ?>

</body>
</html>