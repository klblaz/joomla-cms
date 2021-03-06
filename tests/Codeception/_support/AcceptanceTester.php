<?php
/**
 * @package     Joomla.Test
 * @subpackage  AcceptanceTester
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Acceptance Tester global class for entry point
 *
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 *
 * @since  3.7.3
 */
class AcceptanceTester extends \Codeception\Actor
{
	use _generated\AcceptanceTesterActions;

	/**
	 * Function to check for PHP Notices or Warnings
	 *
	 * @param   string  $page  Optional, if not given checks will be done in the current page
	 *
	 * @note    doAdminLogin() before
	 * @since   3.7.3
	 *
	 * @return  void
	 */
	public function checkForPhpNoticesOrWarnings($page = null)
	{
		$I = $this;

		if ($page)
		{
			$I->amOnPage($page);
		}

		$I->dontSeeInPageSource('Notice:');
		$I->dontSeeInPageSource('<b>Notice</b>:');
		$I->dontSeeInPageSource('Warning:');
		$I->dontSeeInPageSource('<b>Warning</b>:');
		$I->dontSeeInPageSource('Strict standards:');
		$I->dontSeeInPageSource('<b>Strict standards</b>:');
		$I->dontSeeInPageSource('The requested page can\'t be found');
	}

	/**
	 * Function to wait for JS to be properly loaded on page change
	 *
	 * @param   int|float  $timeout  Time to wait for JS to be ready
	 *
	 * @since   __DEPLOY_VERSION__
	 *
	 * @return  void
	 */
	public function waitForJsOnPageLoad($timeout = 1)
	{
		$I = $this;

		$I->waitForJS('return document.readyState == "complete"', $timeout);

		// Wait an additional 500ms to make sure that really all JS is loaded
		$I->wait(0.5);
	}
}
