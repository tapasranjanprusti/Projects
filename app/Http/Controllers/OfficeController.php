<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeModel;
use App\Models\govtDepartmentModel;

class OfficeController extends Controller
{
    public function OficeIndex(){
      $alloffice=OfficeModel::join('govtdepartment','office.departmentId','govtdepartment.id')->select('office.*','govtdepartment.departmentName')->get();

        return view('Admin.departmentIndexPage',compact('alloffice'));
      }
      public function createOficeIndex(){
        $allDepartment=govtDepartmentModel::all();
        return view('Admin.createOficeIndexPage',compact('allDepartment'));
      }
      public function storeOffice(Request $request){
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $randomNum = rand();
        $uniqueId = $uniqueId = $timestamp . $randomNum;

        $createOffice= new OfficeModel;
        // dd($request);
    
        
        if(isset($request->officeNm)){
            $createOffice->officeName = $request->officeNm;
        }
        if(isset($request->deptNm)){
            $createOffice->departmentId = $request->deptNm;
        }
    
       if(isset($uniqueId )){
        $createOffice->officeId = $uniqueId;
        }
  

        
    
        $createOffice->save();
        return redirect()->back()->with('success','Create Office successfully!');
        
      }

      public function editOffice($id){
        // dd($id);
        $editoffice=OfficeModel::find($id);
        $alldepartment=govtDepartmentModel::all();
       
        // dd($editoffice);
        return view('Admin.editOficePage',compact('editoffice','alldepartment'));

      }
      public function updateOffice(Request $request){
        $editOffice=OfficeModel::where('id','=',$request->editId)->first();

        if(isset($request->edtofficeNm)){
          $editOffice->officeName = $request->edtofficeNm;
      }
      if(isset($request->edtdeptNm)){
          $editOffice->departmentId = $request->edtdeptNm;
      }
      $editOffice->save();
      return redirect()->back()->with('success','Update Office successfully!');

      }

      public function deleteOffice($id){
        // dd($id);
        $deleteoffice=OfficeModel::find($id);
        if (!$deleteoffice) {
          return redirect()->route('OficeIndex')->with('error', 'Office not found.');
      }

      // Delete the office
      $deleteoffice->delete();

      return redirect()->route('OficeIndex')->with('error', 'Office deleted successfully.');

      }
}
