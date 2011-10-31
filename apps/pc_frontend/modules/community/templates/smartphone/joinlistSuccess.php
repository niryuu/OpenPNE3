<?php slot('title', __('%community% List')) ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $community): ?>
  <!-- 'crownIds' => $sf_data->getRaw('crownIds'), -->
  <li><a href="<?php echo url_for('community/home?id='.$community->getId()) ?>">
    <?php echo image_tag_sf_image($community->getImageFilename(), array('size' => '76x76')) ?>
    <h3><?php echo $community->getName() ?></h3>
    <p><?php echo $community->getConfig('description') ?></p>
    </a>
  </li>
<?php endforeach ?>
</ul>

