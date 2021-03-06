<?php

/*
  +------------------------------------------------------------------------+
  | Phalcon Developer Tools                                                |
  +------------------------------------------------------------------------+
  | Copyright (c) 2011-2016 Phalcon Team (https://www.phalconphp.com)      |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file LICENSE.txt.                             |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Andres Gutierrez <andres@phalconphp.com>                      |
  |          Eduar Carvajal <eduar@phalconphp.com>                         |
  |          Serghei Iakovlev <serghei@phalconphp.com>                     |
  +------------------------------------------------------------------------+
*/

namespace Phalcon\Builder\Quickstart;

use Phalcon\Builder\Controller as ControllerBuilder;
use Phalcon\Web\Tools;

/**
 * Simple
 *
 * Builder to create Simple application skeletons
 *
 * @package Phalcon\Builder\Quickstart
 */
class Simple extends QuickstartBuilder
{
    use ProjectAware;

    /**
     * Project directories
     * @var array
     */
    protected $projectDirectories = [
        'app',
        'app/views',
        'app/config',
        'app/models',
        'app/controllers',
        'app/library',
        'app/migrations',
        'app/views/index',
        'app/views/dashboard',
        'app/views/layouts',
        'cache',
        'public',
        /*'public/img',
        'public/css',
        'public/temp',
        'public/files',
        'public/js',*/
        '.phalcon'
    ];

    /**
     * Create indexController file
     *
     * @return $this
     */
    private function createControllerFile()
    {
        $builder = new ControllerBuilder([
            'name'           => 'index',
            'directory'      => $this->options->get('projectPath') ,
            'controllersDir' => $this->options->get('projectPath')  . 'app/controllers',
            'baseClass'      => 'ControllerBase'
        ]);

        $builder->build();

        return $this;
    }

    /**
     * Create .htaccess files by default of application
     *
     * @return $this
     */
    private function createHtaccessFiles()
    {
        if (file_exists($this->options->get('projectPath') . '.htaccess') == false) {
            $code = '<IfModule mod_rewrite.c>'.PHP_EOL.
                "\t".'RewriteEngine on'.PHP_EOL.
                "\t".'RewriteRule  ^$ public/    [L]'.PHP_EOL.
                "\t".'RewriteRule  (.*) public/$1 [L]'.PHP_EOL.
                '</IfModule>';
            file_put_contents($this->options->get('projectPath').'.htaccess', $code);
        }

        if (file_exists($this->options->get('projectPath') . 'public/.htaccess') == false) {
            file_put_contents(
                $this->options->get('projectPath').'public/.htaccess',
                file_get_contents($this->options->get('templatePath') . '/project/simple/htaccess')
            );
        }

        if (file_exists($this->options->get('projectPath').'index.html') == false) {
            $code = '<html><body><h1>Mod-Rewrite is not enabled</h1><p>Please enable rewrite module on your web server to continue</body></html>';
            file_put_contents($this->options->get('projectPath').'index.html', $code);
        }

        return $this;
    }

    /**
     * Create view files by default
     *
     * @return $this
     */
    private function createIndexViewFiles()
    {
        $engine = $this->options->get('templateEngine') == 'volt' ? 'volt' : 'phtml';

        $getFile = $this->options->get('templatePath') . '/project/simple/views/index.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/index.' . $engine;
        $this->generateFile($getFile, $putFile);

        $getFile = $this->options->get('templatePath') . '/project/simple/views/index/index.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/index/index.' . $engine;
        $this->generateFile($getFile, $putFile);

        $getFile = $this->options->get('templatePath') . '/project/simple/views/dashboard/index.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/dashboard/index.' . $engine;
        $this->generateFile($getFile, $putFile);

        $getFile = $this->options->get('templatePath') . '/project/simple/views/dashboard/tutorial.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/dashboard/tutorial.' . $engine;
        $this->generateFile($getFile, $putFile);
        return $this;
    }

    /**
     * Create admin layout files by default
     *
     * @return $this
     */
    private function createAdminLayoutViewFile()
    {
        $engine = $this->options->get('templateEngine') == 'volt' ? 'volt' : 'phtml';

        $getFile = $this->options->get('templatePath') . '/project/simple/views/layouts/admin.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/layouts/admin.' . $engine;
        $this->generateFile($getFile, $putFile);

        $getFile = $this->options->get('templatePath') . '/project/simple/views/layouts/base.' . $engine;
        $putFile = $this->options->get('projectPath').'app/views/layouts/base.' . $engine;
        $this->generateFile($getFile, $putFile);

        return $this;
    }

    /**
     * Creates the configuration
     *
     * @return $this
     */
    private function createConfig()
    {
        $type = $this->options->contains('useConfigIni') ? 'ini' : 'php';

        $getFile = $this->options->get('templatePath') . '/project/simple/config.' . $type;
        $putFile = $this->options->get('projectPath') . 'app/config/config.' . $type;
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        $getFile = $this->options->get('templatePath') . '/project/simple/loader.php';
        $putFile = $this->options->get('projectPath') . 'app/config/loader.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        $getFile = $this->options->get('templatePath') . '/project/simple/services.php';
        $putFile = $this->options->get('projectPath') . 'app/config/services.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        $getFile = $this->options->get('templatePath') . '/project/simple/router.php';
        $putFile = $this->options->get('projectPath') . 'app/config/router.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        return $this;
    }

    /**
     * Create IndexController
     *
     * @return $this
     */
    private function createIndexController()
    {
        $getFile = $this->options->get('templatePath') . '/project/simple/IndexController.php';
        $putFile = $this->options->get('projectPath') . 'app/controllers/IndexController.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        return $this;
    }

    /**
     * Create ControllerBase
     *
     * @return $this
     */
    private function createControllerBase()
    {
        $getFile = $this->options->get('templatePath') . '/project/simple/ControllerBase.php';
        $putFile = $this->options->get('projectPath') . 'app/controllers/ControllerBase.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        return $this;
    }

    /**
     * Create ControllerAdmin
     *
     * @return $this
     */
    private function createControllerAdmin()
    {
        $getFile = $this->options->get('templatePath') . '/project/simple/ControllerAdmin.php';
        $putFile = $this->options->get('projectPath') . 'app/controllers/ControllerAdmin.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));

        $getFile = $this->options->get('templatePath') . '/project/simple/DashboardController.php';
        $putFile = $this->options->get('projectPath') . 'app/controllers/DashboardController.php';
        $this->generateFile($getFile, $putFile, $this->options->get('name'));
        return $this;
    }

    /**
     * Create Bootstrap file by default of application
     *
     * @return $this
     */
    private function createBootstrapFiles()
    {
        $getFile = $this->options->get('templatePath') . '/project/simple/index.php';
        $putFile = $this->options->get('projectPath') . 'public/index.php';
        $this->generateFile($getFile, $putFile);

        return $this;
    }

    /**
    * Copy all assets files
    *
    * @return $this
    */
    private function createAssets()
    {
      $assetsSrc = $this->options->get('templatePath') . '/assets/';
      $assetsDest = $this->options->get('projectPath') . 'public/';
      foreach (
       $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($assetsSrc, \RecursiveDirectoryIterator::SKIP_DOTS),
        \RecursiveIteratorIterator::SELF_FIRST) as $item
      ) {
        if ($item->isDir()) {
          mkdir($assetsDest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
        } else {
          copy($item, $assetsDest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
        }
      }
    }
    /**
     * Build project
     *
     * @return bool
     */
    public function build()
    {
        $this
            ->buildDirectories()
            ->getVariableValues()
            ->createConfig()
            ->createBootstrapFiles()
            ->createHtaccessFiles()
            ->createIndexController()
            ->createControllerBase()
            ->createControllerAdmin()
            ->createIndexViewFiles()
            ->createAdminLayoutViewFile()
            //->createControllerFile()
            ->createHtrouterFile()
            ->createAssets();

        $this->options->contains('enableWebTools') && Tools::install($this->options->get('projectPath'));

        return true;
    }
}
