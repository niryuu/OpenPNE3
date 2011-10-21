<?php slot('title', __('Invite a friend to %1%', array('%1%' => $op_config['sns_name']))) ?>

<form action="<?php echo url_for('@member_invite') ?>" method="post">

<label for="member_config_mail_address">メールアドレス</label><br />
<input type="text" name="member_config[mail_address]" class="input_text" id="member_config_mail_address" /><br />

<label for="member_config_message">メッセージ(任意)</label><br />
<textarea rows="4" cols="30" name="member_config[message]" id="member_config_message"></textarea><br />

<label for="member_config_captcha_captcha">確認キーワード</label><br />
<p><img src="<?php echo sfContext::getInstance()->getUser()->generateSiteIdentifier() ?>/captcha.php?s" alt="captcha" /></p>
<input type="text" name="member_config[captcha][captcha]" id="member_config_captcha_captcha" />
<div class="help">上に表示されているキーワードを入力してください。</div> 

<input type="hidden" name="member_config[<?php echo $form->getCSRFFieldName() ?>]" value="<?php echo $form->getCSRFToken() ?>" id="member_config__csrf_token" />
<input type="submit" class="input_submit" data-theme="b" value="<?php echo __('Send') ?>" /> 
</form>

<!--
<php if (count($invites)): ?>
<h3><php echo __('Mail address list during invitation') ?></h3>

<php echo $listform->renderFormTag(url_for('@member_invite')) ?>
<php $i = 0 ?>
<php foreach ($listform as $field): ?>
<php if ($field->isHidden()) continue; ?>
<dl>
<dt><php echo date(__('Y/m/d'), strtotime($invites[$i]->getCreatedAt())) ?></dt>
<dd>
<php echo $field ?>
<php echo $field->renderLabel() ?>
</dd>
</dl>
<php $i++ ?>
<php endforeach ?>

<div class="operation">
<ul class="moreInfo button">
<li>
<php echo $listform->renderHiddenFields() ?>
<input type="submit" value="<php echo __('Delete') ?>" class="input_submit"/>
</li>
</ul>
</div>

</form>

</div>
</div>
<php endif ?>
-->
