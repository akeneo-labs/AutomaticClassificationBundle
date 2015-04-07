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

use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryActionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Denormalize product set category rule actions.
 *
 * @author Damien Carcel (https://github.com/damien-carcel)
 */
class SetCategoryActionDenormalizer implements DenormalizerInterface
{
    /** @var string */
    protected $setCategoryActionClass;

    /**
     * @param string $setCategoryActionClass
     */
    public function __construct($setCategoryActionClass)
    {
        $this->setCategoryActionClass = $setCategoryActionClass;
    }
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return new $this->setCategoryActionClass($data);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === $this->setCategoryActionClass &&
            isset($data['type']) &&
            ProductSetCategoryActionInterface::ACTION_TYPE === $data['type'];
    }
}
