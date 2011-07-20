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

/**
 * OneToOne maps the most simple use case: A merchandise is mapped to one product (self-reference)
 *
 * @author Daniel Kucharski <daniel@xerias.be>
 */
class OneToOne extends ProductResolver
{
    public function resolve(MerchandiseInterface $merchandise, $merchandiseOptions)
    {

        return array($merchandise);
    }
}