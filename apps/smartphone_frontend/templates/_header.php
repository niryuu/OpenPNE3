<h1><?php echo link_to($op_config['sns_name'], '@homepage') ?></h1>


<div id="globalNav">
<?php
$globalNavOptions = array(
  'type'      => opToolkit::isSecurePage() ? 'secure_global' : 'insecure_global',
  'culture'   => sfContext::getInstance()->getUser()->getCulture(),
);
include_component('default', 'globalNav', $globalNavOptions);
?>
</div><!-- globalNav -->

<div id="topBanner">
<?php $member = $sf_user->getMember()->getRawValue() ?>
<?php if ($member && 'opAnonymousMember' !== get_class($member)): ?>
<?php echo op_banner('top_after') ?>
<?php else: ?>
<?php echo op_banner('top_before') ?>
<?php endif ?>
</div>
