<?php

namespace Lelesys\Plugin\ContactForm\Finishers;

/*                                                                         *
 * This script belongs to the Lelesys Plugins "Lelesys.Plugin.ContactForm".*
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;

/**
 * A simple finisher that outputs a given text
 */
class PostValuesFinisher extends \TYPO3\Form\Core\Model\AbstractFinisher {

	/**
	 * @Flow\Inject
	 * @var \Lelesys\Plugin\ContactForm\FormRegistry
	 */
	protected $formRegistry;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Service\NodeTypeManager
	 */
	protected $nodeTypeManager;

	/**
	 * Executes this finisher
	 * @see AbstractFinisher::execute()
	 *
	 * @return void
	 * @throws \TYPO3\Form\Exception\FinisherException
	 */
	protected function executeInternal() {
		$formValues = $this->finisherContext->getFormValues();
		$formNode = $this->formRegistry->getFormNode($this->finisherContext->getFormRuntime()->getIdentifier());
		$slug = uniqid('post');
		$postNode = $formNode->createNode($slug, $this->nodeTypeManager->getNodeType('Lelesys.Plugin.ContactForm:FormPost'));

		foreach ($formValues as $propertyName => $value) {
			$postNode->setProperty($propertyName, $value);
		}
	}

}

?>