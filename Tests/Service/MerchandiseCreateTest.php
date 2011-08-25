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
        if (!self::$kernel) {
            self::$kernel = $this->createKernel($options);
            self::$kernel->boot();
        }

        return self::$kernel;
    }

    public function testMerchandiseCreate()
    {

        $merchandisingService = $this->getKernel()->getContainer()->get('vespolina.merchandise');
        $merchandise1 = $merchandisingService->create();

        $this->assertNotNull($merchandise1);

    }
}