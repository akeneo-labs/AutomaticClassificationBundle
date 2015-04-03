<?php

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Denormalizer\ProductRule;

use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryActionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Denormalize product set category rule actions.
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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
