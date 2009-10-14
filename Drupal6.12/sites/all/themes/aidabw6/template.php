<?php
// $Id: template.php,v 1.1 $
// Created for AIDA by Buttonwillow Six
// www.buttonwillowsix.com 
// based on Beginning  by gazwal.com
/**
 * Override or insert PHPTemplate variables into the templates .
 */
function phptemplate_preprocess_page(&$vars) {
	// set variables for the logo and slogan (from Deco drupal 6.x theme)
	$site_fields = array();
  if ($vars['site_name']) {
    $site_fields[] = check_plain($vars['site_name']);
  }
  if ($vars['site_slogan']) {
    $site_fields[] = check_plain($vars['site_slogan']);
  }
  
	$vars['site_title'] = implode(' ', $site_fields);

	if (isset($site_fields[0])) {
  	$site_fields[0] = '<span class="site-name">'. $site_fields[0] .'</span>';
	}
	if (isset($site_fields[1])) {
		$site_fields[1] = '<span class="site-slogan">'. $site_fields[1] .'</span>';
	}
	
  $vars['site_title_html'] = implode(' ', $site_fields);

}

/**
 * Allow themable wrapping of all comments (from garland).
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments :') .'</h2>'. $content .'</div>';
  }
}