<?php
namespace Pixelbrackets\NonWord\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Pixelbrackets.NonWord". *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class NonWordRepository extends Repository {

	/**
	 * Get a random non word object
	 *
	 * @return \Pixelbrackets\NonWord\Domain\Model\NonWord Random non word
	 **/
	public function findRandom() {
		$rowCount = $this->createQuery()->execute()->count();
		$randomRowNumber = mt_rand(0, max(0, ($rowCount - 1)));
		return $this->createQuery()->setOffset($randomRowNumber)->setLimit(1)->execute()->getFirst();
	}

}