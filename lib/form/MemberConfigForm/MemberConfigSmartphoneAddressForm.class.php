<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * MemberConfigSmartphoneAddress form.
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Tozuka <tozuka@tejimaya.com>
 */
class MemberConfigSmartphoneAddressForm extends MemberConfigForm
{
  protected $category = 'smartphoneAddress';

  public function __construct(Member $member = null, $options = array(), $CSRFSecret = null)
  {
    parent::__construct($member, $options, $CSRFSecret);

    if (sfConfig::get('op_is_use_captcha', false))
    {
      $this->embedForm('captcha', new opCaptchaForm());
    }
  }

  public function saveConfig($name, $value)
  {
    if ('smartphone_address' === $name)
    {
      $this->savePreConfig($name, $value);

      $memberConfig = Doctrine::getTable('MemberConfig')->retrieveByNameAndMemberId('smartphone_address_token', $this->member->getId(), true);
      $token = $memberConfig->getValue();
      $this->sendConfirmMail($token, $value, array(
        'id'   => $this->member->getId(),
        'type' => $name,
      ));

      return true;
    }

    parent::saveConfig($name, $value);
  }

  protected function sendConfirmMail($token, $to, $params = array())
  {
    $params = array_merge(array(
      'token'   => $token,
      'subject' => 'MMSアドレス変更ページのお知らせ',
      'target'  => 'smartphone',
    ), $params);

    opMailSend::sendTemplateMail('changeMailAddress', $to, opConfig::get('admin_mail_address'), $params);
  }

  public function getCompleteMessage()
  {
    return 'Sent a mail for your mail address. Please click URL in the mail for completing configuration.';
  }
}
