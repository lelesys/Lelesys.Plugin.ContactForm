<?php

namespace Lelesys\Plugin\ContactForm\Controller\Module\ContactForm;

/*                                                                         *
 * This script belongs to the package "Lelesys.Plugin.ContactForm".        *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Neos\Domain\Service\ContentContext;
use \TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface;

class ContactListController extends \TYPO3\Neos\Controller\Module\StandardController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Repository\NodeRepository
	 */
	protected $nodeRepository;

	/**
	 * Returns the contact form list
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->setContext();
		$forms = $this->nodeRepository->findByNodeType('Lelesys.Plugin.ContactForm:ContactForm');
		$this->view->assign('forms', $forms);
	}

	/**
	 * Returns the form post values
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $formNode
	 * @return void
	 */
	public function listFormPostsAction(\TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $formNode) {
		$this->view->assignMultiple(array('formIdentifier' => $formNode->getProperty('formIdentifier'), 'formPosts' => $formNode->getChildNodes('Lelesys.Plugin.ContactForm:FormPost')));
	}

	/**
	 * Shows the form post detail view
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $formPost
	 * @param string $formIdentifier The form identifier
	 */
	public function showAction(\TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $formPost, $formIdentifier) {
		$this->view->assignMultiple(array('formPost' => $formPost, 'formIdentifier' => $formIdentifier));
	}

	/**
	 * Sets the context for nodes
	 *
	 * @return void
	 */
	public function setContext() {
		$currentContext = $this->nodeRepository->getContext();
		if ($currentContext === NULL) {
			$currentContext = new ContentContext('live');
			$this->nodeRepository->setContext($currentContext);
		}
	}

}

?>
