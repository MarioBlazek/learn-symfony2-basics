<?php

namespace MB\ApplicationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiControllerTest extends WebTestCase
{
    private function post($uri, array $data)
    {
        $content = json_encode($data);
        $client = static::createClient();
        $client->request('POST', $uri, array(), array(), array(), $content);

        return $client->getResponse();
    }

    public function testOfferingTheRightThing()
    {
        $response = $this->post('/api/ni', array('offering' => 'shrubbery'));

        //$this->assertTrue($response->isSuccessful());
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testOfferingTheWrongThing()
    {
        $response = $this->post('/api/ni', array('offering' => 'hareng'));

        //$this->assertFalse($response->isSuccessful());
        $this->assertSame(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }
}