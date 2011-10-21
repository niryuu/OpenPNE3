<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opSmartphonePartialView
 *
 * @package    OpenPNE
 * @subpackage view
 * @author     Tajima Itsuro <tajima@tejimaya.com>
 */
class opSmartphonePartialView extends sfPartialView
{
  /**
   * Renders the presentation.
   *
   * @return string A string representing the rendered presentation
   */
  /*public function render()
  {
    { 
      $this->setDirectory($this->getDirectory() . '/smartphone');
    }
    return parent::render();
  }*/

  /**
   * Sets the template directory for this view.
   *
   * @param string $directory  An absolute filesystem path to a template directory
   */
  //public function setDirectory($directory)
  //{
  //  $this->directory = $directory . '/smartphone';
  //}

  /**
   * Sets the template for this view.
   *
   * If the template path is relative, it will be based on the currently
   * executing module's template sub-directory.
   *
   * @param string $template  An absolute or relative filesystem path to a template
   */
  /*public function setTemplate($template)
  {
    error_log(var_dump('called opView::setTemplate '));
    if (sfToolkit::isPathAbsolute($template))
    {
      $this->directory = dirname($template);
      $this->template  = basename($template);
    }
    else
    {
      $this->directory = $this->context->getConfiguration()->getTemplateDir($this->moduleName, $template);
      $this->template = $template;
    }
  }*/

  /**
   * Configures template for this view.
   */
  public function configure()
  { 
    $this->setDecorator(false);
    $this->setTemplate($this->actionName.$this->getExtension());
    if ('global' == $this->moduleName)
    {
      $this->setDirectory($this->context->getConfiguration()->getSmartphoneDecoratorDir($this->getTemplate()));
    }
    else
    {
      $this->setDirectory($this->context->getConfiguration()->getSmartphoneTemplateDir($this->moduleName, $this->getTemplate()));
    }
  }
}
