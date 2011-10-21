<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * A view for OpenPNE.
 *
 * @package    OpenPNE
 * @subpackage view
 * @author     Kousuke Ebihara <ebihara@php.net>
 */

class opView extends sfPHPView
{
  public $customizeConditions = array(
    'category' => array(
      'all' => array(),
    ),
    'parts' => array(
      'all' => array(),
    ),
    'target' => array(
      'all' => array(),
    ),
  );

  public $customizeTemplates = array();

  protected $customizeComponents = array();

  /**
   * Sets the customize.
   *
   * @param string $attributeName  A template attribute name
   * @param string $moduleName     A module name
   * @param string $templateName   A template name
   * @param array  $categoryNames  Category names
   * @param array  $partsNames     Parts names
   * @param array  $targetNames    Target names
   * @param bool   $isComponent
   */
  public function setCustomize($attributeName, $moduleName, $templateName, $categoryNames, $partsNames, $targetNames, $isComponent = false)
  {
    if (empty($categoryNames))
    {
      $this->customizeConditions['category']['all'][] = $attributeName;
    }
    else
    {
      foreach ($categoryNames as $categoryName)
      {
        $this->customizeConditions['category'][$categoryName][] = $attributeName;
      }
    }

    if (empty($partsNames))
    {
      $this->customizeConditions['parts']['all'][] = $attributeName;
    }
    else
    {
      foreach ($partsNames as $partsName)
      {
        $this->customizeConditions['parts'][$partsName][] = $attributeName;
      }
    }

    if (empty($targetNames))
    {
      $this->customizeConditions['target']['all'][] = $attributeName;
    }
    else
    {
      foreach ($targetNames as $targetName)
      {
        $this->customizeConditions['target'][$targetName][] = $attributeName;
      }
    }

    $this->customizeTemplates[$attributeName] = array($moduleName, $templateName, $isComponent);
  }

  /**
   * Gets the customize.
   *
   * @param array  $categoryName  A category name
   * @param array  $partsName     A parts name
   * @param array  $targetName    A target name
   */
  public function getCustomize($categoryName, $partsName, $targetName)
  {
    $result = array();

    $categoryCustomizes = $this->customizeConditions['category']['all'];
    if ($categoryName && !empty($this->customizeConditions['category'][$categoryName]))
    {
      $categoryCustomizes = array_merge($categoryCustomizes, $this->customizeConditions['category'][$categoryName]);
    }

    $partsCustomizes = $this->customizeConditions['parts']['all'];
    if ($partsName && !empty($this->customizeConditions['parts'][$partsName]))
    {
      $partsCustomizes = array_merge($partsCustomizes, $this->customizeConditions['parts'][$partsName]);
    }

    $targetCustomizes = $this->customizeConditions['target']['all'];
    if ($targetName && !empty($this->customizeConditions['target'][$targetName]))
    {
      $targetCustomizes = array_merge($targetCustomizes, $this->customizeConditions['target'][$targetName]);
    }

    $customizes = array_intersect($categoryCustomizes, $partsCustomizes, $targetCustomizes);

    sort($customizes);
    
    foreach ($customizes as $customize)
    {
      $result[] = $this->customizeTemplates[$customize];
    }

    return $result;
  }

  public function setDecoratorDirectory($directory)
  {
    $this->decoratorDirectory = $directory . '/smartphone';
  }

  /**
   * Sets the template directory for this view.
   *
   * @param string $directory  An absolute filesystem path to a template directory
   */
  public function setDirectory($directory)
  {
    $this->directory = $directory . '/smartphone';
  }

  /**
   * Sets the template for this view.
   *
   * If the template path is relative, it will be based on the currently
   * executing module's template sub-directory.
   *
   * @param string $template  An absolute or relative filesystem path to a template
   */
  public function setTemplate($template)
  {
    if (sfToolkit::isPathAbsolute($template))
    {
      $this->directory = dirname($template);
      $this->template  = basename($template);
    }
    else
    {
      $this->directory = $this->context->getConfiguration()->getTemplateDir($this->moduleName, $template) . '/smartphone';
      $this->template = $template;
    }
  }

  /**
   * Sets the decorator template for this view.
   *
   * If the template path is relative, it will be based on the currently
   * executing module's template sub-directory.
   *
   * @param string $template  An absolute or relative filesystem path to a template
   */
  public function setDecoratorTemplate($template)
  {
    if (false === $template)
    {
      $this->setDecorator(false);

      return;
    }
    else if (null === $template)
    {
      return;
    }

    if (!strpos($template, '.'))
    {
      $template .= $this->getExtension();
    }

    if (sfToolkit::isPathAbsolute($template))
    {
      $this->decoratorDirectory = dirname($template);
      $this->decoratorTemplate  = basename($template);
    }
    else
    {
      $this->decoratorDirectory = $this->context->getConfiguration()->getDecoratorDir($template) . '/smartphone';
      $this->decoratorTemplate = $template;
    }

    // set decorator status
    $this->decorator = true;
  }

  /**
   * Configures template.
   *
   * @return void
   */
  public function configure()
  {
    // store our current view
    $this->context->set('view_instance', $this);

    // require our configuration
    require($this->context->getConfigCache()->checkConfig('modules/'.$this->moduleName.'/config/view_smart.yml'));

    // set template directory
    if (!$this->directory)
    {
      $this->setDirectory($this->context->getConfiguration()->getTemplateDir($this->moduleName, $this->getTemplate()));
    }
  }
}
