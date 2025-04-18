# DrupalGen - Generate content using OpenAI's ChatGPT in Drupal

## Requirements

* Drupal 9 or 10
* [Composer](https://getcomposer.org)
* An [OpenAI API key](https://platform.openai.com/docs/api-reference/authentication)

## Set up

Clone this repo into your Drupal installation and run `composer install`. Example:

```bash
cd /PATH_TO_YOUR_SITE/modules/contrib/
git clone git@github.com:ruscoe/drupalgen.git`
cd drupalgen
composer install
```

## Installing and configuring the module

Enable the module in Drupal under Extend, or by visiting YOUR_SITE/admin/modules

Configure the module under Configuration, Web Services or by visiting YOUR_SITE/admin/config/drupalgen

## Using the module

Create or edit any content. You will see a new text field labled "ChatGPT Prompt" and a button labeled "Generate". Enter a prompt for your content and hit the Generate button. ChatGPT's response will be printed on the page.
