<?php slot('title', '') ?>
<?php echo __('Photo') ?>
<?php echo op_link_to_member($member, array('link_target' => op_image_tag_sf_image($member->getImageFileName(), array('size' => '76x76')))) ?>
<?php echo __('%nickname%', array('%nickname%' => $op_term['nickname']->titleize())) ?><?php echo op_link_to_member($member) ?>
<?php op_include_form('communitySubAdminRequest', $form, array(
  'title' => __('Request the sub-administrator of "%1%"', array('%1%' => $community->getName())),
)) ?>
