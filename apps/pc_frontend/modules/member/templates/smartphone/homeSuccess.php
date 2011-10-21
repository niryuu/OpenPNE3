<?php
function footer()
{
  $footer = '<div data-role="footer"><p>'
          . link_to('プライバシーポリシー', 'default/privacyPolicy')
          . ' '
          . link_to('利用規約', 'default/userAgreement')
          . '</p></div>';

  return $footer;
}
?>

<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
<a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
     <h1><?php echo opConfig::get('sns_name') ?></h1>
    <a href="#menu" data-rel="dialog" data-transition="pop" data-icon="home" data-theme="b" class="ui-btn-right jqm-home">メニュー</a>     
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true" data-theme="e">
    <li data-role="list-divider">新着情報</li>
    <li>test</li>
    <?php include_component('diary', 'noticeUnreadDiaryComment') ?>
    <?php include_component('message', 'unreadMessage') ?>
    </ul>
    <br />
    <ul data-role="listview">
    <li data-role="list-divider">新着アクティビティ</li>
    <?php foreach ($activityPager->getResults() as $activityData): ?>
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
  </div>

  <?php echo footer() ?>
</div><!-- page "home" -->
