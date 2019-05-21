<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class campaignController extends Controller
{

    public function draw(){
        $data = file_get_contents("results.json");
        $data = json_decode($data);
        //print_r($data);
        return view("charts")->with('data',$data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Campaign::all();
        return($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->input();
        $curl = curl_init();
        foreach ($array as $arr){
            $input = new Campaign;
            $input->name = $arr['name'];
            $input->country = $arr['country'];
            $input->budget = $arr['budget'];
            $input->goal = $arr['goal'];
            if(array_key_exists ( 'category' , $arr) && $arr['category'] != ""){
                $input->category = $arr['category'];
            }else{
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://ngkc0vhbrl.execute-api.eu-west-1.amazonaws.com/api/?url=https://arabic.cnn.com/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache"
                    ),
                ));
                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);
                $response = json_decode($response, true); //because of true, it's in an array
                $input->category = $response['category']['name'];
            }
            $input->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Campaign::find($id);
        return $data;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function put(Request $request, $id)
    {
        $data = $request->input();
        Campaign::where('id',$id)->update(['name'=>$data['name'], 'country'=>$data['country'], 'budget'=>$data['budget'],'goal'=>$data['goal'], 'category'=>$data['category']]);
    }

    public function patch(Request $request, $id)
    {
        $data = $request->input();
        foreach ($data as $key=>$attr){
            Campaign::where('id',$id)->update([$key=>$attr]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campaign::destroy($id);
    }

    public function analyze(Request $request)
    {

        $input = $request->input();
        $result = \DB::select("select ".$input['dimension'].", ".$input['fields'].", count(*) as count from campaigns where created_at > '".$input['duration']['start']."' and created_at < '".$input['duration']['end']."' group by ".$input['dimension'].", ".$input['fields']." order by ".$input['dimension']."");
        $message = "task completed successfully open this url in your browser to show the result: http://127.0.0.1:8000/charts";
        $fp = fopen('results.json', 'a','\n');
        fwrite($fp, json_encode($result));
        fclose($fp);
        print_r($message);

    }
}
