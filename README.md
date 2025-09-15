# Windcave

Windcave PxPay 2.0 payment gateway for Craft Commerce 5

## Requirements

This plugin requires Craft CMS 5.8.0 or later, Craft Commerce 5.4.0 or later, and PHP 8.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Windcave”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require therefinerynz/commerce-windcave

# tell Craft to install the plugin
./craft plugin/install commerce-windcave
```

### Setup
To add a Windcave PxPay 2.0 gateway, go to Commerce → Settings → Gateways and click the “New Gateway” button.

Select “Windcave PxPay 2.0” from the Gateway Type dropdown.

> **Note:** The Windcave PxPay User ID, Key and Test Mode settings should be set as environment variables in your `.env` file for security. For example:
> ```
> PXPAY_USER_ID=Merchant_Dev
> PXPAY_KEY=1234567890abcdef1234567890abcdef
> PXPAY_TEST_MODE=true
> ```