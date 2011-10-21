<?php slot('title', __("SNS Member's %activity%", array(
    '%activity%' => $op_term['activity']->titleize()->pluralize()
  ))) ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $activityData): ?>
<?php $uri = $activityData->getUri(); ?>
  <li>
    <?php if ($uri) echo '<a href="'.url_for($uri).'">' ?>
    <?php echo op_image_tag_sf_image($activityData->Member->getImageFileName(), array('size' => '76x76')) ?>
    <p class="ui-li-aside"><?php echo substr($activityData->getCreatedAt(),11) ?></p>
      <h4><?php echo $activityData->Member->getName() ?>:</h4>
      <p><?php echo __($activityData->getBody()) ?></p>
      <?php if ($uri) echo '</a>' ?>
  </li>
<?php endforeach ?>
</ul>

