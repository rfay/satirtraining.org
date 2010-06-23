<?php
// $Id: mimemail-message.tpl.php,v 1.1 2010/04/21 01:07:18 jerdavis Exp $

/**
 * @file mimemail-message.tpl.php
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
    .left-gutter, .right-gutter {
       width: 10%;
       background-image:url('<?php print url("sites/all/themes/satir_nitobe_subtheme/images/background.gif", array('absolute' => TRUE)) ?>');
       background-color: #CCCCCC;
    }
    .simplenews-header {
       height: 118px;
       /* margin-top: 4px; */
       /* margin-bottom: 4px; */
       background-color: #CCCCCC;
       background-image:url('<?php print url("sites/all/themes/satir_nitobe_subtheme/images/background.gif", array('absolute' => TRUE)) ?>');
    }
    .simplenews-header div, .simplenews-body div.center-image {
       text-align: center;
    }
    .center-text {
       padding: 10px;
    }
      
    </style>
  </head>
  <body id="mimemail-body">
    <div id="center">
      <div id="main">
  <table width="100%">
  <tr class="simplenews-header"><td colspan="3"> 
       <div>
          <img src="<?php print url("sites/all/themes/satir_nitobe_subtheme/images/satir-header-people.jpg", array('absolute' => TRUE)) ?>">
       </div>
	</td></tr>
  <tr class="simplenews-body">
    <td class="left-gutter" ></td>
    <td class="center-text"><?php print $body ?></td>
    <td class="right-gutter"> </td>
  </tr>
 </table>
      </div>
    </div>
  </body>
</html>
