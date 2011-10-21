<?php slot('title', "delete activity") ?>

<ul data-role="listview">
  <li>
    <?php $uri = $activity->getUri(); ?>
    <?php if ($uri) echo '<a href="'.url_for($uri).'">' ?>
    <?php echo op_image_tag_sf_image($activity->Member->getImageFileName(), array('size' => '76x76')) ?>
    <p class="ui-li-aside"><?php echo substr($activity->getCreatedAt(),11) ?></p>
      <h4><?php echo $activity->Member->getName() ?>:</h4>
      <p><?php echo __($activity->getBody()) ?></p>
      <?php if ($uri) echo '</a>' ?>
  </li>
</ul>
</div>
<div data-role="content">

<?php op_include_parts('yesNo', 'delete_activity', array(
  'body' => get_slot('activity'),
  'yes_form' => new BaseForm(),
  'no_method' => 'get',
  'no_url' => url_for('friend/showActivity'),
  'title' => __('Do you delete this %activity%?'),
)) ?>
