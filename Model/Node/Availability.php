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


class Availability extends MerchandiseNode
{

    protected $available;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->available = false;

    }

    public function isAvailable()
    {

        return $this->available;
    }

    
    public function setAvailability($availability)
    {
        $this->available = $availability;
    }




}