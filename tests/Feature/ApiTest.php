<?php
namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /** @test */
    public function helloTest()
    {
        $response = $this->getJson('/api/hello?name=Aya');
        
        $response->assertStatus(200)
                 ->assertJson([
                     'greeting' => 'Hello, Aya',
                 ]);
    }

    /** @test */
    public function helloWorldTest()
    {
        $response = $this->getJson('/api/hello');
        
        $response->assertStatus(200)
                 ->assertJson([
                     'greeting' => 'Hello, World',
                 ]);
    }

    /** @test */
    public function infoTest()
    {
        $response = $this->getJson('/api/info');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'time',
            'client_address',
            'host_name',
            'headers' => []
        ]);

        $responseData = $response->json();
        
        $this->assertMatchesRegularExpression(
            '/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\+00:00/',
            $responseData['time']
        );
        
        $this->assertEquals('127.0.0.1', $responseData['client_address']); 
        $this->assertIsArray($responseData['headers']);
                    
    }
    
    
}
