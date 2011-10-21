<?php
$form = new sfForm();
?>
<?php slot('title', '本当に' . $member->getName() . 'をマイフレンドから外しますか？') ?>

<ul data-role="listview">
  <li>
    <form action="<?php echo url_for('@obj_friend_unlink?id='.$member->getId()) ?>" method="post">
      <input type="hidden" name="_csrf_token" value="<?php echo $form->getCSRFToken() ?>" id="csrf_token" />
      <input type="submit" class="input_submit" value="はい" /> 
    </form> 
  </li> 
  <li> 
    <form action="<?php echo url_for('@friend_manage') ?>" method="get"> 
      <input type="submit" class ="input_submit" value="いいえ" /> 
    </form> 
  </li> 
</ul>
