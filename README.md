Lelesys ContactForm Plugin
======================

This plugin adds ContactForm to your websites.

Quick start
-----------

* Include the plugin's TypoScript definitions to your own one's (located in, for example, `Packages/Sites/Your.Site/Resources/Private/TypoScripts/Library/ContentElements.ts2`, with:

```
include: resource://Lelesys.Plugin.ContactForm/Private/TypoScripts/Library/NodeTypes.ts2
```

* Add the plugin content element "Lelesys Contact Form" to the position of your choice.
* Give form identifier i.e "contactForm" in inspector to render the default form.
* Form fields can be edited from (located in 'resource://Lelesys.Plugin.ContactForm/Private/Form/contactForm.yaml');