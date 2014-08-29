<?php
namespace Pixelbrackets\NonWord\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Pixelbrackets.NonWord". *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class NonWord {

	/**
	 * Who said it? Author of the non word.
	 *
	 * @var string
	 */
	protected $author;

	/**
	 * When was this non word publicly proclaimed? Date of creation.
	 *
	 * @var integer
	 */
	protected $dateOfCreation;

	/**
	 * URL please! URL to the source.
	 *
	 * @var string
	 */
	protected $link;

	/**
	 * The non word. Ugly, ugly, ugly.
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Set the author of the non word
	 *
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Get the author of the non word
	 *
	 * @param string $author
	 * @return void
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * Get the creation date of the non word
	 *
	 * @return integer
	 */
	public function getDateOfCreation() {
		return $this->dateOfCreation;
	}


	/**
	 * Set the creation date of the non word
	 *
	 * @param integer $dateOfCreation
	 * @return void
	 */
	public function setDateOfCreation($dateOfCreation) {
		$this->dateOfCreation = $dateOfCreation;
	}

	/**
	 * Get the URL to the source of the non word
	 *
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}


	/**
	 * Set the URL to the source of the non word
	 *
	 * @param string $link
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * Get the non word
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set the non word
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

}