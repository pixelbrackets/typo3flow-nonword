<?php
namespace Pixelbrackets\NonWord\Service;

use TYPO3\Flow\Annotations as Flow;
use Pixelbrackets\NonWord\Domain\Model\NonWord;

class Notification {

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
		$mail->setFrom(array('john@example.com ' => 'John Doe'))
				 ->setTo(array('bill@example.com ' => 'Bill Doe'))
				 ->setSubject('New non word')
				 ->setBody($content)
				 ->send();
	}

}
