<?php

function child_theme_preprocess_page(&$variables) {

  $variables['p_page'] = 'Variable from preprocess page';

  if (isset($variables['node']->type)) {
//    $nodetype = $variables['node']->type;
//    $variables['theme_hook_suggestions'][] = 'page__' . $nodetype;

    // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }



}

function child_theme_preprocess_html(&$vars) {
  $vars['p_html'] = 'Variable from preprocess_html';

}