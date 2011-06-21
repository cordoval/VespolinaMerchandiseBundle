<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * (c) Daniel Kucharski <daniel@xerias.be>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\Service;

use Vespolina\MerchandiseBundle\Model\MerchandiseInterface;
use Vespolina\ProductBundle\Model\ProductInterface;


interface MerchandiseServiceInterface
{
    /**
     * Create a merchandise instance
     *
     * @abstract
     * @return \Vespolina\MerchandiseBundle\Model\MerchandiseInterface
     */
    function create();

    /**
     * Create a new merchandise instance based on a reference product
     *
     * @abstract
     * @param \Vespolina\ProductBundle\Model\ProductInterface $product
     * @return \Vespolina\MerchandiseBundle\Model\MerchandiseInterface
     */
    function createMerchandiseFromProduct(ProductInterface $product);


}