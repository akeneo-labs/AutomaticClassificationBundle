<?php

namespace spec\PimEnterprise\Bundle\AutomaticClassificationBundle\Denormalizer\ProductRule;

use PhpSpec\ObjectBehavior;
use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryActionInterface;
use Prophecy\Argument;

class SetCategoryActionDenormalizerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryAction');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PimEnterprise\Bundle\AutomaticClassificationBundle\Denormalizer\ProductRule\SetCategoryActionDenormalizer');
    }

    function it_implements()
    {
        $this->shouldHaveType('Symfony\Component\Serializer\Normalizer\DenormalizerInterface');
    }

    function it_denormalizes()
    {
        $data['type'] = ProductSetCategoryActionInterface::ACTION_TYPE;

        $this->denormalize($data, 'PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryAction')
            ->shouldHaveType('PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryAction');
    }

    function it_supports_denormalization()
    {
        $data['type'] = ProductSetCategoryActionInterface::ACTION_TYPE;
        $type = 'PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductSetCategoryAction';

        $this->supportsDenormalization($data, $type)->shouldReturn(true);
    }

    function it_does_not_support_denormalization_for_wrong_object()
    {
        $data['type'] = ProductSetCategoryActionInterface::ACTION_TYPE;
        $type = '\PimEnterprise\Bundle\CatalogRuleBundle\Model\ProductCondition';

        $this->supportsDenormalization($data, $type)->shouldReturn(false);
    }
}
