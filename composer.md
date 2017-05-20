![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]Dependency 
# [fit]Management
# [fit]in WordPress
# [fit]with Composer

---

# [fit]Ryan Plas
## __Back-end Developer @ CrowdFavorite__
## @WordPlas

---

# Overview

1. What is Composer?
2. Why should you use Composer?
3. How can you get started with Composer?
4. How can you use Composer with WordPress?
5. What are some Issues you can run into

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# What is Composer?

---

# What is Composer?

> Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.
-- Composer Documentation

---

# What is Composer?

Other Package/Dependency Managers

* NPM (JavaScript)
* RubyGems (Ruby)
* pip (Python)

---

# Composer Basics

**init**

Initialize a composer.json file with prompts.

---

# Composer Basics

**update**

Get the latest versions of dependencies and update the composer.lock file.

---

# Composer Basics

**install**

Reads the composer.json file from the current directory, resolves the dependencies, and installs them into vendor.

---

# Composer Basics

**require**

Adds new packages to the composer.json file from the current directory and installs them.

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]Why Should 
# [fit]You Use Composer?

---

# Why Should You Use Composer?

Composer is useful for:

1. Managing __third-party__ plugins/dependencies
2. __Autoloading__ classes
2. Creating/running custom __install/build/[x]___ scripts

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]How Can You Get
# [fit]Started With 
# [fit]Composer?

---

# How can you get started with Composer?

### [https://getcomposer.org/download/](https://getcomposer.org/download/) (Local):

![fit inline](https://s3.amazonaws.com/ryanplas/WCJAX2017/getcomposerdownload2.png)

---

# How can you get started with Composer?

Homebrew (Global):

```
brew update
brew tap homebrew/dupes
brew tap homebrew/php
brew install composer
```

---

# How can you get started with Composer?

Use Local:

`php composer.phar init`

Use Global:

`composer init`

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] DEMO 

---

# How can you get started with Composer?

* Package Name: vendor/name (wordplas/cool-library)
* Description: What does your package do?
* Author: Who are you? (FirstName LastName \<email@email.com>)
* Minimum Stability: defaults to stable
* Define Dependencies

---

# [fit]SO EASY!!!

![](https://media.giphy.com/media/xT77XWum9yH7zNkFW0/giphy.gif)

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]How Can You Use 
# [fit]Composer 
# [fit]With WordPress?

---

# How can you use Composer with WordPress?

1. Plugin/Theme Development
2. Manage your WordPress Install

---

# Plugin/Theme Development

1. Class Autoloading
2. Manage PHP dependencies 

---

# Class Autoloading

1. PSR-4
2. PSR-0
3. classmap
4. file

---

# Class Autoloading

## PSR4

```json
{
    "autoload": {
        "psr-4": {
            "CoolCalendar\\": "src/"
        }
    }
}
```

---

# Class Autoloading

## PSR4

```
├───composer.json
├───cool-calendar.php
└───src
    └───Taxonomy
        └───EventTaxonomy.php

```

---

# Class Autoloading

## PSR4

_`src/Taxonomy/EventTaxonomy.php`_

```php
<?php

namespace CoolCalendar\Taxonomy;

class EventTaxonomy{
	public function do_something() {

	}
}
```

---

# Class Autoloading

## PSR4

_`cool-calendar.php`_

```php
<?php
// Stuff about my plugin

use CoolCalendar\Taxonomy\EventTaxonomy;

require __DIR__ . '/vendor/autoload.php';

$taxonomy = new EventTaxonomy();
$taxonomy->do_something();
```

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] DEMO 

---

# Class Autoloading

## Pros

* Only one require
* Organized code

---

# Class Autoloading

## Cons

* PSR-4 directly contradicts WordPress Coding Standards

---

# Manage PHP Dependencies

`php composer.phar require guzzlehttp/guzzle:~6.0`

```json
{
   "require": {
      "guzzlehttp/guzzle": "~6.0"
   }
}
```

---

# Manage PHP Dependencies

```php
<?php

use GuzzleHttp\Client;

$client = new GuzzleHttp\Client(['base_uri' => 'https://foo.com/api/']);
$response = $client->request('GET', 'test');
```

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] DEMO 

---

# Manage PHP Dependencies

* Cleaner repo
* Easier to manage updates
* Easier to keep everyone on the same version


---

# Manage your WordPress Install

## WordPress in a Sub-directory

```json
{
    "require": {
        "johnpbloch/wordpress": "^4.7",
        "composer/installers": "~1.2.0"
    },
    "extra": {
        "wordpress-install-dir": "wp"
    }
}
```

---

# Manage your WordPress Install

## Manage Plugins as Dependencies

[WordPress Packagist](https://wpackagist.org/)

```json
{
	"repositories":[
        {
            "type":"composer",
            "url":"https://wpackagist.org"
        }
    ]
}
```

---

# Manage your WordPress Install

## Manage Plugins as Dependencies

```
composer require wpackagist-plugin/contact-form-7
```

---

# Manage your WordPress Install

## Manage Plugins as Dependencies

**Custom install directories**

```json
{
    extra": {
        "installer-paths": {
            "wp-content/plugins/{$name}/": ["type:wordpress-plugin"],
            "wp-content/mu-plugins/{$name}/": ["type:wordpress-muplugin"],
            "wp-content/themes/{$name}/": ["type:wordpress-theme"]
        }
    }
}
```

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] DEMO 

---


# Manage your WordPress Install

Next Steps:

* Set up wp-config and server config to recognize new folder structure
* See: [Bedrock](https://github.com/roots/bedrock) by Roots for an example of a full setup.

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]What Are Some
# [fit]Issues You Can
# [fit]Run Into?

---

# Issues

**Version conflicts**

* Plugin 1 requires FooSDK v1
* Plugin 2 requires FooSDK v2
* Plugin 1 is loaded first with FooSDK v1
* Plugin 2 runs into problems

---

![](https://media.giphy.com/media/vItkAzRz4wTv2/giphy.gif?response_id=59205e840410ce655c7b15c8)

# [fit]OH NO!!!
# [fit]WHAT CAN WE DO???

---

# Options

* Manually rename packages
* Automatically rename packages

---

# Manually Rename Packages

* Copy the class files into a folder
* Add the folder to the autoloader section of composer.json

![inline](https://s3.amazonaws.com/ryanplas/WCJAX2017/pimple.png)

---

# Automatically Rename Packages

[https://github.com/coenjacobs/mozart](https://github.com/coenjacobs/mozart)

---

```json
{
    "require-dev": {
        "coenjacobs/mozart": "^0.2.0"
    },
    "extra": {
        "mozart": {
            "dep_namespace": "WordPlas\\MozartTest\\Dependencies\\",
            "dep_directory": "/src/Dependencies/",
            "classmap_directory": "/classes/dependencies/",
            "classmap_prefix": "WPMZ_",
            "packages": [
                "pimple/pimple"
            ]
        }
    },
    "scripts": {
        "post-install-cmd": [
            "\"vendor/bin/mozart\" compose"
        ],
        "post-update-cmd": [
            "\"vendor/bin/mozart\" compose"
        ]
    },
    "autoload": {
        "psr-4": {
            "WordPlas\\MozartTest\\Dependencies\\": "src/Dependencies"
        }
    }
}
```

---

# Automatically Rename Packages

```php
<?php

use WordPlas\MozartTest\Dependencies\Pimple\Container;

require __DIR__ . '/vendor/autoload.php';

$container = new Container();

var_dump($container);
```

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] DEMO 

---

# Issues

**Version conflicts**

[https://deliciousbrains.com/dependency-management-wordpress-proposal/](https://deliciousbrains.com/dependency-management-wordpress-proposal/)

---

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]Questions?




