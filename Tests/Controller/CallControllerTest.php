<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 9:54 AM
 */
namespace WebConsul\EbayApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\CssSelector\CssSelector;

class CallControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = self::createClient();
        $client->request('GET', '/callReference');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * @dataProvider provideUrls
     * @param $url
     */
    public function testPageIsSuccessful($url)
    {
        $client = static::createClient();
        CssSelector::disableHtmlExtension();
        $crawler = $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('pre:contains("ck>Success</")')->count());
    }

    public function provideUrls()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $container->get('web_consul_ebay_api.main');
        $callReference = $ebay->getCallReference();
        $urls = [];
        foreach ($callReference as $api => $callList) {
            foreach ($callList as $call) {
                $urls[] = ['/' . $api . '/' . $call];
            }
        }

        return $urls;
    }
}
