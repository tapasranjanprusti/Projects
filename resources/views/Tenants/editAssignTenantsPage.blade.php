@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>EditAssign</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenantsAssignIndex')}}">Assign Tenants</a></li>
            <li class="breadcrumb-item active">Edit Assign</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
        <div class="card">
            <div class="card-body">
         
               @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right;border: unset;background-color: unset;color: red;font-size: 26px;font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                   
                  <form action="{{route('storeAssignTenants')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Tenants</label>
                  <select  class="form-select" id="tenantsNm" name="tenantsNm">
                            <option selected>Choose...</option>
                          @foreach($allTenants as $tenant)
                            <option value="{{$tenant->id}}" @if($editAssign->tenants_id == $tenant->id) selected @endif>{{$tenant->name}}</option>
                           
                          @endforeach
                        
                    </select>
                </div>
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Shop Number</label>
                  <select  class="form-select" id="shopId" name="shopId">
                            <option value="">Choose...</option>
                          @foreach($allShop as $sop)
                            <option value="{{$sop->shopNo}}"  @if($editAssign->shopId == $sop->shopNo) selected @endif>{{$sop->shopNo}}</option>
                           
                          @endforeach
                        
                    </select>
                </div>
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Montly Rent Amount</label>
                  <input type="text" class="form-control" id="mra" name="mra" value="{{$editAssign->monthRent}}">
                </div>
              
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Shop License No</label>
                  <input type="text" class="form-control" value="{{$editAssign->shopLicenseNo}}">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Date Of Allotment Of Shop</label>
                  <input type="date" class="form-control" value="{{$editAssign->Date_Of_Allotment_Of_Shop}}">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Security Deposit</label>
                  <input type="text" class="form-control" value="{{$editAssign->Security_Deposit}}">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mode of Security Deposit </label>
                  <select  class="form-select" id="mosd" name="mosd">
                            <option selected>Choose...</option>
                        
                                <option <?php echo ($editAssign->Mode_of_Security_Deposit == 0) ? 'selected' : ''; ?> value="0">DD</option>
                                <option <?php echo ($editAssign->Mode_of_Security_Deposit == 1) ? 'selected' : ''; ?> value="1">Bank Transfer</option>
                                <option <?php echo ($editAssign->Mode_of_Security_Deposit == 2) ? 'selected' : ''; ?> value="2">Cash</option>
                                                
                        
                        </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Is Security Deposit Refundable</label>
                  <select  class="form-select" id="isdr" name="isdr">
                            <option selected>Choose...</option>
                            <option <?php echo ($editAssign->Is_Security_Deposit_Refundable == 0) ? 'selected' : ''; ?> value="1">Yes</option>
                                <option <?php echo ($editAssign->Is_Security_Deposit_Refundable == 1) ? 'selected' : ''; ?> value="2">No</option>

                
                            
                          
                        
                        </select>
                </div>
               

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Tenure of Rent Aggreement(In Years)</label>
                  <input type="text" class="form-control" value="{{$editAssign->Tenure_of_Rent_Aggreement}}">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Date of Completion of Aggreement</label>
                  <input type="date" class="form-control" value="{{$editAssign->DateCompletionofAggreement}}">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Is Electricity Bills also to be Payble By Tenants</label>
                  <select  class="form-select" id="iebatbpbt" name="iebatbpbt">
                            <option selected>Choose...</option>
                        
                            <option <?php echo ($editAssign->electricity_Bill_PayBy_Tenants == 0) ? 'selected' : ''; ?> value="1">Yes</option>
                            <option <?php echo ($editAssign->electricity_Bill_PayBy_Tenants == 1) ? 'selected' : ''; ?> value="2">No</option>


                          
                        
                        </select>
                </div>
               

                <div class="text-center" style="margin-top: 34px;margin-bottom: 25px;">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
       
              
           
              </form>

            </div>
          </div>

        </div>
        </section>
  </main>

  @include('Dashboard.dashboardfooter')