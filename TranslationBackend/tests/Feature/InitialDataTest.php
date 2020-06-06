<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Throwable;

class InitialDataTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Testing all the data are imported from excel sheet into database correctly.
     *
     * @return void
     */
    public function testExcelFileExistence()
    {
        $response = $this->get('/import');
        $response->assertStatus(200);
        $this->assertFileExists('storage/app/data.xlsx');
    }

    public function testLanguagesTable()
    {
        $response = $this->get('/import');
        $response->assertStatus(200);
        $this->assertEquals(18, DB::table('languages')->count());
    }

    public function testTranslationsTable()
    {
        $response = $this->get('/import');
        $response->assertStatus(200);
        $this->assertEquals(113, DB::table('translations')->count());
    }

    public function testWordsTable()
    {
        $response = $this->get('/import');
        $response->assertStatus(200);
        $this -> assertDatabaseHas('words', [
            'name' => '含氯消毒液',
            'translation_id' => '104',
            'language_id' => '1'
        ]);

        $this -> assertDatabaseHas('words', [
            'name' => 'повишена телесна температура',
            'translation_id' => '70',
            'language_id' => '6'
        ]);

        $this -> assertDatabaseHas('words', [
            'name' => 'הדבקה קהילתית',
            'translation_id' => '23',
            'language_id' => '10'
        ]);

        $this -> assertDatabaseHas('words', [
            'name' => null,
            'translation_id' => '1',
            'language_id' => '5'
        ]);

        $this -> assertDatabaseHas('words', [
            'name' => 'Serviciul Național Italian de Sănătate',
            'translation_id' => '113',
            'language_id' => '18'
        ]);

    }
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        $config = app('config');
        try {
            parent::tearDown();
        } catch (Throwable $e) {
        }
        app()->instance('config', $config);

    }

}
