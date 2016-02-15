<?php

/**
 * @file
 * Contains \Drupal\phpunit_dcc\Command\Generate\PhpunitCommand.
 */

namespace Drupal\phpunit_dcc\Command\Generate;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Drupal\Console\Style\DrupalStyle;
use Drupal\Console\Command\GeneratorCommand;
use Drupal\Console\Command\ConfirmationTrait;
use Drupal\Console\Command\ModuleTrait;
use Drupal\Console\Command\FormTrait;
use Drupal\phpunit_dcc\Generator\PHPUnitGenerator;

/**
 * Class PhpunitCommand.
 *
 * @package Drupal\phpunit_dcc
 */
class PHPUnitCommand extends GeneratorCommand {

  use ModuleTrait;
  use FormTrait;
  use ConfirmationTrait;

  /**
   * {@inheritdoc}
   */
  protected function configure() {

    $this
      ->setName('generate:phpunit')
      ->setDescription($this->trans('command.generate.phpunit.description'))
      ->addOption('module', NULL, InputOption::VALUE_NONE, $this->trans('command.generate.phpunit.options.module'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {

    $io = new DrupalStyle($input, $output);

    $module = $input->getOption('module');
    if (!$module) {
      // @see Drupal\Console\Command\ModuleTrait::moduleQuestion
      $module = $this->moduleQuestion($io);
    }

    // Generate the file.
    $this->getGenerator()->generate($module);
  }

  /**
   * Creates generator.
   *
   * @return PHPUnitGenerator
   */
  protected function createGenerator() {
    return new PHPUnitGenerator();
  }

}
