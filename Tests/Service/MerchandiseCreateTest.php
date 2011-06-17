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

    }
}