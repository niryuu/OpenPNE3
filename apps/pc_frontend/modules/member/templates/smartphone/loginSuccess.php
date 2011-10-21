<?php slot('title', opConfig::get('sns_name')) ?>

<form action="<?php echo url_for('member/login?authMode=MailAddress') ?>" method="post"
  data-ajax="false" >

<div data-role="fieldcontain">
  <label for="authMailAddress_mail_address">メールアドレス</label>
  <input type="text" name="authMailAddress[mail_address]" id="authMailAddress_mail_address" value="" /><br />
  <label for="authMailAddress_password">パスワード</label>
  <input type="password" name="authMailAddress[password]" id="authMailAddress_password" value="" />
</div>
<!--
  <label for="authMailAddress_is_remember_me">次回から自動的にログイン</label>
  <input type="checkbox" name="authMailAddress[is_remember_me]" id="authMailAddress_is_remember_me" /><input value="member/home" type="hidden" name="authMailAddress[next_uri]" id="authMailAddress_next_uri" />
-->
<!-- <p class="password_query"><a href="/sf/opAuthMailAddress/helpLoginError">ログインできない方はこちら</a></p> -->
<input type="submit" class="input_submit" data-theme="b" value="ログイン" /> 
</form> 
