<?php
namespace Pixelbrackets\NonWord\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Pixelbrackets.NonWord". *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\Authentication\Controller\AbstractAuthenticationController;

/**
 * Login controller for the Pixelbrackets.NonWord package
 *
 * @Flow\Scope("singleton")
 */
class LoginController extends AbstractAuthenticationController {

	/**
	 * Is called if authentication was successful
	 *
	 * @param \TYPO3\Flow\Mvc\ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 * @return string
	 */
	protected function onAuthenticationSuccess(\TYPO3\Flow\Mvc\ActionRequest $originalRequest = NULL) {
		$this->redirect('index');
	}

	/**
	 *
	 */
	public function logoutAction() {
		parent::logoutAction();
		$this->redirect('index');
	}
}