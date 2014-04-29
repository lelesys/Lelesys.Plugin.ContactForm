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
use TYPO3\TYPO3CR\Domain\Factory\NodeFactory;
use TYPO3\TYPO3CR\Domain\Service\ContextFactory;

class ContactListController extends \TYPO3\Neos\Controller\Module\AbstractModuleController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository
	 */
	protected $nodeDataRepository;

	/**
	 * @Flow\Inject
	 * @var ContextFactory
	 */
	protected $contextFactory;

	/**
	 * @Flow\Inject
	 * @var NodeFactory
	 */
	protected $nodeFactory;

	/**
	 * Returns the contact form list
	 *
	 * @return void
	 */
	public function indexAction() {
		$forms = $this->nodeDataRepository->findByNodeType('Lelesys.Plugin.ContactForm:ContactForm');
		$formNodes = array();
		$context = $this->contextFactory->create(
			array('workspaceName' => 'live')
		);
		foreach($forms as $form) {
			$node = $this->nodeFactory->createFromNodeData($form, $context);
			$formNodes[] = $node;
		}
		$this->view->assign('forms', $formNodes);
	}

	/**
	 * Returns the form post values
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $formNode
	 * @return void
	 */
	public function listFormPostsAction(\TYPO3\TYPO3CR\Domain\Model\NodeInterface $formNode) {
		$this->view->assignMultiple(array ('formIdentifier' => $formNode->getProperty('formIdentifier'), 'formPosts' => $formNode->getChildNodes('Lelesys.Plugin.ContactForm:FormPost')));
	}

	/**
	 * Shows the form post detail view
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\NodeInterface $formPost
	 * @param string $formIdentifier The form identifier
	 */
	public function showAction(\TYPO3\TYPO3CR\Domain\Model\NodeInterface $formPost, $formIdentifier) {
		$this->view->assignMultiple(array('formPost' => $formPost, 'formIdentifier' => $formIdentifier));
	}
}
?>
