<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatePaymentModel;

class UserWebController extends Controller
{
    public function webIndexPage(){
        return view('User.webIndex');
    }

    public function ShopReport(){
        return view('User.ShopReport');

    }
    public function tenantsPaymentReportPage(Request $request){

        // $currentMonth = date('n');
        // dd($currentMonth);

        $teantId=$request->TenantId;
        $year=$request->fromYear;
        // dd($year);

        $paymentDetails=CreatePaymentModel::join('monthtbl','createpayment.month','monthtbl.id')->where('tenantUnicId','=',$teantId)->where('year','=',$year)->where('Satus','=','0')->select('createpayment.*','monthtbl.month as monthNm')->get();
    //    dd($paymentDetails);
        return view('User.tenantsPaymentReport',compact('paymentDetails'));

    }
}
