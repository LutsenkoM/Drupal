<?php

function child_theme_preprocess_page(&$vars) {

  $vars['p_page'] = 'Variable from preprocess page';

  if(isset($vars['page']['content']['system_main']['no_content'])) {
    unset($vars['page']['content']['system_main']['no_content']);
  }

  if (isset($vars['node']->type)) {
    $nodetype = $vars['node']->type;
    $vars['theme_hook_suggestions'][] = 'page__' . $nodetype;

    // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }

}

function child_theme_preprocess_html(&$vars) {
  $vars['p_html'] = 'Variable from preprocess_html';
}

function child_theme_preprocess_node(&$vars) {
  if (drupal_is_front_page()) {
    $teams_home_id = taxonomy_vocabulary_machine_name_load('team');
    $teams_home = entity_load('taxonomy_term', FALSE, array('vid' => $teams_home_id->vid));

    $location_home_id = taxonomy_vocabulary_machine_name_load('location');
    $locations_home = entity_load('taxonomy_term', FALSE, array('vid' => $location_home_id->vid));

    $locs_home = array();

    foreach ($locations_home as $loc_home) {

      $sorted_teams = array();

//    Hook_menu, hook_theme. Custom link with homepage blocks
      foreach ($teams_home as $team_home) {
        if ($team_home->field_team_location['und'][0]['tid'] == $loc_home->tid) {
          $sorted_teams[] = $team_home;
        }
      }

      $loc_home->teams = $sorted_teams;
      $locs_home[] = $loc_home;
    }

    $vars['locations_home'] = $locs_home;
  }
}

function child_theme_preprocess_taxonomy_term(&$vars) {
  $vars['p_taxonomy_term'] = 'Variable from preprocess_taxonomy term';

  $tax_id = $vars['tid'];

//  Get members
  $nodes_id = taxonomy_select_nodes($tax_id);
  $nodes = array();

  foreach ($nodes_id as $nod_id) {
    $node = node_load($nod_id);
    array_push($nodes, $node);
  }

  $vars['members'] = $nodes;

//    Get teams
  $vocabulary = taxonomy_vocabulary_machine_name_load('team');
  $teams_term = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
  $output_teams = array();

  foreach ($teams_term as $team) {
    if ($team->field_team_location['und'][0]['tid'] == $tax_id) {
      $output_teams[] = $team;
    }
  }

  $vars['teams'] = $output_teams;

}