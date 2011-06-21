<?php

namespace Vespolina\MerchandiseBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MerchandiseCreateTest extends WebTestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = $this->createClient();
    }

    public function getKernel(array $options = array())
    {
        if (!$this->kernel) {
            $this->kernel = $this->createKernel($options);
            $this->kernel->boot();
        }

        return $this->kernel;
    }

    public function testMerchandiseCreate()
    {

        $merchandisingService = $this->getKernel()->getContainer()->get('vespolina.merchandise');
        $merchandise1 = $merchandisingService->create();

        $this->assertNotNull($merchandise1);

        $merchandise1->general->setName('Funky pink t-shirt');
        $merchandise1->general->setShortDescription('People will love you in this funky pink t-shirt');
                
        $merchandise1->availability->setAvailability(true);

        $pricingSet = $merchandise1->pricing->getPricingSet();
        $this->assertNotNull($pricingSet);

        $pricingBundleExists = true;
        
        if ($pricingBundleExists)
        {
            //TODO: use Monetary Bundle
            $pricingSet->addPricingElement( new \Vespolina\PricingBundle\Model\PricingElement\MonetaryPricingElement(array('name' => 'unit_price_excl_vat')));
            $pricingSet->getPricingElement('unit_price_excl_vat')->setValue(100);
        }

    }
}