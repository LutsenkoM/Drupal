<?php foreach ($locations as $location) {
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
<?php } ?>