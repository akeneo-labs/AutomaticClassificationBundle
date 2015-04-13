<?php

/*
 * To be defined.
 */

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Model;

/**
 * Add action used in product rules.
 * An add action category is used to add a product in a category.
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
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
