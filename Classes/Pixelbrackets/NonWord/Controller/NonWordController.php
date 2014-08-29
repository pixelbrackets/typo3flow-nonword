<?php
namespace Pixelbrackets\NonWord\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Pixelbrackets.NonWord". *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use Pixelbrackets\NonWord\Domain\Model\NonWord;

class NonWordController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \Pixelbrackets\NonWord\Domain\Repository\NonWordRepository
	 */
	protected $nonWordRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('nonWords', $this->nonWordRepository->findAll());
	}

	/**
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function showAction(NonWord $nonWord) {
		$this->view->assign('nonWord', $nonWord);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $newNonWord
	 * @return void
	 */
	public function createAction(NonWord $newNonWord) {
		$this->nonWordRepository->add($newNonWord);
		$this->addFlashMessage('Created a new non word.');
		$this->redirect('index');
	}

	/**
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function editAction(NonWord $nonWord) {
		$this->view->assign('nonWord', $nonWord);
	}

	/**
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function updateAction(NonWord $nonWord) {
		$this->nonWordRepository->update($nonWord);
		$this->addFlashMessage('Updated the non word.');
		$this->redirect('index');
	}

	/**
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function deleteAction(NonWord $nonWord) {
		$this->nonWordRepository->remove($nonWord);
		$this->addFlashMessage('Deleted a non word.');
		$this->redirect('index');
	}

}