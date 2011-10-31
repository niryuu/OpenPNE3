<?php
function footer()
{
  $footer = '<div data-role="footer"><p>'
          . link_to('プライバシーポリシー', 'default/privacyPolicy')
          . ' '
          . link_to('利用規約', 'default/userAgreement')
          . '</p></div>';

  return $footer;
}
?>

<div data-role="page" id="home">
  <div data-role="header" data-theme="b">
<a href="#" data-rel="back" data-icon="arrow-l" data-theme="b">戻る</a>
     <h1><?php echo opConfig::get('sns_name') ?> pc_frontend</h1>
    <a href="#menu" data-rel="dialog" data-transition="pop" data-icon="home" data-theme="b" class="ui-btn-right jqm-home">メニュー</a>     
  </div>

  <div data-role="content">
    <ul data-role="listview" data-inset="true" data-theme="e">
    <li data-role="list-divider">新着情報</li>
    <li>test</li>
    </ul>
    <br />
    <ul data-role="listview">
    <li data-role="list-divider">新着アクティビティ</li>
    </ul>
  </div>

  <?php echo footer() ?>
</div><!-- page "home" -->
