<?php
/**
 * @file
 * Contains Drupal\phpunit_dcc\Generator.
 */

namespace Drupal\phpunit_dcc\Generator;


use Drupal\Console\Generator\Generator;


class PHPUnitGenerator extends Generator {

  /**
   * {@inheritdoc}
   */
  public function generate($module) {
    $parameters = [
      'module' => $module,
    ];

    $this->renderFile(
      'module/phpunit.dist.xml.twig',
      $this->getSite()->getModulePath($module) . '/' . 'phpunit.dist.xml',
      $parameters
    );

  }
}