<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeModel;
use App\Models\shopModel;
use App\Models\MarketComplexModel;
use App\Models\priceModel;

class priceController extends Controller
{
    public function priceIndex(){

        $allprice=priceModel::join('office','price.officeId','office.id')->join('marketcomplex','price.meketComlexId','marketcomplex.id')->join('shop','price.shopId','shop.id')->select('price.id','price.Price','office.officeName','marketcomplex.mComplexName','shop.shopNo')->get();
    
    //   $final_price=$allprice[0];
    // dd($allprice);
       return view('price.priceIndexPage',compact('allprice'));
   }
   public function createPriceIndex(){
    $alloffice=OfficeModel::all();
     //dd($alloffice[0]);
     return view('price.createPriceIndexPage',compact('alloffice'));
   }

   public function getMarkets(Request $request)
{
  
    $officeId = $request->input('officeId');
   
    $markets = MarketComplexModel::where('officeId', $officeId)->get();
    // return response()->json($markets);

    $marketData = []; 
    foreach ($markets as $market) {
        $marketData[] = [
            'complexId' => $market->id,
            'marketComplex' => $market->mComplexName,
        ];
    }

  
    return response()->json($marketData);
   
    
     
}

public function getShops(Request $request)

{
    $marketCompId = $request->input('marketCompId');
    $shops = shopModel::where('marketCompId', $marketCompId)->pluck('shopNo', 'id');
    
    return response()->json($shops);
}


public function storePrice(Request $request){
    date_default_timezone_set('Asia/Kolkata');


    $addprice= new priceModel;
    // dd($request);

    
    if(isset($request->officeNm)){
        $addprice->officeId = $request->officeNm;
    }
    if(isset($request->mrktcompNm)){
        $addprice->meketComlexId = $request->mrktcompNm;
    }

    if(isset($request->shopNm)){
        $addprice->shopId = $request->shopNm;
    }
    if(isset($request->priceset)){
        $addprice->Price = $request->priceset;
    }




    

    $addprice->save();
    return redirect()->back()->with('success','Create Price successfully!');


}

}
