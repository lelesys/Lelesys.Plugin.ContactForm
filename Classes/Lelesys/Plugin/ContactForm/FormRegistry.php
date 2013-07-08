<?php

namespace Lelesys\Plugin\ContactForm;

/*                                                                         *
 * This script belongs to the package "Lelesys.Plugin.ContactForm".        *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;

/**
 * Singleton form registry to share objects
 * @Flow\Scope("singleton")
 */
class FormRegistry {

	/**
	 * Registry of form and its content node
	 * @var array
	 */
	protected $formNodes = array();

	/**
	 * Returns the node associated with the form
	 *
	 * @param string $formIdentifier
	 * @return \TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 */
	public function getFormNode($formIdentifier) {
		return $this->formNodes[$formIdentifier];
	}

	/**
	 * Sets the associated node of the form
	 *
	 * @param string $formIdentifier
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $node
	 */
	public function setFormNode($formIdentifier, \TYPO3\TYPO3CR\Domain\Model\NodeInterface $node) {
		$this->formNodes[$formIdentifier] = $node;
	}

}

?>