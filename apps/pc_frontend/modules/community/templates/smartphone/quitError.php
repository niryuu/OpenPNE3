<?php slot('title', __('Error')) ?>

<?php if ($isAdmin): ?>
<?php $body =  __('The administrator doesn\'t leave the community.') ?>
<?php else: ?>
<?php $body =  __('You haven\'t joined this community yet.') ?>
<?php endif; ?>
