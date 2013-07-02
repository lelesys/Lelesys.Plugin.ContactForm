Lelesys ContactForm Plugin
======================

This plugin adds ContactForm to your websites.

Quick start
-----------

* include the plugin's TypoScript definitions to your own one's (located in, for example, `Packages/Sites/Your.Site/Resources/Private/TypoScripts/Library/ContentElements.ts2`, with:

```
include: resource://Lelesys.Plugin.ContactForm/Private/TypoScripts/Library/NodeTypes.ts2
```
* include the plugin's Stylesheet to your own one's where you add other stylesheets of the site.

```
<link href="{f:uri.resource(path: 'resource://Lelesys.Plugin.ContactForm/Public/Stylesheets/ContactForm.css')}" rel="stylesheet" media="screen">
```

* add the plugin content element "Lelesys Contact Form" to the position of your choice.
* give form identifier i.e "contactForm" in inspector to render the default form.