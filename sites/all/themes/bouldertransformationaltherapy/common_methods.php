<?php

/* Common Drupal methods definitons using in Artisteer theme export */

/**
 * Generate the HTML representing a given menu with Artisteer style.
 *
 * @param $mid
 *   The block navigation content.
 *
 * @ingroup themeable
 */
function art_navigation_links_worker($content = NULL, $show_sub_menus) {
  if (!$content) {
    return '';
  }
  
  $output = $content;
  // used to support Menutrails module
  $output = str_replace("active-trail", "active-trail active", $output);
  
  $menu_str = ' class="menu"';
  if(strpos($output, $menu_str) !== false) {
    $empty_str = '';
    $pattern = '/class="menu"/i';
    $replacement = 'class="art-menu"';
    $output = preg_replace($pattern, $replacement, $output, 1);
    $output = str_replace($menu_str, $empty_str, $output);
  }
  
  if (class_exists('DOMDocument')) {
    $output = art_menu_xml_parcer($output, $show_sub_menus);
  }
  else {
    $output = preg_replace('~(<a [^>]*>)([^<]*)(</a>)~', '$1<span class="l"></span><span class="r"></span><span class="t">$2</span>$3', $output);
  }
  
  return $output;
}

function art_menu_xml_parcer($content, $showSubMenus) {
  $parent_id = 'parent';
  $doc_content = '<div id="'.$parent_id.'">'.$content."</div>";
  
  $doc = new DOMDocument();
  $doc->loadXML($doc_content);
  $parent = $doc->documentElement;
  $elements = $parent->childNodes;

  $ul_children = NULL;
  foreach($elements as $element) {
	if ($element->tagName != "ul") continue;
	$ul_children = $element->childNodes;
	break;
  }

  if ($ul_children == NULL) return $content;
  $ul_children = art_menu_style_parcer($doc, $ul_children, $showSubMenus);
  
  art_menu_parent_remove($doc, $parent_id);

  return $doc->saveHTML();
}

function art_menu_style_parcer($doc, $elements, $showSubMenus) {
  $nodesToDelete = array();  
  foreach ($elements as $element) {
    if (is_a($element, "DOMElement") && $element->tagName == "li") {
	  $children = $element->childNodes;
	  $parent_class = $element->getAttribute("class");
	  $is_parent_class_active = strpos($parent_class, "active") !== FALSE;
	  
	  foreach ($children as $child) {
	    if (is_a($child, "DOMElement") &&($child->tagName == "a")) {
			$caption = $child->nodeValue;
			$child->nodeValue = "";

            if ($is_parent_class_active) {
				$child->setAttribute("class", $child->getAttribute("class").' active');
			}
			
			$spanL = $doc->createElement("span");
			$spanL->setAttribute("class", "l");
			$spanL->nodeValue = " ";
			$child->appendChild($spanL);

			$spanR = $doc->createElement("span");
			$spanR->setAttribute("class", "r");
			$spanR->nodeValue = " ";
			$child->appendChild($spanR);

			$spanT = $doc->createElement("span");
			$spanT->setAttribute("class", "t");
			$child->appendChild($spanT);

			$spanT->nodeValue = htmlentities($caption, ENT_COMPAT, "UTF-8");
		}
		else if (!$showSubMenus) {
		   $nodesToDelete[] = $child;
		}
      }
    }
  }
  
  foreach($nodesToDelete as $node) {
    if ($node != null) {
	  $node->parentNode->removeChild($node);
    }
  }
  
  return $elements;
}

function art_menu_parent_remove($doc, $parent_id) {
  $div_elements=$doc->getElementsByTagName("div");
  
  foreach($div_elements as $div) {
    if ($div->getAttribute("id") == $parent_id) {
	  $children = $div->childNodes;
	  foreach($children as $child) {
	    $doc->appendChild($child);
	  }
	  $div->parentNode->removeChild($div);
	}
  }
}

/**
 * Allow themable wrapping of all comments.
 */
function art_comment_woker($content, $type = null) {
  static $node_type;
  if (isset($type)) $node_type = $type;
  return '<div id="comments">'. $content . '</div>';
}

function art_node_worker($node)
{
  $links_output = art_links_woker($node->links);
  $terms_output = art_terms_worker($node->taxonomy);

  $output = $links_output;
  if (!empty($links_output) && !empty($terms_output)) {
    $output .= '&nbsp;|&nbsp;';
  }
  $output .= $terms_output;
  return $output;
}

/*
 * Split out taxonomy terms by vocabulary.
 *
 * @param $node
 *   An object providing all relevant information for displaying a node:
 *   - $node->nid: The ID of the node.
 *   - $node->type: The content type (story, blog, forum...).
 *   - $node->title: The title of the node.
 *   - $node->created: The creation date, as a UNIX timestamp.
 *   - $node->teaser: A shortened version of the node body.
 *   - $node->body: The entire node contents.
 *   - $node->changed: The last modification date, as a UNIX timestamp.
 *   - $node->uid: The ID of the author.
 *   - $node->username: The username of the author.
 *
 * @ingroup themeable
 */
function art_terms_worker($terms) {
  $output = '';
  
  if (!empty($terms)) {

  }
  
  $output = substr($output, 0, strlen($output)-2); // removes last comma with space
  return $output;
}

/**
 * Return a themed set of links.
 *
 * @param $links
 *   A keyed array of links to be themed.
 * @param $attributes
 *   A keyed array of attributes
 * @return
 *   A string containing an unordered list of links.
 */
function art_links_woker($links, $attributes = array('class' => 'links')) {
  $output = '';

  if (!empty($links)) {
    $output = '';

    $num_links = count($links);
    $index = 0;

    foreach ($links as $key => $link) {
      $class = $key;

      if (strpos ($class, "read_more") !== FALSE) {
        continue;
      }
      
      // Automatically add a class to each link and also to each LI
      if (isset($link['attributes']) && isset($link['attributes']['class'])) {
        $link['attributes']['class'] .= ' ' . $key;
      }
      else {
        $link['attributes']['class'] = $key;
      }

      // Add first and last classes to the list of links to help out themers.
      $extra_class = '';
      if ($index == 1) {
        $extra_class .= 'first ';
      }
      if ($index == $num_links) {
        $extra_class .= 'last ';
      }

	  if (!empty($class)) {


      }      
    }
  }
  
  return $output;
}

function get_html_link_output($link) {
  $output = '';
  // Is the title HTML?
  $html = isset($link['html']) && $link['html'];
  
  // Initialize fragment and query variables.
  $link['query'] = isset($link['query']) ? $link['query'] : NULL;
  $link['fragment'] = isset($link['fragment']) ? $link['fragment'] : NULL;

  if (isset($link['href'])) {
    if (get_drupal_version() == 5) {
      $output = l($link['title'], $link['href'], $link['attributes'], $link['query'], $link['fragment'], FALSE, $html);
    }
    else {
      $output = l($link['title'], $link['href'], array('language' => $link['language'], 'attributes'=>$link['attributes'], 'query'=>$link['query'], 'fragment'=>$link['fragment'], 'absolute'=>FALSE, 'html'=>$html));
    }
  }
  else if ($link['title']) {
    if (!$html) {
      $link['title'] = check_plain($link['title']);
    }
    $output = $link['title'];
  }
  
  return $output;
}

/**
 * Format the forum body.
 *
 * @ingroup themeable
 */
function art_content_replace($content) {
  $first_time_str = '<div id="first-time"';
  $article_str = 'class="art-article"';
  $pos = strpos($content, $first_time_str);
  if($pos !== false)
  {
    $output = str_replace($first_time_str, $first_time_str . $article_str, $content);
    $output = <<< EOT
<div class="art-Post">
        <div class="art-Post-body">
    <div class="art-Post-inner">
    
<div class="art-PostContent">
    
      $output

    </div>
    <div class="cleared"></div>
    

    </div>
    
        </div>
    </div>
    
EOT;
  }
  else 
  {
    $output = $content;
  }
  return $output;
}

function art_placeholders_output($var1, $var2, $var3) {
  $output = '';
  if (!empty($var1) && !empty($var2) && !empty($var3)) {
    $output .= <<< EOT
      <table class="position" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr valign="top">
          <td width="33%">$var1</td>
          <td width="33%">$var2</td>
          <td>$var3</td>
        </tr>
      </table>
EOT;
  }
  else if (!empty($var1) && !empty($var2)) {
    $output .= <<< EOT
      <table class="position" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr valign="top">
          <td width="33%">$var1</td>
          <td>$var2</td>
        </tr>
      </table>
EOT;
  }
  else if (!empty($var2) && !empty($var3)) {
    $output .= <<< EOT
      <table class="position" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr valign="top">
          <td width="67%">$var2</td>
          <td>$var3</td>
        </tr>
      </table>
EOT;
  }
  else if (!empty($var1) && !empty($var3)) {
    $output .= <<< EOT
      <table class="position" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr valign="top">
          <td width="50%">$var1</td>
          <td>$var3</td>
        </tr>
      </table>
EOT;
  }
  else {
    if (!empty($var1)) {
      $output .= <<< EOT
        <div id="var1">$var1</div>
EOT;
    }
    if (!empty($var2)) {
      $output .= <<< EOT
        <div id="var1">$var2</div>
EOT;
    }
    if (!empty($var3)) {
      $output .= <<< EOT
        <div id="var1">$var3</div>
EOT;
    }
  }
  
  return $output;
}

function art_get_content_cell_style($left, $right, $content) {
  if (!empty($left) && !empty($right))
    return 'art-content';
  if (!empty($right))
    return 'art-content-sidebar1';
  if (!empty($left) > 0)
    return 'art-content-sidebar2';
  return 'content-wide';
}

function art_submitted_worker($date, $author) {
  $output = '';
  if ($date != '') {

  }
  if ($author != '') {

  }
  return $output;
}

function is_art_links_set($links) {
  $size = sizeof($links);
  if ($size == 0) {
    return FALSE;
  }
  
  //check if there's "Read more" in node links only  
  $read_more_link = $links['node_read_more'];
  if ($read_more_link != NULL && $size == 1) {
	return FALSE;
  }
  
  return TRUE;
}

/**
 * Return code that emits an feed icon.
 *
 * @param $url
 *   The url of the feed.
*/
function art_feed_icon($url) {
  return '<a href="'. check_url($url) .'" class="art-rss-tag-icon"></a>';
}
