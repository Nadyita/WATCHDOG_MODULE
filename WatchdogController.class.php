<?php

namespace Budabot\User\Modules;

use stdClass;
use Exception;
use Budabot\Core\Registry;

/**
 * Authors:
 *  - Nadyita (RK5)
 *
 * @Instance
 */
class WatchdogController {

	/**
	 * Name of the module.
	 * Set automatically by module loader.
	 */
	public $moduleName;

	/** @Inject */
	public $db;

	/** @Inject */
	public $chatBot;

	/** @Inject */
	public $accessManager;

	/** @Inject */
	public $text;

	/** @Inject */
	public $util;

	/** @Inject */
	public $settingManager;

	/** @Inject */
	public $setting;

	/** @Logger */
	public $logger;

	/**
	 * @Setup
	 */
	public function setup() {
	}

	/**
	 * @Event("timer(10sec)")
	 * @Description("Periodically touch an alive-file")
	 */
	public function touchAliveFile() {
		touch(sys_get_temp_dir().'/alive.'.$this->chatBot->vars['name'].'.'.$this->chatBot->vars['dimension']);
	}
}
