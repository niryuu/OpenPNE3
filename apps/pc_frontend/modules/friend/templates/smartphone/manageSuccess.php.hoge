<?php slot('title', 'マイフレンド管理') ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $member): ?>
  <li><a href="<?php echo url_for('@member_profile?id='.$member->getId()) ?>">
      <?php echo op_image_tag_sf_image($member->getImageFileName(), array('size' => '76x76')) ?>
      <h3><?php echo $member->getNameAndCount() ?></h3>
    </a>
    <a href="<?php echo url_for('@obj_friend_unlink?id='.$member->getId()) ?>">マイフレンドから外す</a>
  </li>
<?php endforeach ?>
  <li id="loadmore">
      <h3>Next</h3>
  </li>
</ul>
<script type="text/javascript">
(function () {
  Smart.pager.num = '2';
  Smart.pager.ajaxOption = {
    type : 'GET',
    url : 'manage.json?page=2',
    dataType : 'json',
    complete : function (data, dataType) {
      alert(dataType);
    },
  };
})();
</script>
