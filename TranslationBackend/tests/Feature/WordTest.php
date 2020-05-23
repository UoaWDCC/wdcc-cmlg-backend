<?php

namespace Tests\Feature;

use App\Language;
use App\Translation;
use App\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testChinese()
    {
        $response = $this->get('/translations/病毒');

        $response
            ->assertStatus(200)
            ->assertJson([
                [
                    "name" => "病毒",
                    "language_name" => "ZH CN",
                    "translation_id" => "1"
                ],
                [
                    "name" => "bìngdú",
                    "language_name" => "pinyin",
                    "translation_id" => "1"
                ]
            ]);
    }

    public function testAccent()
    {
        $response = $this->get('/translations/bìngdú');

        $response
            ->assertStatus(200)
            ->assertJson([
                [
                    "name" => "病毒",
                    "language_name" => "ZH CN",
                    "translation_id" => "1"
                ],
                [
                    "name" => "bìngdú",
                    "language_name" => "pinyin",
                    "translation_id" => "1"
                ],
                [
                    "name" => "novel coronavirus",
                    "language_name" => "EN English",
                    "translation_id" => "2"
                ],
                [
                    "name" => "xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)",
                    "language_name" => "pinyin",
                    "translation_id" => "2"
                ]
            ]);
    }

    // testing the /translation endpoint
    public function testEmptySearch()
    {
        $response = $this->get('/translations');

        $response
            ->assertStatus(200)
            ->assertJson([
                    [
                        "name" => "病毒",
                        "language_name" => "ZH CN",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "bìngdú",
                        "language_name" => "pinyin",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "novel coronavirus",
                        "language_name" => "EN English",
                        "translation_id" => "2"
                    ],
                    [
                        'name' => 'xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)',
                        "language_name" => "pinyin",
                        "translation_id" => "2"
                    ],
                    [
                        'name' => 'fèiyán',
                        "language_name" => "pinyin",
                        "translation_id" => "3"
                    ]
                ]);
    }


    //test that when users search for non-exist words, empty result is returned
    public function testNoResults()
    {
        $response = $this->get('/translations/abcdef');

        $response
            ->assertStatus(200) // @todo might change status code
            ->assertJson([]);
    }

    public function setUp() : void
    {
        parent::setUp();

        // generate three languages
        factory(Language::class)->create([
            'id' => '1',
            'name' => 'EN English'
        ]);
        factory(Language::class)->create([
            'id' => '2',
            'name' => 'ZH CN'
        ]);
        factory(Language::class)->create([
            'id' => '3',
            'name' => 'pinyin'
        ]);

        // generate three translations
        factory(Translation::class)->create([
            'id' => '1',
            'name' => 'Virus'
        ]);

        factory(Translation::class)->create([
            'id' => '2',
            'name' => 'novel coronavirus'
        ]);

        factory(Translation::class)->create([
            'id' => '3',
            'name' => 'Covid-19'
        ]);

        // generate 5 words belonging
        factory(Word::class)->create([
            'name' => '病毒',
            'language_id' => '2',
            'translation_id' => '1'
        ]);

        factory(Word::class)->create([
            'name' => 'bìngdú',
            'language_id' => '3',
            'translation_id' => '1'
        ]);

        factory(Word::class)->create([
            'name' => 'novel coronavirus',
            'language_id' => '1',
            'translation_id' => '2'
        ]);

        factory(Word::class)->create([
            'name' => 'xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)',
            'language_id' => '3',
            'translation_id' => '2'
        ]);

        factory(Word::class)->create([
            'name' => 'fèiyán',
            'language_id' => '3',
            'translation_id' => '3'
        ]);

    }
}
