<?php

namespace PimEnterprise\Bundle\AutomaticClassificationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Automatic classification bundle
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class PimEnterpriseAutomaticClassificationBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'PimEnterpriseCatalogRuleBundle';
    }
}
