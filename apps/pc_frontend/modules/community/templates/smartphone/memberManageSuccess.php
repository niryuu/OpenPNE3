<?php slot('title', 'Management member') ?>
<div data-role="collapsible-set">
<?php foreach ($pager->getResults() as $member) : ?>
  <div data-role="collapsible">
<?php 
$communityMember = Doctrine::getTable('CommunityMember')->retrieveByMemberIdAndCommunityId($member->getId(), $community->getId());
?>
<h3><?php echo $member->getName() ?></h3>
<p><?php echo op_link_to_member($member); ?></p>

<?php if (!($communityMember->hasPosition(array('admin', 'sub_admin')) || $communityMember->getMemberId() === $sf_user->getMemberId())) : ?>
<p><?php echo link_to(__('Drop this member'), 'community/dropMember?id='.$community->getId().'&member_id='.$member->getId()) ?></p>
<?php else: ?>
&nbsp;
<?php endif; ?>

<?php if ($isAdmin): ?>
<?php if (!$communityMember->hasPosition(array('admin', 'admin_confirm', 'sub_admin'))) : ?>
<?php if ($communityMember->hasPosition('sub_admin_confirm')): ?>
<p><?php echo __("You are requesting this %community%'s sub-administrator to this member now.") ?></p>
<?php else: ?>
<p><?php echo link_to(__("Request this %community%'s sub-administrator to this member"), 'community/subAdminRequest?id='.$community->getId().'&member_id='.$member->getId()) ?></p>
<?php endif; ?>
<?php elseif ($communityMember->hasPosition('sub_admin')): ?>
<p><?php echo link_to(__("Demotion from this %community%'s sub-administrator"), 'community/removeSubAdmin?id='.$community->getId().'&member_id='.$member->getId()) ?></p>
<?php else: ?>
<?php endif; ?>

<?php if (!$communityMember->hasPosition('admin')) : ?>
<?php if ($communityMember->hasPosition('admin_confirm')): ?>
<p><?php echo __("You are taking over this %community%'s administrator to this member now.") ?></p>
<?php else: ?>
<p><?php echo link_to(__("Take over this %community%'s administrator to this member"), 'community/changeAdminRequest?id='.$community->getId().'&member_id='.$member->getId()) ?></p>
<?php endif; ?>
<?php else: ?>
&nbsp;
<?php endif; ?>
<?php endif; ?>

  </div>
<?php endforeach; ?>
</div>
