<?php

namespace spec\PimEnterprise\Bundle\AutomaticClassificationBundle\Model;

use PhpSpec\ObjectBehavior;
use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryAction;
use Prophecy\Argument;

class ProductAddCategoryActionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            [
                'type' => ProductAddCategoryAction::ACTION_TYPE,
                'categoryCode' => 'categoryCode',
            ]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryAction');
    }

    function it_is_an_action()
    {
        $this->shouldHaveType('Akeneo\Bundle\RuleEngineBundle\Model\ActionInterface');
    }

    function it_is_a_product_copy_value_action()
    {
        $this->shouldHaveType('PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryActionInterface');
    }

    function it_constructs_a_product_action()
    {
        $this->getCategoryCode()->shouldReturn('categoryCode');
    }
}
