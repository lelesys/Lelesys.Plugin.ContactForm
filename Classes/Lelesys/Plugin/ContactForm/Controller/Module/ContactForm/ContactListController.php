<?php
namespace Lelesys\Plugin\ContactForm\Controller\Module\ContactForm;

/*                                                                         *
 * This script belongs to the Lelesys Plugins "Lelesys.Plugin.ContactForm".*
 *                                                                         *
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
		$nodeTypes = $this->nodeRepository->findByNodeType('Lelesys.Plugin.ContactForm:ContactForm');

		$this->view->assign('nodeTypes', $nodeTypes);
	}

	/**
	 * Returns the form post values
	 *
	 * @param \TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $node
	 * @return void
	 */
	public function listFormPostsAction(\TYPO3\TYPO3CR\Domain\Model\PersistentNodeInterface $node) {
		$this->view->assignMultiple(array ('formIdentifier' => $node->getProperty('formIdentifier'), 'nodeTypes' => $node->getChildNodes('Lelesys.Plugin.ContactForm:FormPost')));
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