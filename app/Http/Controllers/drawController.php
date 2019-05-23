<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class drawController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public static $attributes;
    public static function store($results, $input)
    {
        drawController::destroy();
        $dimensionIndex = 1;
        $chartNumber = 1;
        foreach ($results as $dimension){
            $fieldIndex = 1;
            foreach ($dimension as $chart){
                foreach ($chart as $row){
                    $row =(array)$row;
                    \DB::select("insert into draws (dimension, field, count, table_number) values('".$row[$input['dimension']["$dimensionIndex"]]."', '".$row[$input['fields']["$fieldIndex"]]."',".$row['count'].", ".$chartNumber.")");
                }
                $chartNumber = $chartNumber + 1;
                $fieldIndex = $fieldIndex + 1;
            }
            $dimensionIndex = $dimensionIndex+1;
        }
        self::$attributes = $input;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy()
    {
        \DB::select("delete  from draws");
    }

    public function draw(){
        $results = array();
        $number_of_charts = (array)(\DB::select("select max(table_number) as max from draws")[0]);
        $number_of_charts = $number_of_charts['max'];
        for ($x = 1; $x <= $number_of_charts; $x++) {
            array_push($results, (array)\DB::select("select * from draws where table_number =".$x." "));
        }
       print_r(self::$attributes);
        return view("charts")
            ->with('data',$results);


    }
}
