<?php

namespace Zrashwani\NewsScrapper;

use Symfony\Component\DomCrawler\Crawler;
use Zrashwani\NewsScrapper\Adapters;
use Zrashwani\NewsScrapper\Client as myClient;

class ClientTest extends \PHPUnit_Framework_TestCase {
    
    public function testConstructor(){
        $client = new myClient();
        $this->assertInstanceOf(myClient::class, $client);
    }
    
    public function testGetAdapter(){
        $client = new myClient('Microdata');
        $adapter = $client->getAdapter();
        
        $this->assertInstanceOf(Adapters\MicrodataAdapter::class, $adapter);
    }
    
    public function testSetAdapter(){
        $client = new myClient();
        
        $ret = $client->setAdapter('HAtom');
        $this->assertInstanceOf(myClient::class, $ret);
        $this->assertInstanceOf(Adapters\HAtomAdapter::class, $client->getAdapter());
    }
    
    public function testGetLinkData(){
        $client = new myClient();
        
        $link_data = $client->getLinkData('http://google.com/');        
        $this->assertStringStartsWith('Google',$link_data->title);
        
        $link_data2 = $client->getLinkData('http://php.net/');
        $this->assertStringStartsWith('PHP', $link_data2->title);
    }
    
    public function testScrapLinkGroup(){
       
        $client = new myClient();
        $links_data = $client->scrapLinkGroup('http://php.net/', 'ul.nav a');
        
        $this->assertNotEmpty($links_data);
    }
}