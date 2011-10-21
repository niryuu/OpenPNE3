<?php slot('title', $member->getName().'さんの'.__('Activities')) ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $activityData): ?>
<?php $uri = $activityData->getUri(); ?>
  <li>
    <?php if ($uri): ?>
    <?php echo '<a href="'.url_for($uri).'">' ?>
    <?php else: echo '<a href="#">' ?>
    <?php endif; ?>
    <?php echo op_image_tag_sf_image($activityData->Member->getImageFileName(), array('size' => '76x76')) ?>
    <!-- <p><?php echo substr($activityData->getCreatedAt(),11) ?></p> -->
    <h4><?php echo $activityData->Member->getName() ?>:</h4>
    <p><?php echo __($activityData->getBody()) ?></p>
    <?php echo '</a>' ?>
    <?php echo link_to(__('Delete'), 'member/deleteActivity?id='.$activityData->getId(), array('title' => 'delete activity')) ?>
  </li>
<?php endforeach ?>
</ul>
