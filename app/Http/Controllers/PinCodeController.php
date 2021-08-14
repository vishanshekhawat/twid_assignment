<?php

namespace App\Http\Controllers;

use App\Jobs\PinCodesCsvProcess;
use App\Models\PinCode;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination;
use Symfony\Component\Console\Input\Input;
use Illuminate\Pagination\LengthAwarePaginator;


class PinCodeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

        return view('pincodes');
    }

    public function import(){
        //phpinfo();
          return view('upload-file');
    }

    public function importDataFromUrl(){

        $data = file_get_contents("http://data.gov.in/sites/default/files/all_india_pin_code.csv");
        $rows = explode("\n",$data);

        $header = [];
        $chunk_size = 0;
        $data= array();
        foreach($rows as $key=>$row) {

            $data[] = array_map("utf8_encode", str_getcsv($row));
//            $data[] = array_map('str_getcsv', $data);
            if ($key === 0) {
                $header = $data[0];
                unset($data[0]);
                continue;
            }
            //echo "<pre>";
            //print_r($data);
            //die;
            $chunk_size++;
            if($chunk_size == 500){
                try{
                    dispatch(new PinCodesCsvProcess($data , $header));
                }catch (\Exception $e){
                    echo $e->getMessage();
                    continue;
                }
                $data = array();
                $chunk_size = 0;
            }
        }
        die("Imported Successfully");

    }

    public function upload()
    {
        if (request()->has('mycsv')) {
            $data   =   file(request()->mycsv);
            // Chunking file
            $chunks = array_chunk($data, 1000);

            $header = [];

            foreach ($chunks as $key => $chunk) {

                $data = array_map("utf8_encode", $chunk);
                $data = array_map('str_getcsv', $data);
               // echo "<pre>";
               // print_r($data);
                // die;
                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                // var_dump($data);
                try{
                    dispatch(new PinCodesCsvProcess($data , $header));
                }catch (\Exception $e){
                    echo $e->getMessage();
                    echo "<br>";
                    die;
                }
            }
            die("Uploaded");
        }
        return 'please upload file';
    }
    
}
