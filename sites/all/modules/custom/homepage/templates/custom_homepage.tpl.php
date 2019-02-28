<?php foreach ($locations as $location) :
  $tid = $location->tid;
  $url = entity_uri('taxonomy_term', $location);
  ?>
    <div class="location-item clearfix">
        <div class="col-md-6">
            <div class="clearfix"></div>
            <h3><?php print $location->name ?></h3>
            <p><?php print $location->description?></p>

            <a href="<?php print $url['path'] ?>"><?php print t("Read more about !name", array('!name' => $location->name))  ?></a>
        </div>
        <div class="col-md-6">
            <div class="clearfix"></div>
            <ul class="team-list">
              <?php foreach ($location->teams as $team_home) {
                $tid = $team_home->tid;
                $url = entity_uri('taxonomy_term', $team_home);
                print '<li><a href="/' . $url['path'] . '">' . $team_home->name . '</a></li>';
              } ?>
            </ul>
        </div>
    </div>
<?php endforeach; ?>
<?php

switch ($custom_vars['radios']):
  case '0':
    $block_bg = 'none';
    break;
  case '1':
    $block_bg = 'red';
    break;
  case '2':
    $block_bg = 'black';
    break;
endswitch;

if ($custom_vars['check'] === 1) : ?>
<div>
  <h2>This block shows when checkbox was checked</h2>
  <div class="description"><?php print render($custom_vars['description']['value']); ?></div>
  <div style="width: 400px; height: 400px; border: 1px solid; background: <?php echo $block_bg; ?> "></div>
</div>
<?php endif; ?>
