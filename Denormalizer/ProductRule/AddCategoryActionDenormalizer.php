<?php

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Denormalizer\ProductRule;

use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryActionInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Denormalize product set category rule actions.
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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
        return $type === $this->addCategoryActionClass && isset($data['type'])
        && ProductAddCategoryActionInterface::ACTION_TYPE === $data['type'];
    }
}
