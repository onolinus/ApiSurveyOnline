<?php

namespace App\Http\Controllers;

use App\ResearchFields;
use Illuminate\Http\Request;

use App\Http\Requests;

class ResearchFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = ResearchFields::all();
        if(empty($rows) || count($rows) === 0){
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_empty', ['dataname' => 'research field'])
            ], 400);
        }
        return response()->json($rows);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $row = ResearchFields::where('code', $code)->get();
        if(empty($row) || count($row) === 0){
            return response()->json([
                'status' => 'error',
                'message' => trans('errors.data_not_found', ['dataname' => 'research field'])
            ], 400);
        }
        return response()->json($row);
    }
}
