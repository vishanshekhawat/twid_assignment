<?php

namespace App\Jobs;

use App\Models\PinCode;

class PinCodesCsvProcess extends Job
{
    public $data;
    public $header;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header)
    {
        //
        $this->data   = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $data) {

            $pincode = $data[1];
            if (PinCode::where('pin_code' ,$data[1])->count() >= 1){
                continue;
            }
            $pincode_data = array(
                'office_name'=>$data[0],
                'pin_code'=>$data[1],
                'office_type'=>$data[2],
                'delivery_status'=>$data[3],
                'division'=>$data[4],
                'region'=>$data[5],
                'circle'=>$data[6],
                'taluk'=>$data[7],
                'district'=>$data[8],
                'state'=>$data[9]
            );
            PinCode::create($pincode_data);
        }
    }
}
