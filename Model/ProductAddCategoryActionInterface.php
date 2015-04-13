<?php

/*
 * To be defined.
 */

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Model;

use Akeneo\Bundle\RuleEngineBundle\Model\ActionInterface;

/**
 * Add action used in product rules.
 * An add action category is used to ad a product in a category.
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 */
interface ProductAddCategoryActionInterface extends ActionInterface
{
    const ACTION_TYPE = 'add_category';

    /**
     * @return string
     */
    public function getCategoryCode();

    /**
     * @param string $categoryCode
     *
     * @return ProductAddCategoryActionInterface
     */
    public function setCategoryCode($categoryCode);
}
