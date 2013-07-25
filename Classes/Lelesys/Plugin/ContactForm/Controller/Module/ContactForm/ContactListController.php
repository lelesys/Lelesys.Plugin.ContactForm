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

class ContactListController extends \TYPO3\Neos\Controller\Module\AbstractModuleController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository
	 */
	protected $nodeDataRepository;


	/**
	 * Returns the contact form list
	 *
	 * @return void
	 */
	public function indexAction() {
		$forms = $this->nodeDataRepository->findByNodeType('Lelesys.Plugin.ContactForm:ContactForm');

		$this->view->assign('forms', $forms);
	}

	/**
	 * Returns the form post values
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeData $formNode
	 * @return void
	 */
	public function listFormPostsAction(\TYPO3\TYPO3CR\Domain\Model\NodeData $formNode) {
		$this->view->assignMultiple(array ('formIdentifier' => $formNode->getProperty('formIdentifier'), 'formPosts' => $formNode->getChildNodes('Lelesys.Plugin.ContactForm:FormPost')));
	}

	/**
	 * Shows the form post detail view
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeData $formPost
	 * @param string $formIdentifier The form identifier
	 */
	public function showAction(\TYPO3\TYPO3CR\Domain\Model\NodeData $formPost, $formIdentifier) {
		$this->view->assignMultiple(array('formPost' => $formPost, 'formIdentifier' => $formIdentifier));
	}
}
?>
