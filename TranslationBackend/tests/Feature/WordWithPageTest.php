<?php

namespace Tests\Feature;

use App\Language;
use App\Translation;
use App\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


// test variables: pageRows, pageNum, word

class WordTestWithPage extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        // generate three languages
        
        factory(Language::class)->create([
            'id' => '1',
            'name' => 'zh_cn'
        ]);

        factory(Language::class)->create([
            'id' => '2',
            'name' => 'pinyin'
        ]);

        factory(Language::class)->create([
            'id' => '3',
            'name' => 'en_english'
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
            'language_id' => '1',
            'translation_id' => '1'
        ]);

       
        factory(Word::class)->create([
            'name' => 'bìngdú',
            'language_id' => '2',
            'translation_id' => '1'
        ]);

        factory(Word::class)->create([
            'name' => 'Virus',
            'language_id' => '3',
            'translation_id' => '1'
        ]);



        factory(Word::class)->create([
            'name' => '新型冠状病毒（新冠病毒）',
            'language_id' => '1',
            'translation_id' => '2'
        ]);


        factory(Word::class)->create([
            'name' => 'xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)',
            'language_id' => '2',
            'translation_id' => '2'
        ]);
 
        factory(Word::class)->create([
            'name' => 'novel coronavirus',
            'language_id' => '3',
            'translation_id' => '2'
        ]);

        factory(Word::class)->create([
            'name' => '新冠肺炎 （Covid-19）',
            'language_id' => '1',
            'translation_id' => '3'
        ]);

        factory(Word::class)->create([
            'name' => 'xinxingfeiyanxīnguān fèiyán',
            'language_id' => '2',
            'translation_id' => '3'
        ]);


        factory(Word::class)->create([
            'name' => 'Covid-19',
            'language_id' => '3',
            'translation_id' => '3'
        ]);

    }



    public function testWordNotExistWithPage()
    {
        $response = $this->get('/api/translations?sequence=1&pageRow=2&word=null');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [],
                "totalPageNum" => "0"
            ]);   
    }


    public function testWordWithDefaultRows()
    {
        $response = $this->get('/api/translations?sequence=1');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    [
                        "name" => "病毒",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "bìngdú",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "Virus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "新型冠状病毒（新冠病毒）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "novel coronavirus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "新冠肺炎 （Covid-19）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "xinxingfeiyanxīnguān fèiyán",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "Covid-19",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "3"
                    ],
                
                ],
                "totalPageNum" => "1"
            ]);   
    }



    public function testWordWithTwoRows()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=2');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    [
                        "name" => "病毒",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "bìngdú",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "Virus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "新型冠状病毒（新冠病毒）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "novel coronavirus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "2"
                    ]                
                ],
                "totalPageNum" => "2"
            ]);   
    }


    public function testWordWithOneRow()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=1');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    [
                        "name" => "病毒",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "bìngdú",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "1"
                    ],
                    [
                        "name" => "Virus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "1"
                    ]   
                ],
                "totalPageNum" => "3"
            ]);   
    }
  


    public function testWordWithOneRowPageTwo()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=1&pageNum=2');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    
                    [
                        "name" => "新型冠状病毒（新冠病毒）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "novel coronavirus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "2"
                    ]                
                ],
                "totalPageNum" => "3"
            ]);   
    }


    public function testWordWithTwoRowsAndWordCOVID()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=2&word=covid');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    
                    [
                        "name" => "新冠肺炎 （Covid-19）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "xinxingfeiyanxīnguān fèiyán",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "Covid-19",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "3"
                    ],
                
                ],
                "totalPageNum" => "1"
            ]);   

    }



    public function testWordWithTwoRowsAndWordXin()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=2&word=新');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [
                    [
                        "name" => "新型冠状病毒（新冠病毒）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "xīnxíng guānzhuàng bìngdú (xīnguān bìngdú)",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "novel coronavirus",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "2"
                    ],
                    [
                        "name" => "新冠肺炎 （Covid-19）",
                        "language_id" => "1",
                        "language_name" => "zh_cn",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "xinxingfeiyanxīnguān fèiyán",
                        "language_id" => "2",
                        "language_name" => "pinyin",
                        "translation_id" => "3"
                    ],
                    [
                        "name" => "Covid-19",
                        "language_id" => "3",
                        "language_name" => "en_english",
                        "translation_id" => "3"
                    ],
                
                ],
                "totalPageNum" => "1"
            ]);   

    }



    public function testWordWithTwoRowsPageTwoAndWordXin()
    {
        $response = $this->get('/api/translations?sequence=1&pageRows=2&pageNum=2&word=新');

        $response
            ->assertStatus(200)
            ->assertJson([
                "sequence" => "1",
                "data" => [ ],
                "totalPageNum" => "1"
            ]);   

    }


    



}