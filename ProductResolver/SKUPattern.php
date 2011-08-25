<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\ProductResolver;

use Vespolina\MerchandiseBundle\Model\MerchandiseInterface;
use Vespolina\MerchandiseBundle\ProductResolver\ProductResolver;
use Vespolina\ProductBundle\Model\Product;
/**
 * SKUPattern Find a product based on a constructed SKU (name + options)
 *
 * @author Daniel Kucharski <daniel@xerias.be>
 */
class SKUPattern extends ProductResolver
{
    public function resolve(MerchandiseInterface $merchandise, $merchandiseOptions)
    {

        $sku = $this->generateSKUPattern($merchandise, $merchandiseOptions);

        //Todo: delegate the lookup to the product service
        $product = new Product(null);

        return array($product);
    }

    public function generateSKUPattern(MerchandiseInterface $merchandise, $merchandiseOptions)
    {

        $sku = $merchandise->getId();
        $separator = '.';

        //TODO: improve
        foreach($merchandiseOptions as $type => $value)
        {

            $sku .= $separator . $value;
        }

        return $sku;

    }
}