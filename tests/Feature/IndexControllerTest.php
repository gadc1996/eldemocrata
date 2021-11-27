<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function testReturnIndexView(): void
    {
        $this->get('/')
             ->assertOk()
             ->assertViewIs('index');
    }
}
