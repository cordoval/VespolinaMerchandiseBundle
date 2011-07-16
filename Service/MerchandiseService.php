<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Vespolina\MerchandiseBundle\Model\MerchandiseInterface;
use Vespolina\MerchandiseBundle\Service\MerchandiseServiceInterface;
use Vespolina\ProductBundle\Model\ProductInterface;

/**
 * MerchandiseService handles the relationship between a merchandise and linked products
 * an ecommerce scenario
 *
 * @author Daniel Kucharski <daniel@xerias.be>
 */
class MerchandiseService extends ContainerAware implements MerchandiseServiceInterface
{

    protected $productResolvers;

    function __construct()
    {

        $this->productResolvers = array();
    }

    /**
     * @inheritdoc
     */
    public function create()
    {

        $baseClass = 'Vespolina\MerchandiseBundle\Model\Merchandise';

        if ($baseClass)
        {

            $instance = new $baseClass();
        }

        //Define the default relationship between a merchandise and product(s)
        $instance->setProductResolverName('sku_pattern');

        return $instance;
        
    }


    /**
     * @inheritdoc
     */
    public function resolveProductsByMerchandise(MerchandiseInterface $merchandise, $merchandiseOptions)
    {

        //First we need to find out the expected SKU mapping behavior
        $productResolver = $this->determineProductResolver($merchandise);

        if(!$productResolver)
        {
            throw new \RuntimeException(sprintf('Product resolver could not be determined for merchandise "%s"', $merchandise->getName()));

        }

        return $productResolver->resolve($merchandise, $merchandiseOptions);


    }



    /**
     * @inheritdoc
     */
    public function setMerchandiseFromProduct(MerchandiseInterface $merchandise, ProductInterface $product)
    {
        
    }

    /**
     * Determine for the selected merchandise, which product resolver should be used
     */
    protected function determineProductResolver(MerchandiseInterface $merchandise)
    {

        $productResolverName = $merchandise->getProductResolverName();

        return $this->getProductResolver($productResolverName);
    }

    protected function getProductResolver($productResolverName)
    {

        if (!array_key_exists($productResolverName, $this->productResolvers))
        {

            //Determine handler class
            switch($productResolverName)
            {
                case 'one_to_one':

                    $className = 'Vespolina\MerchandiseBundle\ProductResolver\OneToOne';
                    break;

                case 'sku_pattern':

                    $className = 'Vespolina\MerchandiseBundle\ProductResolver\SKUPattern';
                    break;

                default:
                    throw new \RuntimeException(sprintf('Unknown product resolver "%s"', $productResolverName));
                    break;
            }

            $this->productResolvers[$productResolverName] = new $className;
            $this->productResolvers[$productResolverName]->setContainer($this->container);

        }

        return $this->productResolvers[$productResolverName];
    }

}