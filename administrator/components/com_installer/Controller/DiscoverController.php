<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_installer
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Installer\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;

/**
 * Discover Installation Controller
 *
 * @since  1.6
 */
class DiscoverController extends BaseController
{
	/**
	 * Refreshes the cache of discovered extensions.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public function refresh()
	{
		$this->checkToken();

		/** @var \Joomla\Component\Installer\Administrator\Model\DiscoverModel $model */
		$model = $this->getModel('discover');
		$model->discover();
		$this->setRedirect(Route::_('index.php?option=com_installer&view=discover', false));
	}

	/**
	 * Install a discovered extension.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public function install()
	{
		$this->checkToken();

		/** @var \Joomla\Component\Installer\Administrator\Model\DiscoverModel $model */
		$model = $this->getModel('discover');
		$model->discover_install();
		$this->setRedirect(Route::_('index.php?option=com_installer&view=discover', false));
	}

	/**
	 * Clean out the discovered extension cache.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public function purge()
	{
		$this->checkToken();

		/** @var \Joomla\Component\Installer\Administrator\Model\DiscoverModel $model */
		$model = $this->getModel('discover');
		$model->purge();
		$this->setRedirect(Route::_('index.php?option=com_installer&view=discover', false), $model->_message);
	}
}
