<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * (c) Daniel Kucharski <daniel@xerias.be>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Vespolina\MerchandiseBundle\Model\MerchandiseInterface;
use Vespolina\MerchandiseBundle\Service\MerchandiseServiceInterface;
use Vespolina\ProductBundle\Model\ProductInterface;

class MerchandiseService extends ContainerAware implements MerchandiseServiceInterface
{

    function __construct()
    {
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

        return $instance;
        
    }



    /**
     * @inheritdoc
     */
    function setMerchandiseFromProduct(MerchandiseInterface $merchandise, ProductInterface $product)
    {
        
    }


}