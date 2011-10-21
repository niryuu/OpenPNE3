<?php slot('title', __('Member Registration')) ?>

<!--
<php $has_register_box = false ?>
<php foreach ($sf_user->getAuthAdapters() as $adapter): ?>
<php if ($adapter->isInvitedRegisterable() && $sf_context->getController()->componentExists($adapter->getAuthModuleName(), 'registerBox')): ?>
<php
$has_register_box = true;
include_component($adapter->getAuthModuleName(), 'registerBox');
?>
<php endif; ?>
<php endforeach; ?>

<php if (!$has_register_box): ?>
<php echo op_include_box('noRegisterBoxError', '現在登録可能なアカウントがありません。') ?>
<php endif; ?>
-->

<!--
<h3>メールアドレスで登録する</h3>
-->
<p>以下のボタンをクリックすると、招待されたメールアドレスで登録を行います。</p>
<form action="<?php echo url_for('member/registerInput?token='.$sf_params->get('token')) ?>" method="get"> 
<input type="submit" class="input_submit" data-theme="b" value="プロフィール入力ページへ" />
</form>
