<?php

namespace Milwad\LaravelValidate\Tests;

use Milwad\LaravelValidate\Rules\ValidHashtag;

class ValidHashtagTest extends BaseTest
{
    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test text has hashtag.
     *
     * @test
     * @return void
     */
    public function text_has_hashtag()
    {
        $rules = ['even_number' => [new ValidHashtag()]];
        $data = ['even_number' => '#laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertTrue($passes);
    }

    /**
     * Test text has no hashtag.
     *
     * @test
     * @return void
     */
    public function text_has_no_hashtag()
    {
        $rules = ['even_number' => [new ValidHashtag()]];
        $data = ['even_number' => 'laravel'];
        $passes = $this->app['validator']->make($data, $rules)->passes();

        $this->assertFalse($passes);
    }
}