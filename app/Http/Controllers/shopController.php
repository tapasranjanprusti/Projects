<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shopModel;
use App\Models\MarketComplexModel;
use App\Models\shopPriceSet;
use App\Models\OfficeModel;


class shopController extends Controller
{
    public function shopIndex(){
        if(session('role') == 1){
            $allshop=shopModel::join('office','shop.officeId','office.id')->join('marketcomplex','shop.marketCompId','marketcomplex.id')->get();
           // dd($allshop);
        }else{
            $allshop = shopModel::where('officeId', session('office'))
            ->where('marketCompId', session('marketComplex'))
            ->get();

        }
        

        return view('shop.shopIndexPage',compact('allshop'));
    }
    public function createShopIndex(){
        $allcomplex=MarketComplexModel::all();
        $sqrPrice=shopPriceSet::find('1');
        $alloffice=OfficeModel::all();
        // dd($sqrPrice);
      
        return view('shop.createShopIndexPage',compact('allcomplex','sqrPrice','alloffice'));
    }
    public function storeShop(Request $request){
        date_default_timezone_set('Asia/Kolkata');
     

        $createshop= new shopModel;
        // dd($request);

        if(isset($request->officeId)){
            $createshop->officeId = $request->officeId;
        }
    
        
        if(isset($request->marketComplex)){
            $createshop->marketCompId = $request->marketComplex;
        }
        if(isset($request->floor)){
            $createshop->floorNo= $request->floor;
        }
        if(isset($request->shomNm)){
            $createshop->shopNo = $request->shomNm;
        }
    
        if(isset($request->shopsize)){
            $createshop->shopSize = $request->shopsize;
        }
    
        if(isset($request->electAvl)){
            $createshop->electricityAval = $request->electAvl;
        }
    
        if(isset($request->elemeterno)){
            $createshop->electricmeterNo = $request->elemeterno;
        }
    
        if(isset($request->elecunsumer)){
            $createshop->electricConsumeNo = $request->elecunsumer;
        }
        if(isset($request->shopPrice)){
            $createshop->price = $request->shopPrice;
        }
    
    
        
        $createshop->save();
        return redirect()->back()->with('success','Create Shop successfully!');

    }
}
