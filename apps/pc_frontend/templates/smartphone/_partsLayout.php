<?php include_customizes($id, 'before') ?>

<?php
$class = '';
if ($name) $class .= ' '.$name;
if (!empty($options['class'])) $class .= ' '.$options['class'];
?>

<?php if (isset($options['title'])): ?>
<h1><?php echo $options->getRaw('title') ?></h1>
<?php endif; ?>

<?php include_customizes($id, 'top') ?>

<?php echo $sf_data->getRaw('op_content') ?>

<?php include_customizes($id, 'bottom') ?>

<?php if (isset($options['moreInfo'])): ?>
</div>
<div data-role="content">
<ul data-role="listview">
<?php foreach ($options['moreInfo'] as $key => $value): ?>
<li><?php echo $options['moreInfo']->getRaw($key) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<?php include_customizes($id, 'after') ?>
