![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit] Dependency Management
# [fit] in WordPress with
# [fit] Composer

---

# Ryan Plas
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

![fit inline](https://s3.amazonaws.com/ryanplas/WCJAX2017/getcomposerdownload.png)

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

* Package Name: vendor/name (ryanplasma/cool-library)
* Description: What does your package do?
* Author: Who are you? (FirstName LastName <email@email.com>)
* Minimum Stability: defaults to stable
* License
* Define Dependencies

---

# SO EASY!!!

![](http://media.giphy.com/media/f31DK1KpGsyMU/giphy.gif)

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

![fit](https://getcomposer.org/img/logo-composer-transparent.png)
# [fit]What Are Some
# [fit]Issues You Can
# [fit]Run Into?

---




