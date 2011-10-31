<?php slot('title', __('')) ?>

<?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
  <p><?php echo $community->getConfig('description') ?></p>
<?php op_include_form('communityQuiting', $form, array(
  'title'    => __('Quit "%1%"', array('%1%' => $community->getName())),
  'body'     => __('Do you really quit the following %community%?'),
)) ?>
