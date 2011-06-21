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


class GeneralDescription extends MerchandiseNode
{

    protected $name;
    protected $shortDescription;
    protected $detailDescription;
   
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    public function getDetailDescription()
    {

        return $this->detailDescription;
    }

    public function getName()
    {

        return $this->name;
    }

    public function getShortDescription()
    {

        return $this->shortDescription;
    }

    public function setName($name)
    {

        $this->name = $name;
    }




}