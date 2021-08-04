<?php

namespace App\Http\Controllers;

use App\Imports\WordImport;
use App\Word;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WordController extends Controller
{
    public function store($path){
        // import all the data from Excel sheet to WordImport
        Excel::import(new WordImport, $path);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Word  $word
     * @return json file containing result of search
     */
    public function show()
    {
        if ( request()->has( 'sequence' ) ) {
            $sequence = request()->sequence;
            $word = null;

            if ( request()->has( 'word' ) ) {
                $word = request()->word;
            }

            // default page number is 1
            $pageNum = 1;
            if(request() -> has( 'pageNum')) {
                $pageNum = request()->pageNum;
            }

            // default rows in a page is 10
            $pageRows = 10;
            if(request() -> has( 'pageRows')) {
                $pageRows = request()->pageRows;
            }

            $words = new Word();
            $data = $words->search($word, $pageNum, $pageRows);
            return json_encode(['sequence' => $sequence, 'data' => $data['data'], 'totalPageNum' => $data['totalPageNum'] ]);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //
    }
}
