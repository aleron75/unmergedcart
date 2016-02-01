# UnmergedCart

## Facts
Version: 1.1.0
Developed and tested on Magento CE v 1.9.2.0

## Introduction
This module adds an observer to the `sales_quote_merge_before` event to change the way the saved customer quote 
is merged with current session quote.

To configure the desired behaviour change the value in 
`System > Configuration > SALES > Checkout > Shopping Cart > Merge cart upon log in`; you can choose between:

* `Yes: default behavior` - the module doesn't change the Magento default behavior that is merging session and customer cart after log in
* `No: use session cart` - customer saved cart items are discarded, only items in session cart are maintained after log in
* `No: use customer cart` - session cart items are discarded, only items in customer cart are maintained after log in

## Installation
You can install this extension in several ways; they are described below.
Not that by `{{magento_basedir}}` I refer to the path where Magento is installed, where you usually find the 
`index.php` file. 

### Download
Download the full package, extract it and copy the `app` directory in `{{magento_basedir}}`.
 
*Attention:* don't overwrite the native Magento `app` folder but simply **merge** its contents into existing directory.

### Modman
Install modman Module Manager from: https://github.com/colinmollenhour/modman

After having installed modman on your system, you can clone this module on your
Magento base directory by typing the following command from `{{magento_basedir}}`:

    $ modman init
    $ modman clone git@github.com:aleron75/unmergedcart.git
    
### Composer
Install composer: http://getcomposer.org/download/

Install Magento Composer Installer: https://github.com/magento-hackathon/magento-composer-installer

Type the following command from `{{magento_basedir}}`:

    $ php composer.phar require aleron75/unmergedcart:v1.1.0

or

    $ composer require aleron75/unmergedcart:v1.1.0

## Post install
After installation:

* if you have Magento cache enabled, disable or refresh it;
* if you have Magento compilation enabled, disable it or recompile the code base.
    
## Uninstall
Remove the following:

* `{{magento_basedir}}/app/code/community/Aleron75/UnmergedCart` folder
* `{{magento_basedir}}/app/etc/modules/Aleron75_UnmergedCart.xml` file

## Closing words
Any feedback is appreciated. 

If you want to contribute, fork this repository, perform your changes and submit a pull request.

This extension is published under the [Open Software License (OSL 3.0)](http://opensource.org/licenses/OSL-3.0).
