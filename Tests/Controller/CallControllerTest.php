<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 9:54 AM
 */
namespace WebConsul\EbayApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CallControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = self::createClient();
        $client->request('GET', '/callReference');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}