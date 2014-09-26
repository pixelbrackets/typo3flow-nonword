<?php
namespace Pixelbrackets\NonWord\Service;

use TYPO3\Flow\Annotations as Flow;
use Pixelbrackets\NonWord\Domain\Model\NonWord;

class Notification {

	/**
	* @var array
	*/
	protected $settings;

	/**
	* Inject the settings
	*
	* @param array $settings
	* @return void
	*/
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Send e-mail notification about new non word
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @param String $uri
	 * @return void
	 */
	public function sendNewNonWordNotification(NonWord $nonWord, $uri) {
		$content = 'Yikes! New non word discovered: ' . $nonWord->getTitle()
			. PHP_EOL . PHP_EOL . $uri;

		$mail = new \TYPO3\SwiftMailer\Message();
		$mail->setFrom(array($this->settings['notification']['fromEmail'] => $this->settings['notification']['fromName']))
				 ->setTo(array($this->settings['notification']['toEmail'] => $this->settings['notification']['toName']))
				 ->setSubject('New non word')
				 ->setBody($content)
				 ->send();
	}

}
