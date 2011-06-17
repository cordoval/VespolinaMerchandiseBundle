<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * (c) Daniel Kucharski <daniel@xerias.be>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\MerchandiseBundle\Model;

use Vespolina\MerchandiseBundle\Model\MerchandiseInterface;

class Merchandise implements MerchandiseInterface
{

    protected $productReferences;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productReferences = array();

    }

   
}