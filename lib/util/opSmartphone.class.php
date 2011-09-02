<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opSmartphone
 *
 * @package    OpenPNE
 * @subpackage util
 * @author     tozuka <tozuka@tejimaya.com>
 */
class opSmartphone
{
  protected static $instance = null;

  protected function __construct()
  {
  }

  public static function getInstance()
  {
    if (is_null(self::$instance))
    {
      $className = __CLASS__;
      self::$instance = new $className();
    }

    return self::$instance;
  }

  public function isSmartphone()
  {
    if (preg_match('/(iPhone)|(iPod)|(iPad)|(BlackBerry)|(Windows Phone)|(Symbian)|(Android)|(Emacs-w3m)/', $_SERVER['HTTP_USER_AGENT']))
    {
      return true;
    }

    return false;
  }

  public function isAndroid()
  {
    if (preg_match('/Android/', $_SERVER['HTTP_USER_AGENT']))
    {
      return true;
    }

    return false;
  }

}
