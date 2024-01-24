<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assignTenantsModel;
use Carbon\Carbon; 
use App\Models\CreatePaymentModel;
use App\Models\monthModel;
use App\Models\electricPriceModel;
use App\Models\OfficeModel;
use App\Models\payMonthModel;
use Illuminate\Support\Facades\DB; 


class CreatePaymentController extends Controller
{
    public function setPaymentPage(){
        // $allcreatePayment=CreatePaymentModel::join('tenantsdetails','createpayment.tenantUnicId','tenantsdetails.id')->join('monthtbl','createpayment.month','monthtbl.id')->select('createpayment.*','tenantsdetails.tenantUnicId','tenantsdetails.tenantUnicId','tenantsdetails.name','monthtbl.month')->get();
          //dd($allcreatePayment);

          $allpayMonth=payMonthModel::join('monthtbl','generatepaymonth.month','monthtbl.id')->
          join('marketcomplex','generatepaymonth.marketComplex','marketcomplex.id')->
          join('office','generatepaymonth.office','office.id')->
          select('generatepaymonth.id','monthtbl.month','marketcomplex.mComplexName','office.officeName','generatepaymonth.created_at')->get();
        //   dd($allpayMonth);

    return view('Payment.createPaymentIndexPage',compact('allpayMonth'));
 
     }

     public function createSetPayment(){

       $allMonth=monthModel::all();
       $alloffice=OfficeModel::all();
       //dd($allMonth);

        return view('Payment.setPaymentPage',compact('allMonth','alloffice'));
     
         }

public function storeSetPayment(Request $request){

    $allAssignShop=assignTenantsModel::join('tenantsdetails','assign_shop_details.tenants_id','tenantsdetails.id')->where('officeId','=',$request->officeId)->where('marketComplexId','=',$request->marketComplex)->select('assign_shop_details.*','tenantsdetails.tenantUnicId')->get();
    // dd($allAssignShop);
    
    $generateMonth = $request->pymentMonth;
    $currentYear = Carbon::now()->year;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $generateMonth, $currentYear);    
    $lastDateOfMonth = Carbon::createFromDate($currentYear, $generateMonth, 1)->endOfMonth()->addDay();
    // $tenantCount = $allAssignShop->count();


    $exitingElectricbill=electricPriceModel::where('month','=',$generateMonth)->where('officeId','=',$request->officeId)->where('marketCompId','=',$request->marketComplex)->get();
    


// $electricDevidePrice=0;
if($exitingElectricbill->isNotEmpty()){
    $electricDevidePrice=$exitingElectricbill[0]->perTenantsElectPrice ;
    // dd($electricDevidePrice);
}else{
    return redirect()->back()->with('error', 'Plz Create This Month Common Area Electic bill Price.');

}

    
    $existingRecord = CreatePaymentModel::where('month', $generateMonth)
    ->where('year', $currentYear)->where('officeId', $request->officeId)->where('marketCompId', $request->marketComplex)
    ->first();

if ($existingRecord) {
    return redirect()->back()->with('error', 'A record already exists for the selected month.');
}


      $storePayMonth= new payMonthModel;
      if(isset($generateMonth)){
        $storePayMonth->month= $generateMonth;
    }
      if(isset($request->officeId)){
        $storePayMonth->office= $request->officeId;
    }
    if(isset($request->marketComplex)){
        $storePayMonth->marketComplex= $request->marketComplex;
    }

    $storePayMonth->save();

     
    foreach($allAssignShop as $asignShop){
        //dd($asignShop);
                
        if($asignShop->firstPayment == '0'){
                    
            $alotmentDate = Carbon::parse($asignShop->Date_Of_Allotment_Of_Shop);                   
            $monthRent=$asignShop->monthRent;
            $perdayPrice=$monthRent / $daysInMonth ;
            $daysBetween = $alotmentDate->diffInDays($lastDateOfMonth);
            $thisMonthPrice=round($daysBetween * $perdayPrice);

            $storeSetPayment=new CreatePaymentModel;

             
        if(isset($asignShop->tenantUnicId)){
            $storeSetPayment->tenantUnicId = $asignShop->tenantUnicId;
        }
        if(isset($asignShop->officeId)){
            $storeSetPayment->officeId= $asignShop->officeId;
        }
        if(isset($asignShop->marketComplexId)){
            $storeSetPayment->marketCompId= $asignShop->marketComplexId;
        }
        if(isset($asignShop->shopId)){
            $storeSetPayment->shopId=$asignShop->shopId;
        }

        if(isset($asignShop->id)){
            $storeSetPayment->assignDetails_Id = $asignShop->id;
        }
        if(isset($generateMonth)){
            $storeSetPayment->month= $generateMonth;
        }
        if(isset($currentYear)){
            $storeSetPayment->year= $currentYear;
        }
        if(isset($thisMonthPrice)){
            $storeSetPayment->price= $thisMonthPrice;
        }
        if(isset($electricDevidePrice)){
            $storeSetPayment->addonElectricprice= $electricDevidePrice;
        }
        $storeSetPayment->save();


        $updateassigntbl = AssignTenantsModel::where('id', $asignShop->id)->first();
            
            if ($updateassigntbl) {

                $updateassigntbl->firstPayment = '1';

                $updateassigntbl->save();
               
                
            } 
              

    }else{

        $storeSetPayment=new CreatePaymentModel;

             
        if(isset($asignShop->tenantUnicId)){
            $storeSetPayment->tenantUnicId = $asignShop->tenantUnicId;
        }

        if(isset($asignShop->officeId)){
            $storeSetPayment->officeId= $asignShop->officeId;
        }
        if(isset($asignShop->marketComplexId)){
            $storeSetPayment->marketCompId= $asignShop->marketComplexId;
        }
        if(isset($asignShop->shopId)){
            $storeSetPayment->shopId=$asignShop->shopId;
        }

        if(isset($asignShop->id)){
            $storeSetPayment->assignDetails_Id = $asignShop->id;
        }
        if(isset($generateMonth)){
            $storeSetPayment->month= $generateMonth;
        }
        if(isset($currentYear)){
            $storeSetPayment->year= $currentYear;
        }
        if(isset($asignShop->monthRent)){
            $storeSetPayment->price= $asignShop->monthRent;
        }
        if(isset($electricDevidePrice)){
            $storeSetPayment->addonElectricprice= $electricDevidePrice;
        }
        $storeSetPayment->save();



        }

}
            

return redirect()->back()->with('success','Set Payment Successfull!');
         
             }


            //  public function deletePayMonth($id){

            //     $deletpaymonth=payMonthModel::find($id);
            //     if (!$deletpaymonth) {
            //       return redirect()->route('setPayment')->with('error', 'Pay Month not found.');
            //   }
        
            //   // Delete the office
            //   $deletpaymonth->delete();
        
            //   return redirect()->route('setPayment')->with('error', 'Pay Month deleted successfully.');

            //  }

            public function TenantsPayment(){
      
                $payments = CreatePaymentModel::join('office', 'createpayment.officeId', '=', 'office.id')
                ->join('marketcomplex', 'createpayment.marketCompId', '=', 'marketcomplex.id')
                ->join('tenantsdetails', 'createpayment.tenantUnicId', '=', 'tenantsdetails.tenantUnicId')
                ->where('createpayment.Satus', 0)
                ->select('createpayment.tenantUnicId',DB::raw('MAX(tenantsdetails.name) as tenantsName'), DB::raw('MAX(office.officeName) as officeName'), 
                DB::raw('MAX(marketcomplex.mComplexName) as mComplexName'),
                DB::raw('MAX(createpayment.shopId) as shopId'),
                DB::raw('SUM(createpayment.price) as TotalPrice'),
                DB::raw('SUM(createpayment.addonElectricprice) as TotalelPrice'))
                

                ->groupBy('createpayment.tenantUnicId')
                ->get();
            
                //   dd($payments);

  
            
        
            return view('Payment.TenantsMonthlyPayPage',compact('payments'));
         
             }
}
