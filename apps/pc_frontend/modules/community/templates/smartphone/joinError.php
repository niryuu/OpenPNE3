<?php slot('title', __('Error')) ?>

<?php if ($isCommunityMember): ?>
<?php echo  __('You are already joined to this %community%.') ?>
<?php else: ?>
<?php echo __('You have already sent the participation request to this %community%.') ?>
<?php endif; ?>
