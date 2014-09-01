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
	 * Show a list of non words
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('nonWords', $this->nonWordRepository->findAll());
	}

	/**
	 * Show a single non word
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function showAction(NonWord $nonWord) {
		$this->view->assign('nonWord', $nonWord);
	}

	/**
	 * Show a random non word
	 *
	 * @return void
	 */
	public function randomAction() {
		$this->view->assign('nonWord', $this->nonWordRepository->findRandom());
	}

	/**
	 * Show a form to create a new non word
	 *
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * Add the given non word object to the non word repository
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $newNonWord
	 * @Flow\Validate(argumentName="newNonWord", type="UniqueEntity", options={ "identityProperties"={"title"} })
	 * @return void
	 */
	public function createAction(NonWord $newNonWord) {
		// set current timestamp a creation date
		$now = time();
		$newNonWord->setDateOfCreation($now);

		$this->nonWordRepository->add($newNonWord);
		$this->addFlashMessage('Created a new non word.');
		$this->redirect('index');
	}

	/**
	 * Show a form to edit an existing non word
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function editAction(NonWord $nonWord) {
		$this->view->assign('nonWord', $nonWord);
	}

	/**
	 * Update a non word
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @Flow\Validate(argumentName="nonWord", type="UniqueEntity", options={ "identityProperties"={"title"} })
	 * @return void
	 */
	public function updateAction(NonWord $nonWord) {
		$this->nonWordRepository->update($nonWord);
		$this->addFlashMessage('Updated the non word.');
		$this->redirect('index');
	}

	/**
	 * Remove the given non word object from the non word repository
	 *
	 * @param \Pixelbrackets\NonWord\Domain\Model\NonWord $nonWord
	 * @return void
	 */
	public function deleteAction(NonWord $nonWord) {
		$this->nonWordRepository->remove($nonWord);
		$this->addFlashMessage('Deleted a non word.');
		$this->redirect('index');
	}

}