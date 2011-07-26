<?php slot('title', __('Search communities')) ?>

<?php
$options = array(
  'title'    => __('Search Community'),
  'url'      => url_for('@community_search'),
  'button'   => __('Search'),
  'moreInfo' => array(link_to(__('Create a new community'), '@community_edit')),
  'method'   => 'get'
);

op_include_form('searchCommunity', $filters, $options);
?>


<?php if ($pager->getNbResults()): ?>

<ul data-role="listview">
<?php foreach ($pager->getResults() as $key => $community): ?>
  <li><a href="<?php echo url_for('@community_home?id='.$community->getId()) ?>">
      <h3><?php echo $community->countCommunityMembers() ?></h3>
      <p><?php echo $community->getName() ?>
      </p>
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
