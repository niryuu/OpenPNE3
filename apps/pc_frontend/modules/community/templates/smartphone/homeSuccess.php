<?php slot('title', $community->getName().__('%community%')) ?>
<fieldset class="ui-grid-a">
  <div class="ui-block-a">
<?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
  </div>
  <div class="ui-block-b">
  <ul data-role="listview">
    <?php if ($isEditCommunity): ?>
      <li><?php echo link_to(__('Edit this %community%'), '@community_edit?id=' . $community->getId()) ?></li>
    <?php endif; ?>
    <?php if (!$isAdmin): ?>
      <?php if ($isCommunityMember): ?>
        <li><?php echo link_to(__('Leave this %community%'), '@community_quit?id=' . $community->getId()) ?></li>
      <?php else : ?>
        <li><?php echo link_to(__('Join this %community%'), '@community_join?id=' . $community->getId()) ?></li>
      <?php endif; ?>
    <?php endif; ?>
    <li><?php echo link_to(__('%community% Members'), '@community_memberList?id=' . $community->getId()) ?></li>
    <?php if ($isAdmin || $isSubAdmin): ?>
    <li>
      <?php echo link_to(__('Management member'), '@community_memberManage?id='.$community->getId()); ?>
    </li>
    <?php endif; ?>
  </ul>
  </div>
</fieldset>
<br /><br /><br />
<ul data-role="listview">
  <li data-role="list-divider"><?php echo __('%community%', array('%community%' => $op_term['community']->titleize())) ?></li>
  <li>
    <p class="ui-li-desc"><?php echo __('%community% Name', array('%community%' => $op_term['community']->titleize())) ?></p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getName() ?></p>
  </li>
<?php if ($community->community_category_id): ?>
  <li>
    <p class="ui-li-desc"><?php echo __('%community% Category', array('%community%' => $op_term['community']->titleize())) ?></li>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getCommunityCategory() ?></p>
  </li>
<?php endif; ?>
  <li>
    <p class="ui-li-desc"><?php echo __('Date Created') ?></p>
    <p class="ui-li-aside ui-li-desc"><?php echo op_format_date($community->getCreatedAt(), 'D') ?></p>
  </li>
  <li>
    <p class="ui-li-desc"><?php echo __('Administrator') ?></p>
    <p class="ui-li-aside ui-li-desc"><?php echo $communityAdmin->getName() ?></p>
  </li>
  <li>
    <p class="ui-li-desc"><?php echo __('Count of Members') ?></p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->countCommunityMembers() ?></p>
  </li>
  <li>
    <p class="ui-li-desc"><?php echo __('%community% Description', array('%community%' => $op_term['community']->titleize()), 'form_community') ?></p>
    <p class="ui-li-aside ui-li-desc"><?php echo $community->getConfig('description') ?></p>
  </li>
</ul>
<!--
  <div data-role="collapsible" data-collapsed="true">
    <h3>参加メンバー</h3>
    <p><?php echo link_to(__('%community% Members'), '@community_memberList?id=' . $community->getId()) ?></p>
  </div>
-->
