<ul data-role="listview">
<?php foreach ($pager->getResults() as $activityData): ?>
<?php $uri = $activityData->getUri(); ?>
  <li>
    <?php if ($uri) echo '<a href="'.url_for($uri).'">' ?>
    <p class="ui-li-aside"><?php echo substr($activityData->getCreatedAt(),11) ?></p>
    <p><?php echo __($activityData->getBody()) ?></p>
    <?php if ($uri) echo '</a>' ?>
  </li>
<?php endforeach ?>
</ul>
