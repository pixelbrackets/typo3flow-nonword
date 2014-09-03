<?php
namespace Pixelbrackets\NonWord\Service;

use TYPO3\Flow\Annotations as Flow;

class Notification {

	/**
	 * Send e-mail notification about new non word
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function sendNewNonWordNotification(NonWord $nonWord) {
		$mail = new \TYPO3\SwiftMailer\Message();
		$mail->setFrom(array('john@example.com ' => 'John Doe'))
				 ->setTo(array('bill@example.com ' => 'Bill Doe'))
				 ->setSubject('New non word')
				// ->setBody('New non word: ' . $nonWord->getTitle())
				 ->setBody('New non word!')
				 ->send();
	}

}
