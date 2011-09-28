<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * SmartphoneHelper.
 *
 * @package    openpne
 * @subpackage helper
 * @author     Tajima Itsuro <tajima@tejimaya.com>
 */

/**
 * Evaluates and echoes a partial for smartphone.
 * The partial name is composed as follows: 'mymodule/mypartial'.
 * The partial file name is _mypartial.php and is looked for in modules/mymodule/templates/smartphone/.
 * If the partial name doesn't include a module name,
 * then the partial file is searched for in the caller's template/ directory.
 * If the module name is 'global', then the partial file is looked for in myapp/templates/smartphone/.
 * For a variable to be accessible to the partial, it has to be passed in the second argument.
 *
 * <b>Example:</b>
 * <code>
 *  include_partial_sp('mypartial', array('myvar' => 12345));
 * </code>
 *
 * @param  string $templateName  partial name
 * @param  array  $vars          variables to be made accessible to the partial
 *
 * @see    get_partial_sp, include_component
 */
function include_partial_sp($templateName, $vars = array())
{
  echo get_partial_sp($templateName, $vars);
}

/**
 * Evaluates and returns a partial for smartphone.
 * The syntax is similar to the one of include_partial_sp
 *
 * <b>Example:</b>
 * <code>
 *  echo get_partial_sp('mypartial', array('myvar' => 12345));
 * </code>
 *
 * @param  string $templateName  partial name
 * @param  array  $vars          variables to be made accessible to the partial
 *
 * @return string result of the partial execution
 * @see    include_partial_sp
 */
function get_partial_sp($templateName, $vars = array())
{
  $context = sfContext::getInstance();

  // partial is in another module?
  if (false !== $sep = strpos($templateName, '/'))
  {
    $moduleName   = substr($templateName, 0, $sep);
    $templateName = substr($templateName, $sep + 1);
  }
  else
  {
    $moduleName = $context->getActionStack()->getLastEntry()->getModuleName();
  }
  $actionName = '_'.$templateName;

  $class = 'opSmartphonePartialView';
  $view = new $class($context, $moduleName, $actionName, '');
  $view->setPartialVars(true === sfConfig::get('sf_escaping_strategy') ? sfOutputEscaper::unescape($vars) : $vars);

  return $view->render();
}
