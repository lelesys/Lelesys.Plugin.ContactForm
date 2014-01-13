Lelesys ContactForm Plugin
======================

This plugin adds ContactForm to your websites.

Important note: Initial package development was done when TYPO3 Neos was at alpha3/4. We are working hard continuously to get this to work perfectly and to beautify source code using best practices/concepts of Flow/Neos. Stay tuned!


Quick start
-----------

* include the plugin's Stylesheet to your own one's where you add other stylesheets of the site.

```
<link href="{f:uri.resource(path: 'resource://Lelesys.Plugin.ContactForm/Public/Stylesheets/ContactForm.css')}" rel="stylesheet" media="screen">
```

* add the plugin content element "Lelesys Contact Form" to the position of your choice.

* if form is not rendered give form identifier i.e "contactForm" in inspector to render the default form.

* to create your own form create a yaml file with form configurations, refer to TYPO3.Form package to create custom fields

* change the form path in setting.yaml to your form path


```
    TYPO3:
      Form:
        yamlPersistenceManager:
          savePath: 'resource://Lelesys.Plugin.ContactForm/Private/Form/'
```


* administrator can see the list of forms and its posted data details in contact form backend module
