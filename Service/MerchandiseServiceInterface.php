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
     * Get the actual products linked to the chosen merchandise and chosen options
     *
     * @abstract
     * @param \Vespolina\MerchandiseBundle\Model\MerchandiseInterface $merchandise
     * @param $merchandiseOptions
     * @return array of ProductInstance
     */
    function resolveProductsByMerchandise(MerchandiseInterface $merchandise, $merchandiseOptions);

    /**
     * Copy product data into a merchandise instance
     *
     * @abstract
     * @param \Vespolina\DocumentBundle\Model\Document $document The document for which we want to create an item
     * @param \Vespolina\DocumentBundle\Model\DocumentConfigurationInterface $documentConfiguration
     *
     * @return void
     */
    function setMerchandiseFromProduct(MerchandiseInterface $merchandise, ProductInterface $product);


}