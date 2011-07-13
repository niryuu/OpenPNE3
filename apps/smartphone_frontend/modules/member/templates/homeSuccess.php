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
     <h1><?php echo opConfig::get('sns_name') ?></h1>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true" data-theme="e">
    <?php include_component('diary', 'noticeUnreadDiaryComment') ?>
    <?php include_component('message', 'unreadMessage') ?>
    </ul>

    <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">ホーム</li>
      <li><a href="#messages"><?php echo __('Messages') ?></a></li>
      <li><?php echo link_to(__('Activities'), 'friend/showActivity') ?></li>
      <li><a href="#diaries"><?php echo __('Diaries') ?></a></li>
      <li><a href="#friends"><?php echo __('Friends') ?></a></li>
      <li><a href="#communities"><?php echo __('Communities') ?></a></li>
      <li><a href="#misc"><?php echo __('Misc') ?></a></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "home" -->


<div data-role="page" id="messages">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo __('Messages') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Inbox'), 'message/index') ?></li>
      <li><?php echo link_to(__('Sent Messages'), 'message/sendList') ?></li>
      <li><?php echo link_to(__('Drafts'), 'message/draftList') ?></li>
      <li><?php echo link_to(__('Trash'), 'message/dustList') ?></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "messages" -->


<div data-role="page" id="diaries">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo __('Diaries') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Recent Diaries'), 'diary/list') ?></li>
      <li><?php echo link_to(__('My Diaries'), 'diary/listMember?id='.$memberId) ?></li>
      <li><?php echo link_to(__('New Diary'), 'diary/new') ?></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "diaries" -->


<div data-role="page" id="friends">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo __('Friends') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('My Friends'), 'friend/list') ?></li>
      <li><?php echo link_to(__('My Friend Setting'), '@friend_manage') ?></li>
      <li><?php echo link_to(__('Invite Friends'), '@member_invite') ?></li>
      <li>(未)<?php echo link_to(__('Member search'), 'member/search') ?></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "members" -->


<div data-role="page" id="communities">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo __('Communities') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
      <li><?php echo link_to(__('Recently Posted Community Topics'), 'communityTopic/recentlyTopicList') ?></li>
      <li><?php echo link_to(__('Recently Posted Community Events'), 'communityEvent/recentlyEventList') ?></li>
      <li><?php echo link_to(__('My Communities'), 'community/joinlist?id='.$memberId) ?></li>
      <li>(未)<?php echo link_to(__('Community search'), 'community/search') ?></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "message" -->


<div data-role="page" id="misc">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo __('Misc') ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true">
<!--  <li>(未)<?php echo link_to(__('Favorites'), 'favorite/list') ?></li> -->
      <li><?php echo link_to(__('Pageview logs'), 'ashiato/list') ?></li>
<!--  <li>(未)<?php echo link_to(__('Ranking'), 'ranking/index') ?></li> -->
      <li><?php echo link_to(__('My Profile'), '@member_profile_mine') ?></li>
      <li>(未)<?php echo link_to(__('Settings'), 'member/config') ?></li>
      <li><?php echo link_to(__('Logout'), '@member_logout') ?></li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "misc" -->
