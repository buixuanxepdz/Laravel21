<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index()
    {
        return view('backend.statisticals.statistical');
    }
    public function filter(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();

            foreach ($get as $key => $value) {
                $chart_data[] = array(
                    'period' => $value->order_date,
                    'order' => $value->total_order,
                    'sales' => $value->sales,
                    'profit' => $value->profit,
                    'quantity' => $value->quantity  
                );
            }
            echo $data = json_encode($chart_data);
    }

    public function filterday(Request $request)
    {
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc =Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc =Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay'){
            $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }
        elseif($data['dashboard_value'] == 'thangtruoc')
        {
            $get = Statistical::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','ASC')->get();
        }
        elseif($data['dashboard_value'] == 'thangnay')
        {
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }
        else
        {
            $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }
        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity  
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function OneMonth()
    {
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now =  Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistical::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();
        foreach ($get as $key => $value) {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order' => $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity  
            );
        }
        echo $data = json_encode($chart_data);
    }
}
