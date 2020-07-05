<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTestRoutes extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRootUri()
    {
        $response = $this->get('/');
        
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('home'))
            ->assertStatus(302);
    }

    public function testHomeUri()
    {
        $response = $this->get(route('home'));
        $response
            ->assertHeader('content-Type', 'text/html; charset=UTF-8')
            ->assertSeeText('Последние новости')
            ->assertDontSeeText('Такого текста не существует')
            ->assertStatus(200);
    }

    public function testNewsUri()
    {
        $response = $this->get(route('news'));
        $response
            ->assertHeader('content-Type', 'text/html; charset=UTF-8')
            ->assertSeeText('Новостные рубрики')
            ->assertDontSeeText('Такого текста не существует')
            ->assertStatus(200);
    }

    public function testAboutUri()
    {
        $response = $this->get(route('about'));
        $response
            ->assertHeader('content-Type', 'text/html; charset=UTF-8')
            ->assertSeeText('Обратная связь')
            ->assertDontSeeText('Такого текста не существует')
            ->assertStatus(200);
    }

    public function testPostFeedBack()
    {
        $response = $this->post(route('about'), [
            'user-name' => 'tester',
            'body' => 'Some text for test'
        ]);
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('home'))
            ->assertStatus(302);
    }

    public function testApiFeedbacks()
    {
        $response = $this->get('/api/feedbacks');
        $response
            ->assertJsonStructure([['content' => []]])
            ->assertStatus(200);
    }
}
