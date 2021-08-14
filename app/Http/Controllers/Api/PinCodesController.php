<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\PinCodesCsvProcess;
use App\Models\PinCode;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination;
use Symfony\Component\Console\Input\Input;


class PinCodesController extends Controller
{
    public $pagination_limit = 15;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $records = PinCode::paginate($this->pagination_limit);
        $data = array();
        foreach ($records as $value) {
            $data[] = array(
                "id" => $value['id'],
                "office_name" => $value['office_name'],
                "pin_code" => $value['pin_code'],
                "office_type" => $value['office_type'],
                "delivery_status" => $value['delivery_status'],
                "division" => $value['division'],
                "region" => $value['region'],
                "circle" => $value['circle'],
                "taluk" => $value['taluk'],
                "district" => $value['district'],
                "state" => $value['state'],

            );
        }

## Response
        $response = array(
            "status" => 1,
            "total_records" => $records->total(),
            "total_pages" => ceil($records->total() / $this->pagination_limit),
            "data" => $data
        );

        return response()->json($response);

    }

}
