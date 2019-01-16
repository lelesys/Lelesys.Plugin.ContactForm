<?php

namespace Lelesys\Plugin\ContactForm\TypoScript;

/*                                                                         *
 * This script belongs to the package "Lelesys.Plugin.ContactForm".        *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use Neos\Flow\Annotations as Flow;

/**
 * ContactForm TypoScript object implementation
 * @Flow\Scope("prototype")
 */
class ContactFormImplementation extends \Neos\Fusion\FusionObjects\TemplateImplementation {

	/**
	 * @Flow\Inject
	 * @var \Lelesys\Plugin\ContactForm\FormRegistry
	 */
	protected $formRegistry;

	/**
	 * Form identifier
	 * @var string
	 */
	protected $formIdentifier;

	/**
	 * Sets the form identifier
	 * @param string $formIdentifier
	 */
	public function setFormIdentifier($formIdentifier) {
		$this->formIdentifier = $formIdentifier;
	}

	/**
	 * Returns the form identifier
	 * @return string
	 */
	public function getFormIdentifier() {
		return $this->tsValue('formIdentifier');
	}

	/**
	 *
	 * @return type
	 */
	public function evaluate() {
		$context = $this->getTsRuntime()->getCurrentContext();
		$this->formRegistry->setFormNode($this->getFormIdentifier(), $context['node']);
		return parent::evaluate();
	}

}

?>