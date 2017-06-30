Social Tags component for Nette Framework application
======

Requirements
------------

Package requires PHP 5.6 or higher

- [nette/application](https://github.com/nette/application)

Installation
------------

The best way to install XRuff/SocialTags is using  [Composer](http://getcomposer.org/):

```sh
$ composer require xruff/socialtags
```

Documentation
------------

Configuration in config.neon.


```yml
extensions:
    socialTags: XRuff\Components\SocialTags\DI\SocialTagsExtension

socialTags:
    twitter:
        card: summary_large_image
        creator: 'twitternick'
        title: Title
        description: Description ...
        image: http://...
    facebook:
        appId:
        admins:
        url: http://www.example.com
        siteName: Title
        title: Title
        type: website
        description: Description ...
        image: http://...
        locale: cs_cz
```

Base presenter:

```php
use XRuff\Components\SocialTags\SocialTagsControl;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var SocialTagsControl $socialTagsControlFactory @inject */
    public $socialTagsControlFactory;

    protected function createComponentSocialTags()
    {
        return $this->socialTagsControlFactory->create();
    }
}
```

@layout.latte:

```smarty
    {control socialTags:twitter}
    {control socialTags:facebook}
</head>
<body>
    ...
```

-----

Repository [https://github.com/XRuff/SocialTags](https://github.com/XRuff/SocialTags).