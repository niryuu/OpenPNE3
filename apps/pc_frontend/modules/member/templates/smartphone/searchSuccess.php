<?php slot('title', __('Search Members')) ?>

<?php
$options = array(
  'title'    => __('Search Member'),
  'url'      => url_for('@member_search'),
  'button'   => __('Search'),
  'method'   => 'get'
);

op_include_form('searchMember', $filters, $options);
?>
</div>
<div data-role="content">

<?php if ($pager->getNbResults()): ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $key => $member): ?>
  <li><a href="<?php echo url_for('@member_profile?id='.$member->getId()) ?>">
      <h3><?php echo $member->getName() ?></h3>
      <p><?php echo op_format_last_login_time($member->getLastLoginTime()) ?></p>
      </a>
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
    url : 'list.json?page=2',
    dataType : 'json',
    complete : function (data, dataType) {
      alert(dataType);
    },
  };
})();
</script>
<?php else: ?>
<?php endif; ?>
