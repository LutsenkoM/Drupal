<?php
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">
    <div class="col-md-9">
        <?php print render($content['description'])?>
    </div>
    <div class="col-md-3">
      <?php if(!empty($teams)) { ?>
          <h2>Teams</h2>
        <?php
        foreach ($teams as $team) {
          $tid = $team->tid;
          $url = entity_uri('taxonomy_term', $team);
          print '<div><a href="/' . $url['path'] . '">' . $team->name . '</a></div>';
        }
      } elseif (!empty($members)) { ?>
          <h2>Members</h2>
        <?php
        foreach ($members as $member) {
          $display = array('label' => 'hidden');
          print render(field_view_field('node', $member, 'field_member_link', $display));
        }
      } ?>
    </div>
</div>
