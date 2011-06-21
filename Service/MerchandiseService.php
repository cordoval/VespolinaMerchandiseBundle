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

        //TODO: move node configuration to config/resources
        $nodeConfigurations = array(
            array(
                'name' => 'general',
                'class' => 'Vespolina\MerchandiseBundle\Model\Node\GeneralDescription'),
            array(
                'name' => 'pricing',
                'class' => 'Vespolina\MerchandiseBundle\Model\Node\Pricing'),
            array(
                'name' => 'availability',
                'class' => 'Vespolina\MerchandiseBundle\Model\Node\Availability'));


        if ($baseClass)
        {

            $instance = new $baseClass();

            //Add nodes as described by the configuration
            foreach ($nodeConfigurations as $nodeConfiguration)
            {
                if ($nodeConfiguration['name'])
                {

                    $instance->addNode($nodeConfiguration['name'], new $nodeConfiguration['class']);
                }
            }
        }

        return $instance;
        
    }



    /**
     * @inheritdoc
     */
    function createMerchandiseFromProduct(ProductInterface $product)
    {
        $merchandise = $this->create();

        //Do the copying magic

        return $merchandise;
    }


}