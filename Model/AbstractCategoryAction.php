<?php

/*
 * This file is part of the Akeneo PIM Enterprise Edition.
 *
 * (c) 2015 Akeneo SAS (http://www.akeneo.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Model;

/**
 * Add action used in product rules.
 * An add action category is used to add a product in a category.
 *
 * @author Damien Carcel (https://github.com/damien-carcel)
 */
abstract class AbstractCategoryAction
{
    /** @var string */
    protected $categoryCode;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->categoryCode  = isset($data['categoryCode']) ? $data['categoryCode'] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }
}
