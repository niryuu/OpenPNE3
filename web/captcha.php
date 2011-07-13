<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

if ('s' === $_SERVER['QUERY_STRING'])
{
  $app = 'smartphone_frontend';
}
else
{
  $app = 'pc_frontend';
}

// we can use session after loading factories (don't need to dispatch controller)
$configuration = ProjectConfiguration::getApplicationConfiguration($app, 'prod', false);
sfContext::createInstance($configuration);

require_once(sfConfig::get('sf_data_dir').'/kcaptcha/kcaptcha.php');
$captcha = new KCAPTCHA();
$_SESSION['captcha_keystring'] = $captcha->getKeyString();
