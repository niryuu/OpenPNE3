<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

require_once dirname(__FILE__).'/../../../lib/config/opApplicationConfiguration.class.php';
require_once dirname(__FILE__).'/../../../lib/util/opSmartphone.class.php';

class pc_frontendConfiguration extends opApplicationConfiguration
{
  public function configure()
  {
    sfConfig::set('op_is_use_captcha', true);
    $is_smartphone = opSmartphone::getInstance()->isSmartphone();
    if ($is_smartphone)
    {
      sfConfig::set('op_is_smartphone', true);
    }
    //else
    //{
    //  sfConfig::set('op_is_smartphone', false);
    //}
  }

  public function initialize()
  {
    parent::initialize();

    sfWidgetFormSchema::setDefaultFormFormatterName('pc');
  }

  /**
   * Gets directories where template files are stored for a given module.
   *
   * @param string $moduleName The module name
   *
   * @return array An array of directories
   */
  public function getSmartphoneTemplateDirs($moduleName)
  {
    $dirs = array();

    $dirs[] = sfConfig::get('sf_app_module_dir').'/'.$moduleName.'/templates/smartphone';                  // application
    $dirs = array_merge($dirs, $this->getPluginSubPaths('/modules/'.$moduleName.'/templates/smartphone')); // plugins
    $dirs[] = $this->getSymfonyLibDir().'/controller/'.$moduleName.'/templates/smartphone';                // core modules
    $dirs[] = sfConfig::get('sf_module_cache_dir').'/auto'.ucfirst($moduleName.'/templates/smartphone');   // generated templates in cache

    return $dirs;
  }

  /**
   * Gets the template directory to use for a given module and template file.
   *
   * @param string $moduleName    The module name
   * @param string $templateFile  The template file
   *
   * @return string A template directory
   */
  public function getSmartphoneTemplateDir($moduleName, $templateFile)
  {
    if (!isset($this->cache['getSmartphoneTemplateDir'][$moduleName][$templateFile]))
    {
      $this->cache['getSmartphoneTemplateDir'][$moduleName][$templateFile] = null;
      foreach ($this->getTemplateDirs($moduleName) as $dir)
      {
        if (is_readable($dir.'/'.$templateFile))
        {
          $this->cache['getSmartphoneTemplateDir'][$moduleName][$templateFile] = $dir;
          break;
        }
      }
    }

    return $this->cache['getSmartphoneTemplateDir'][$moduleName][$templateFile];
  }

  /**
   * Gets the decorator directory for a given template.
   *
   * @param  string $template The template file
   *
   * @return string A template directory
   */
  public function getSmartphoneDecoratorDir($template)
  {
    foreach ($this->getDecoratorDirs() as $dir)
    {
      $smartphone_dir = $dir . '/smartphone';
      if (is_readable($smartphone_dir.'/'.$template))
      {
        return $smartphone_dir;
      }
    }
  }

}
