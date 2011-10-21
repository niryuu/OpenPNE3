[
<?php foreach ($pager->getResults() as $member): ?>
[
 "<?php echo url_for('@member_profile?id='.$member->getId()) ?>",
 "<?php echo $member->getNameAndCount() ?>",
 "<?php echo $member->getProfile('fullname') ?>"
],
<?php endforeach ?>
<?php echo count($pager->getResults()) ?>
]
