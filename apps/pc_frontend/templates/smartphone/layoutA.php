<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport">
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>
<body>
<?php if (has_slot('title')): ?>
<div data-role="page" id="singlepage">
<?php include_partial_sp('global/header') ?>
  <div data-role="content">
<?php endif; ?>
    <?php echo $sf_content ?>
<?php if (has_slot('title')): ?>
  </div>
<?php include_partial_sp('global/footer') ?>
</div>
<?php endif; ?>
<?php include_partial_sp('global/menu') ?>
</body>
</html>
