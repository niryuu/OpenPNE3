<?php
foreach ($member->getProfiles(true) as $profile)
{
  $caption = $profile->getProfile()->getCaption();
  if ($profile->getProfile()->isPreset())
  {
    $presetConfig = $profile->getProfile()->getPresetConfig();
    $caption = __($presetConfig['Caption']);
  }

  $profileValue = (string)$profile;
  if ('' === $profileValue)
  {
    continue;
  }

  if ($profile->getFormType() === 'textarea')
  {
    $profileValue = op_auto_link_text(nl2br($profileValue));
  }
  if ($profile->getProfile()->isPreset())
  {
    if ($profile->getFormType() === 'country_select')
    {
      $profileValue = $culture->getCountry($profileValue);
    }
    elseif ('op_preset_birthday' === $profile->getName())
    {
      $profileValue = op_format_date($profileValue, 'XShortDateJa');
    }
    $profileValue = __($profileValue);
  }
  $list[$caption] = $profileValue;
}
?>
<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
    <a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
    <h1><?php echo $member->getNameAndCount() ?></h1>
    <?php echo link_to('Home', '@homepage',
            array('data-icon' => 'home',
                  'data-iconpos' => 'notext',
                  'data-direction' => 'reverse',
                  'class' => 'ui-btn-right jqm-home',
                  'data-theme' => 'b')) ?>
  </div>

  <div data-role="content">
　　<div class="ui-grid-a">
      <div class="ui-block-a">
	<h3><?php echo $member->getName() ?></h3>	
	<?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '160x160')) ?>
      </div>
      <div class="ui-block-b">
	<div class="margin-top-21">
	<?php echo button_to('フレンドに追加', 'friend/link?id='.$member->getId()) ?>	
	<?php echo button_to('メッセージを送る', 'message/sendToFriend?id='.$member->getId()) ?>
	</div>
      </div>
    </div>
    <div id="menutabs">
       <ul>
	 <li><a href="#profile">自己紹介</a></li>
	 <li><?php echo link_to('更新', 'member/showActivity?id='.$member->getId()) ?></li>
	 <li><?php echo link_to('友達', 'friend/list?id='.$member->getId()) ?></li>
	 <li><?php echo link_to('日記', 'diary/listMember?id='.$member->getId()) ?></li>
       </ul>
         <div id="profile">
	   <ul data-role="listview" data-inset="true">
	     <?php foreach ($list as $k => $v): ?>
	     <li>
	       <h3><?php echo __($k) ?></h3>
	       <p><?php echo $v ?></p>
	     </li>
	     <?php endforeach ?>
	   </ul>
         </div>
    </div>
    <script type="text/javascript"> 
    $('#menutabs').tabs({selected:0});
    </script>

<!--
    <li>(未)<a href="#favorite">お気に入りに追加</a></li>
    <li>(未)<a href="#introduction">紹介文を書く</a></li>
-->
    </div>
  </div>

</div>


<!--
  <div data-role="collapsible" data-collapsed="true">
  <h3><?php echo __('Profile') ?></h3>
-->


