<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * (c) Daniel Kucharski <daniel@xerias.be>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\Model\Node;

use Vespolina\MerchandiseBundle\Model\MerchandiseNode;
use Vespolina\PricingBundle\Model\PriceableInterface;


class Pricing extends MerchandiseNode
{

    protected $pricingSet;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pricingSet = null;

    }

    public function getPricingSet()
    {

        return $this->pricingSet;
    }
 
    public function setPricingSet(PricingSetInterface $pricingSet)
    {
        $this->pricingSet = $pricingSet;
    }




}