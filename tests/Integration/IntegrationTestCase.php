<?php
/**
 * @package    Joomla.UnitTest
 *
 * @copyright  Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://www.phpunit.de/manual/current/en/installation.html
 */

namespace Joomla\Tests\Integration;

/**
 * Base Integration Test case for common behaviour across integration tests
 */
abstract class IntegrationTestCase extends \PHPUnit\Framework\TestCase
{

	protected function setUp():void
	{
		parent::setUp();

		if ($this instanceof DBTestInterface)
		{
			DBTestHelper::setupTest($this);
		}
	}
}
