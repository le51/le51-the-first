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
  +------------------------------------------------------------------------+
*/

namespace Phalcon\Commands\Builtin;

use Phalcon\Script\Color;
use Phalcon\Commands\Command;
use Phalcon\Builder\Quickstart as ProjectBuilder;

/**
 * Quickstart Command
 *
 * Creates quickstart skeletons
 *
 * @package Phalcon\Commands\Builtin
*/
class Quickstart extends Command
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getPossibleParams()
    {
        return [
            'name=s'            => 'Name of the new project',
            //'enable-webtools'   => 'Determines if webtools should be enabled [optional]',
            'directory=s'       => 'Base path on which project will be created [optional]',
            'type=s'            => 'Type of the application to be generated (cli, micro, simple, modules)',
            //'template-path=s'   => 'Specify a template path [optional]',
            //'template-engine=s' => 'Define the template engine, default phtml (phtml, volt) [optional]',
            'use-config-ini'    => 'Use a ini file as configuration file [optional]',
            'trace'             => 'Shows the trace of the framework in case of exception [optional]',
            'help'              => 'Shows this help [optional]',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array $parameters
     * @return mixed
     */
    public function run(array $parameters)
    {
        $projectName    = $this->getOption(['name', 1], null, 'default');
        $projectType    = $this->getOption(['type', 2], null, 'simple');
        $projectPath    = $this->getOption(['directory', 3]);
        $templatePath   = $this->getOption(['template-path'], null, TEMPLATE_PATH . DS . '..' . DS . 'quickstart');
        //$enableWebtools = $this->getOption(['enable-webtools', 4], null, false);
        $enableWebtools = true;
        $useConfigIni   = $this->getOption('use-config-ini');
        //$templateEngine = $this->getOption(['template-engine'], null, "phtml");
        $templateEngine = "volt";

        $builder = new ProjectBuilder([
            'name'           => $projectName,
            'type'           => $projectType,
            'directory'      => $projectPath,
            'enableWebTools' => $enableWebtools,
            'templatePath'   => $templatePath,
            'templateEngine' => $templateEngine,
            'useConfigIni'   => $useConfigIni
        ]);

        return $builder->build();
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getCommands()
    {
        return ['quickstart', 'quickstart-project'];
    }

    /**
     * {@inheritdoc}
     *
     * @return boolean
     */
    public function canBeExternal()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function getHelp()
    {
        print Color::head('Help:') . PHP_EOL;
        print Color::colorize('  Quickstart a project') . PHP_EOL . PHP_EOL;

        print Color::head('Usage:') . PHP_EOL;
        print Color::colorize('  project [name] [type] [directory]', Color::FG_GREEN) . PHP_EOL . PHP_EOL;

        print Color::head('Arguments:') . PHP_EOL;
        print Color::colorize('  help', Color::FG_GREEN);
        print Color::colorize("\tShows this help text") . PHP_EOL . PHP_EOL;

        print Color::head('Example') . PHP_EOL;
        print Color::colorize('  phalcon quickstart store simple', Color::FG_GREEN) . PHP_EOL . PHP_EOL;

        $this->printParameters($this->getPossibleParams());
    }

    /**
     * {@inheritdoc}
     *
     * @return integer
     */
    public function getRequiredParams()
    {
        return 1;
    }
}
