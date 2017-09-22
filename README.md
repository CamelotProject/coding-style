Camelot coding style standard
=============================

PHP
---

[Camelot](https://github.com/CamelotProject) tries to adhere a coding style based on PSR-2
and the Symfony2 coding standard.

### [CodeSniffer][phpcs]

To use run:
```
composer require camleot/codingstyle --dev
```
Add a `global` before `require` if you want to install it globally.

If installing globally you also need to configure the `installed_paths`:
```
phpcs --config-set installed_paths "$(composer config --global data-dir)"
```

Then create a CodeSniffer config file named `phpcs.xml.dist` in your project root:
```xml
<?xml version="1.0"?>
<ruleset>
    <!-- Add color to output...umm duh -->
    <arg name="colors"/>

    <!-- Files or folders to sniff -->
    <file>src</file>
    <file>tests</file>

    <!-- Path to our coding standard folder -->
    <rule ref="vendor/camelot/codingstyle/Camelot"/>
</ruleset>
```
Additional changes can be made here. See [CodeSniffer's annotated ruleset][phpcs_ruleset] for more information.

`phpcs.xml.dist` should be committed for all developers to use.  
An `phpcs.xml` file can also be create which takes precedence over `phpcs.xml.dist` for local
changes. This file should be ignored from git.


### [Code Fixer][code_fixer]

To use run:
```bash
composer require camelot/codingstyle --dev
```
Add a `global` before `require` if you want to install it globally.

Then create a config file named `.php_cs.dist` in your project root:
```php
<?php

return Camelot\CsFixer\Config::create()
    // addRules() accepts arrays and traversable objects.
    ->addRules(
        // Create Camelot's standard rules.
        Camelot\CsFixer\Rules::create()
            // Enable risky rules.
            ->risky()
            // Enable PHP 5.6, 7.0, and 7.1 rules. Methods exist for each version.
            //->php71()
    )

    // Modify existing rules or add new ones.
    ->addRules([
        'heredoc_to_nowdoc' => false,
        'mb_str_functions'  => true,
    ])

    // Add directories to scan.
    ->in('src', 'tests')
;
```
See their [website][code_fixer] for a list of rules and additional configuration options.

`.php_cs.dist` should be committed for all developers to use.  
An `.php_cs` file can also be create which takes precedence over `.php_cs.dist` for local
changes. This file should be ignored from git. 

JavaScript
----------

There's no explicitly written style yet, but when creating the files needed for
Camelot using the grunt toolchain there's a target linting the javascript code.

[phpcs]: http://pear.php.net/package/PHP_CodeSniffer
[phpcs_ruleset]: https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-ruleset.xml
[code_fixer]: http://cs.sensiolabs.org
