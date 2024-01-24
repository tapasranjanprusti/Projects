<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeModel;
use App\Models\MarketComplexModel;

class MarketComplexController extends Controller
{
    public function marketComplexIndex(){
        $allcomplex=MarketComplexModel::all();

        return view('MarketComplex.marketComplexIndexPage',compact('allcomplex'));
    }

    public function createMcomplexIndex(){
        $alloffice=OfficeModel::all();
        return view('MarketComplex.createMcomplexIndexPage',compact('alloffice'));
    }

    public function storeComplex(Request $request){
        date_default_timezone_set('Asia/Kolkata');
     

        $marketcomp= new MarketComplexModel;
        // dd($request);
    
        
        if(isset($request->offceId)){
            $marketcomp->officeId = $request->offceId;
        }
        if(isset($request->compName)){
            $marketcomp->mComplexName = $request->compName;
        }
        if(isset($request->atadd)){
            $marketcomp->at = $request->atadd;
        }
    
        if(isset($request->poadd)){
            $marketcomp->po = $request->poadd;
        }
    
        if(isset($request->cityadd)){
            $marketcomp->city = $request->cityadd;
        }
    
        if(isset($request->pinadd)){
            $marketcomp->pin = $request->pinadd;
        }
    
        if(isset($request->distadd)){
            $marketcomp->district = $request->distadd;
        }
    
        if(isset($request->floor)){
            $marketcomp->noOfFloor = $request->floor;
        }

        if(isset($request->noshop)){
            $marketcomp->noOfShop = $request->noshop;
        }
        
        $marketcomp->save();
        return redirect()->back()->with('success','Create Office successfully!');

    }
}
