<?php

/*
 * This file is part of the Akeneo PIM Enterprise Edition.
 *
 * (c) 2015 Akeneo SAS (http://www.akeneo.com)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Denormalizer\ProductRule;

use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryActionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Denormalize product set category rule actions.
 *
 * @author Damien Carcel (https://github.com/damien-carcel)
 */
class AddCategoryActionDenormalizer implements DenormalizerInterface
{
    /** @var string */
    protected $addCategoryActionClass;

    /**
     * @param string $addCategoryActionClass
     */
    public function __construct($addCategoryActionClass)
    {
        $this->addCategoryActionClass = $addCategoryActionClass;
    }
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return new $this->addCategoryActionClass($data);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === $this->addCategoryActionClass &&
            isset($data['type']) &&
            ProductAddCategoryActionInterface::ACTION_TYPE === $data['type'];
    }
}
