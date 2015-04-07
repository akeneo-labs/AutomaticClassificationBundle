# Akeneo Automatic classification bundle

A bundle that extend the Pim Enterprise CatalogRuleBundle, adding the possibility to classify products.

## Requirements

 - Akeneo PIM EE 1.3.x stable

## Installation

Install the bundle with composer:

    $ php composer.phar require akeneo/automatic-classification-bundle:1.0.*

Enable the bundle in the `app/AppKernel.php` file, in the `getPimEnterpriseBundles` function:

    `return[
        …
        new Pim\Bundle\MagentoConnectorBundle\PimMagentoConnectorBundle(),
    ];`

Then clean the cache:

    `php app/console cache:clear --env=prod`

## Rule definition

This bundle is an extension of the CatalogRuleBundle, so it uses the same conditions, and add a new set of actions:

* `add_category`: add a product to a category,
* `set_category`: add a product to a category and remove it from all other category. If you set the category code to `null`, it will declassify the product.

For both `add_category` and `set_category` actions, the category must exists, or the rule will not apply.

### Examples

    rules:
        camera_add_canon_brand_category:
            conditions:
                - field:    family.code
                  operator: IN
                  value:
                    - camcorders
                - field:    name
                  operator: CONTAINS
                  value:    Canon
            actions:
                - type:         add_category
                  categoryCode: category_canon
        player_set_philips_brand_category:
            conditions:
                - field:    family.code
                  operator: IN
                  value:
                    - camcorders
                    - mp3_players
                - field:    name
                  operator: CONTAINS
                  value:    Philips
            actions:
                - type:         set_category
                  categoryCode: category_philips
        mug_remove_oro_brand_category:
            conditions:
                - field:    family.code
                  operator: IN
                  value:
                    - mugs
                - field:    name
                  operator: CONTAINS
                  value:    Oro
            actions:
                - type:         set_category
                  categoryCode: null

Take a look to [icecat_demo_dev rule fixtures](https://github.com/akeneo/pim-enterprise-dev/blob/1.3/src/PimEnterprise/Bundle/InstallerBundle/Resources/fixtures/icecat_demo_dev/rules.yml) to see more examples of conditions.
