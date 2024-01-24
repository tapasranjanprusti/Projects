<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shopPriceSet;
use App\Models\monthModel;
use App\Models\OfficeModel;
use App\Models\assignTenantsModel;
use App\Models\electricPriceModel;
use App\Models\CreatePaymentModel;
use App\Models\User;


class AdminController extends Controller
{
  public function dashboardIndexPage(){
    return view('Dashboard.dashboardIndexPage');
  }

  public function landPriceSetPage(){
    $setPrice=shopPriceSet::all();
    return view('price.indexpriceSetPage',compact('setPrice'));

  }
  public function createSetPricePage(){
    return view('price.createSetPricePage');

  }

  public function storeSetPrice(Request $request){
    date_default_timezone_set('Asia/Kolkata');

    $avilablePrice=shopPriceSet::find('1');

    if(!empty($avilablePrice)){
      // dd('not empty');
      return redirect()->back()->with('success','Alredy Have Price On Database,You only can Update!');

    }


    $addprice= new shopPriceSet;
    // dd($request);

    
    if(isset($request->sqrft)){
        $addprice->sqrFeet = $request->sqrft;
    }
    if(isset($request->priceset)){
        $addprice->price = $request->priceset;
    }


    $addprice->save();
    return redirect()->back()->with('success','Create Price successfully!');
    

  }

  public function truncatePriceSet($id)
  {
      // Truncate the shopPriceSet module
      ShopPriceSet::truncate();

      // Redirect or return a response as needed
      return redirect()->route('landPriceSet')->with('success', 'Deleted Price successfully.');
  }

  public function commonBillIndex(){
    $electricBillPrice=electricPriceModel::join('monthtbl','electricbill.month','monthtbl.id')
    ->join('office','electricbill.officeId','office.id')
    ->join('marketcomplex','electricbill.marketCompId','marketcomplex.id')->
    select('electricbill.*','office.officeName','marketcomplex.mComplexName','monthtbl.month')->get();
    // dd($electricBillPrice);

    return view('Admin.commonBillIndexPage',compact('electricBillPrice'));

  }
  public function createCommonBillIndex(){
    $allMonth=monthModel::all();
    $alloffice=OfficeModel::all();

    return view('Admin.createCommonBillIndexPage',compact('allMonth','alloffice'));

  }

  public function storeCommonBill(Request $request){
    date_default_timezone_set('Asia/Kolkata');

    $bilmonth=$request->bilmonth;
    $officeId=$request->officeId;
    $marketCompId=$request->marketComplex;
    $price=$request->elPrice;


    $countTenants=assignTenantsModel::where('officeId','=',$officeId)->where('marketComplexId','=',$marketCompId)->count();
  //  dd($countTenants);
    // dd($officeId);
    // dd($marketCompId);
    $devidedPriceTenants=$price / $countTenants ;
    

  $storeBillPrice= new electricPriceModel;

  if(isset($bilmonth)){
    $storeBillPrice->month = $bilmonth;
}
if($officeId){
    $storeBillPrice->officeId = $officeId;
}
if($marketCompId){
  $storeBillPrice->marketCompId = $marketCompId;
}
if($price){
  $storeBillPrice->cElectricPrice = $price;
}
if($devidedPriceTenants){
  $storeBillPrice->perTenantsElectPrice = $devidedPriceTenants;
}
$storeBillPrice->save();
return redirect()->back()->with('success','Create Bill successfully!');



  }

  public function viewTMonthlyRpt($id){
    $tenantsPayreport = CreatePaymentModel:: 
    join('monthtbl', 'createpayment.month', '=', 'monthtbl.id')
    ->where('tenantUnicId','=',$id)->get();
    // dd($tenantsPayreport);
    return view('Report.TviewmonthlyReport',compact('tenantsPayreport'));

  }

  public function UserIndex(){

    $allUser=User::all();
    // dd($allUser);
    return view('Admin.UserIndexPage',compact('allUser'));

  }

  public function createUser(){

    $alloffice=OfficeModel::all();
    return view('Admin.createUserPage',compact('alloffice'));

  }

  public function storeUser(Request $request){
    date_default_timezone_set('Asia/Kolkata');

        
     

        $createUser= new User;
        // dd($request);
    
        
        if(isset($request->uname)){
            $createUser->name = $request->uname;
        }
        if(isset($request->uemail)){
            $createUser->email = $request->uemail;
        }
        if(isset($request->umob)){
            $createUser->Mob = $request->umob;
        }

        if(isset($request->upass)){
            $createUser->password= $request->upass;
        }
        if(isset($request->uRole)){
            $createUser->role = $request->uRole;
        }
    
        if(isset($request->officeId)){
            $createUser->officeId = $request->officeId;
        }
    
        if(isset($request->marketComplex)){
            $createUser->marketComplexId = $request->marketComplex;
        }
    
     

          
        if ($request->hasFile('uimage')) {
          $image = $request->file('uimage');
          $imageName = time() . '_' . $image->getClientOriginalName();
          $image->move(public_path('images/AdminImages'), $imageName);
          $createUser->userImg = $imageName;
        }

        
     
    
    
        
        $createUser->save();
        return redirect()->back()->with('success','User Create successfully!');



  }

  public function editUser($id){

    $alloffice=OfficeModel::all();

    $editUser=User::where('id','=',$id)->get();
      // dd($editUser);

    return view('Admin.EditUserPage',compact('editUser','alloffice'));

  }

  public function UpdateUser(Request $request){

    $UpdateUser=User::find($request->eduseId);
    // dd( $UpdateUser);

    if(isset($request->edname)){
      $UpdateUser->name = $request->edname;
  }
  if(isset($request->edemail)){
      $UpdateUser->email = $request->edemail;
  }
  if(isset($request->edmob)){
      $UpdateUser->Mob = $request->edmob;
  }

  if(isset($request->edpass)){
      $UpdateUser->password= $request->edpass;
  }
  if(isset($request->edRole)){
      $UpdateUser->role = $request->edRole;
  }

  if(isset($request->edofficeId)){
      $UpdateUser->officeId = $request->edofficeId;
  }

  if(isset($request->edmarketComplex)){
      $UpdateUser->marketComplexId = $request->edmarketComplex;
  }



    
  if ($request->hasFile('edimage')) {
    $image = $request->file('edimage');
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images/AdminImages'), $imageName);
    $UpdateUser->userImg = $imageName;
  }


  $UpdateUser->save();
  return redirect()->back()->with('success','User Update successfully!');

  }

  public function deleteUser($id){
    $deleteUser=User::find($id);
    if (!$deleteUser) {
      return redirect()->route('UserIndex')->with('error', 'User not found.');
  }

  // Delete the office
  $deleteUser->delete();

  return redirect()->route('UserIndex')->with('error', 'User deleted successfully.');

  }
 

}
