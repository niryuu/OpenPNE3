<?php slot('title', __('Activities')) ?>

<ul data-role="listview">
  <li><span align="center">
    <form action="<?php echo url_for('friend/showActivity') ?>" method="post">
    <input type="hidden" name="activity_data[id]" />
    <input type="hidden" name="activity_data[next_uri]" value="friend/showActivity" />
    <input type="hidden" name="activity_data[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" />
    <textarea cols="30" rows="4" name="activity_data[body]"></textarea>
    <fieldset data-role="controlgroup" data-type="horizontal">
      <!-- <label for="activity_data_public_flag"></label>-->
      <!-- <legend>公開範囲</legend> -->
      <input type="radio" name="activity_data[public_flag]" id="public_flag_choice_1" value="1" checked="checked" />
      <label for="public_flag_choice_1">全員</label>
      <input type="radio" name="activity_data[public_flag]" id="public_flag_choice_2" value="2" />
      <label for="public_flag_choice_2">友達まで</label>
      <input type="radio" name="activity_data[public_flag]" id="public_flag_choice_3" value="3" />
      <label for="public_flag_choice_3">非公開</label>
    </fieldset>
    <button type="submit" data-theme="a">アクティビティ投稿</button>
    </form>
    </span>
  </li>
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

