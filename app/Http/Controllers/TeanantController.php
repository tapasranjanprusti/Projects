<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantModel;
use App\Models\shopModel;
use App\Models\assignTenantsModel;
use App\Models\OfficeModel;
use App\Models\MarketComplexModel;



class TeanantController extends Controller
{
    public function tenantsIndex(){

        $tenants=TenantModel::all();

        return view('Tenants.tenantsIndexPage',compact('tenants'));
    }

    public function createTenantsIndex(){
        return view('Tenants.createTenantsIndexPage');

    }

    public function storeTenants(Request $request){
        date_default_timezone_set('Asia/Kolkata');

        $characters = '0123456789';
        $code = '';
        $length = 7;
    
        $charactersLength = strlen($characters);
    
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $charactersLength - 1);
            $code .= $characters[$randomIndex];
        }
     

        $createTenants= new TenantModel;
        // dd($request);
    
        
        if(isset($request->tName)){
            $createTenants->name = $request->tName;
        }
        if(isset($request->tAdress)){
            $createTenants->add= $request->tAdress;
        }
        if(isset($request->tFname)){
            $createTenants->fname = $request->tFname;
        }
    
        if(isset($request->tSpouse)){
            $createTenants->spousname = $request->tSpouse;
        }
    
        if(isset($request->tMob)){
            $createTenants->mob = $request->tMob;
        }
    
        if(isset($request->tEmail)){
            $createTenants->email = $request->tEmail;
        }

        
        if(isset($request->tEmgNo)){
            $createTenants->emgContact = $request->tEmgNo;
        }
    
        if(isset($request->tRelspNo)){
            $createTenants->relationsipWithContact = $request->tRelspNo;
        }

        if(isset($request->tPanno)){
            $createTenants->pan = $request->tPanno;
        }
        if(isset($request->tAdhaar)){
            $createTenants->adhaar = $request->tAdhaar;
        }
        if(isset($request->tBanknm)){
            $createTenants->bankName = $request->tBanknm;
        }
        if(isset($request->tBankAccno)){
            $createTenants->bankAccountNo = $request->tBankAccno;
        }

        if(isset($request->tBankIfsc)){
            $createTenants->bankIfsc = $request->tBankIfsc;
        }

        if(isset($code)){
            $createTenants->tenantUnicId = $code;
        }

        
        if ($request->hasFile('tAdharImg')) {
            $image = $request->file('tAdharImg');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/TenantsImages'), $imageName);
            $createTenants->adhaarImg = $imageName;
        }
    
    
        
        $createTenants->save();
        return redirect()->back()->with('success','Create Tenants successfully!');



    }






    public function tenantsAssignIndex(){
        

        if(session('role') == 1){
            $allAssign=assignTenantsModel::join('tenantsdetails','assign_shop_details.tenants_id','tenantsdetails.id')->select('assign_shop_details.*','tenantsdetails.name')->get();


        }else{
            $allAssign = assignTenantsModel::join('tenantsdetails', 'assign_shop_details.tenants_id', 'tenantsdetails.id')
            ->select('assign_shop_details.*', 'tenantsdetails.name')
            ->where('officeId', session('office'))
            ->where('marketComplexId', session('marketComplex'))
            ->get();
        


        }
         //dd($allAssign);
     
        
        return view('Tenants.tenantsAssignIndexPage',compact('allAssign'));
    }
    public function createAssignTenantsIndex(){
        $allTenants=TenantModel::all();
        // $allShop=shopModel::all();
        $alloffice=OfficeModel::all();
        $allshop = shopModel::where('officeId', session('office'))
                   ->where('marketCompId', session('marketComplex'))
                   ->get();
                //    dd($allshop);
        return view('Tenants.createAssignTenantsIndexPage',compact('allTenants','alloffice','allshop'));
    }


    public function storeAssignTenants(Request $request){
        date_default_timezone_set('Asia/Kolkata');

        
     

        $createAssignTenants= new assignTenantsModel;
        // dd($request);
    
        
        if(isset($request->tenantsNm)){
            $createAssignTenants->tenants_id = $request->tenantsNm;
        }
        if(isset($request->officeId)){
            $createAssignTenants->officeId = $request->officeId;
        }
        if(isset($request->marketComplex)){
            $createAssignTenants->marketComplexId = $request->marketComplex;
        }

        if(isset($request->shopId)){
            $createAssignTenants->shopId= $request->shopId;
        }
        if(isset($request->mra)){
            $createAssignTenants->monthRent = $request->mra;
        }
    
        if(isset($request->sln)){
            $createAssignTenants->shopLicenseNo = $request->sln;
        }
    
        if(isset($request->doaos)){
            $createAssignTenants->Date_Of_Allotment_Of_Shop = $request->doaos;
        }
    
        if(isset($request->securityDepo)){
            $createAssignTenants->Security_Deposit = $request->securityDepo;
        }

        
        if(isset($request->mosd)){
            $createAssignTenants->Mode_of_Security_Deposit = $request->mosd;
        }
    
        if(isset($request->isdr)){
            $createAssignTenants->Is_Security_Deposit_Refundable = $request->isdr;
        }

        if(isset($request->torg)){
            $createAssignTenants->Tenure_of_Rent_Aggreement = $request->torg;
        }
        if(isset($request->docoa)){
            $createAssignTenants->DateCompletionofAggreement = $request->docoa;
        }
        if(isset($request->iebatbpbt)){
            $createAssignTenants->electricity_Bill_PayBy_Tenants = $request->iebatbpbt;
        }
       
    
    
        
        $createAssignTenants->save();
        return redirect()->back()->with('success','Assign Tenants successfully!');




    }

    public function viewTenants($id){
        $viewTenants=TenantModel::find($id);
          //dd($viewTenants);
        return view('Tenants.viewTenantsPage',compact('viewTenants'));

    }

    public function editTenants($id){
        $editTenants=TenantModel::find($id);
        return view('Tenants.editTenantsPage',compact('editTenants'));

    }

    public function updateTenants(Request $request){
        $updateTenants=TenantModel::find($request->edid);
       
    
        
        if(isset($request->edtname)){
            $updateTenants->name = $request->edtname;
        }
        if(isset($request->edAdd)){
            $updateTenants->add= $request->edAdd;
        }
        if(isset($request->edfnm)){
            $updateTenants->fname = $request->edfnm;
        }
    
        if(isset($request->edSpouse)){
            $updateTenants->spousname = $request->edSpouse;
        }
    
        if(isset($request->edMob)){
            $updateTenants->mob = $request->edMob;
        }
    
        if(isset($request->edEmail)){
            $updateTenants->email = $request->edEmail;
        }

        
        if(isset($request->edCnum)){
            $updateTenants->emgContact = $request->edCnum;
        }
    
        if(isset($request->edRwecn)){
            $updateTenants->relationsipWithContact = $request->edRwecn;
        }

        if(isset($request->edPan)){
            $updateTenants->pan = $request->edPan;
        }
        if(isset($request->edAdhaar)){
            $updateTenants->adhaar = $request->edAdhaar;
        }
        if(isset($request->edbanknm)){
            $updateTenants->bankName = $request->edbanknm;
        }
        if(isset($request->edBankacc)){
            $updateTenants->bankAccountNo = $request->edBankacc;
        }

        if(isset($request->edIfsc)){
            $updateTenants->bankIfsc = $request->edIfsc;
        }

    

        
        if ($request->hasFile('edAdaahar')) {
            $image = $request->file('edAdaahar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/TenantsImages'), $imageName);
            $updateTenants->adhaarImg = $imageName;
        }
    
    
        
        $updateTenants->save();
        return redirect()->back()->with('success','Update Tenants successfully!');


    }

    public function viewAssignTenants($id){

        $allTenants=TenantModel::all();
        $allShop=shopModel::all();
         $viewAssign=assignTenantsModel::join('tenantsdetails','assign_shop_details.tenants_id','tenantsdetails.id')->select('assign_shop_details.*','tenantsdetails.name')->where('assign_shop_details.id','=',$id)->get();
       //dd($viewAssign);
       //$viewAssign=assignTenantsModel::find($id);
       //dd($viewAssign);


       return view('Tenants.viewAssignTenantsPage',compact('viewAssign','allTenants','allShop'));
    }

    public function editAssignTenants($id){

        $allTenants=TenantModel::all();
        $allShop=shopModel::all();
        // $viewAssign=assignTenantsModel::join('tenantsdetails','assign_shop_details.tenants_id','tenantsdetails.id')->select('assign_shop_details.*','tenantsdetails.name')->where('assign_shop_details.id','=',$id)->get();
       //dd($viewAssign);
       $editAssign=assignTenantsModel::find($id);
       //dd($viewAssign);


       return view('Tenants.editAssignTenantsPage',compact('editAssign','allTenants','allShop'));

    }

    public function getShopPrice(Request $request){
        $shopNo = $request->input('shopNo');

        // Fetch the shop price based on the shop number
        $shop = ShopModel::where('shopNo', $shopNo)->first();

        if ($shop) {
            return response()->json(['price' => $shop->price]);
        } else {
            return response()->json(['price' => null]);
        }

    }

    public function getMarketComplexes(Request $request)
{
    $officeId = $request->input('officeId');
    $marketComplexes = MarketComplexModel::where('officeId', $officeId)->get();

    return response()->json($marketComplexes);
}

public function getShopNumbers(Request $request)
{
    $marketCompId = $request->input('marketCompId');
    $shopNumbers = shopModel::where('marketCompId', $marketCompId)->get();

    return response()->json($shopNumbers);
}



   
}
