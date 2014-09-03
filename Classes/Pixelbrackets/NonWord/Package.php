<?php
namespace Pixelbrackets\NonWord;

use TYPO3\Flow\Package\Package as BasePackage;
use TYPO3\Flow\Annotations as Flow;

/**
 * Package base class of the Pixelbrackets.NonWord package.
 *
 * @Flow\Scope("singleton")
 */
class Package extends BasePackage {

	/**
	* Boot the package. We wire some signals to slots here.
	*
	* @param \TYPO3\Flow\Core\Bootstrap $bootstrap The current bootstrap
	* @return void
	*/
	public function boot(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
		$dispatcher = $bootstrap->getSignalSlotDispatcher();
		$dispatcher->connect(
			'Pixelbrackets\NonWord\Controller\NonWordController', 'nonWordCreated', // Signal class & method emitNonWordCreated
			'Pixelbrackets\NonWord\Service\Notification', 'sendNewNonWordNotification' // Slot class & method sendNewNonWordNotification
		);
	}

}