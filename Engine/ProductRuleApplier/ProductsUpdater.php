<?php

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\Engine\ProductRuleApplier;

use Akeneo\Bundle\RuleEngineBundle\Model\RuleInterface;
use Doctrine\Common\Util\ClassUtils;
use Pim\Bundle\CatalogBundle\Repository\CategoryRepositoryInterface;
use Pim\Bundle\CatalogBundle\Updater\ProductTemplateUpdaterInterface;
use Pim\Bundle\CatalogBundle\Updater\ProductUpdaterInterface;
use PimEnterprise\Bundle\AutomaticClassificationBundle\Model\ProductAddCategoryActionInterface;
use PimEnterprise\Bundle\CatalogRuleBundle\Engine\ProductRuleApplier\ProductsUpdater as BaseProductsUpdater;
use PimEnterprise\Bundle\CatalogRuleBundle\Model\ProductCopyValueActionInterface;
use PimEnterprise\Bundle\CatalogRuleBundle\Model\ProductSetValueActionInterface;

/**
 * Saves products when apply a rule.
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ProductsUpdater extends BaseProductsUpdater
{
    /** @var  */
    protected $categoryRepository;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        ProductUpdaterInterface $productUpdater,
        ProductTemplateUpdaterInterface $templateUpdater,
        CategoryRepositoryInterface $categoryRepository
    ) {
        parent::__construct($productUpdater, $templateUpdater);

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function updateFromRule(array $products, RuleInterface $rule)
    {
        $actions = $rule->getActions();
        foreach ($actions as $action) {
            if ($action instanceof ProductSetValueActionInterface) {
                $this->applySetAction($products, $action);
            } elseif ($action instanceof ProductCopyValueActionInterface) {
                $this->applyCopyAction($products, $action);
            } elseif ($action instanceof ProductAddCategoryActionInterface) {
                $this->applyAddCategoryAction($products, $action);
            } else {
                throw new \LogicException(
                    sprintf('The action "%s" is not supported yet.', ClassUtils::getClass($action))
                );
            }
        }
    }

    /**
     * Applies a add category action on a subject set, if this category exists.
     *
     * @param \Pim\Bundle\CatalogBundle\Model\ProductInterface[] $products
     * @param ProductAddCategoryActionInterface                  $action
     *
     * @return ProductsUpdater
     */
    protected function applyAddCategoryAction(array $products, ProductAddCategoryActionInterface $action)
    {
        foreach ($products as $product) {
            $category = $this->categoryRepository->findOneByIdentifier($action->getCategoryCode());
            if ($category) {
                $product->addCategory($category);
            }
        }

        return $this;
    }
}
