@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create New Tenants</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenantsIndex')}}">Tenants</a></li>
            <li class="breadcrumb-item active">Create Tenants</li>
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
                   
                  <form action="{{route('storeTenants')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" id="tName" name="tName">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Address</label>
                  <input type="text" class="form-control" id="tAdress" name="tAdress">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Father Name</label>
                  <input type="text" class="form-control" id="tFname" name="tFname">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Spouse Name</label>
                  <input type="text" class="form-control" id="tSpouse" name="tSpouse">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mobile No</label>
                  <input type="text" class="form-control" id="tMob" name="tMob">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Email Id</label>
                  <input type="text" class="form-control" id="tEmail" name="tEmail">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Emmergency Contact Number</label>
                  <input type="text" class="form-control" id="tEmgNo" name="tEmgNo">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Relationsip With Emmergency Contact Number</label>
                  <input type="text" class="form-control" id="tRelspNo" name="tRelspNo">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Pan No</label>
                  <input type="text" class="form-control" id="tPanno" name="tPanno">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Adhaar No</label>
                  <input type="text" class="form-control" id="tAdhaar" name="tAdhaar">
                </div>



            


                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Name</label>
                  <input type="text" class="form-control" id="tBanknm" name="tBanknm">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account Number</label>
                  <input type="text" class="form-control" id="tBankAccno" name="tBankAccno">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account IFSC code</label>
                  <input type="text" class="form-control" id="tBankIfsc" name="tBankIfsc">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Uplord Adhaar</label>
                  <input type="File" class="form-control" id="tAdharImg" name="tAdharImg">
                </div>










        
                

               
                        <!-- <div class="col-md-6">
                        <label for="inputName5" class="form-label">Floor No</label>
                        <select  class="form-select" id="floor" name="floor">
                            <option selected>Choose...</option>
                        
                            <option value="0">Ground Floor</option>
                            <option value="1">1st Floor</option>
                            <option value="2">2nd Floor</option>
                            <option value="3">3rd Floor</option>
                            <option value="4">4th Floor</option>
                            <option value="5">5th Floor</option>
                        
                        </select>
                        </div>

                        
                        <div class="col-md-6">
                        <label for="inputName5" class="form-label">Shop Number</label>
                        <input type="text" class="form-control" id="shomNm" name="shomNm">
                        </div>
                        <div class="col-md-6">
                        <label for="inputName5" class="form-label">Shop Size (In Sqft)</label>
                        <input type="text" class="form-control" id="shopsize" name="shopsize">
                        </div>
                        <div class="col-md-6">
                        <label for="inputName5" class="form-label">Electricity Available</label>
                        <div class="row g-12">
                        <div class="col-md-6"><div class="form-check">
                            <input class="form-check-input" type="radio" name="electAvl" id="electAvl" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Yes
                            </label>
                            </div></div>
                        <div class="col-md-6"> <div class="form-check">
                            <input class="form-check-input" type="radio" name="electAvl" id="electAvl" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                No
                            </label>
                            </div></div>
                        
                        
                        </div>
                        
                        </div>
                        <div class="col-md-6">
                        <label for="inputName5" class="form-label">Electricity meter No</label>
                        <input type="text" class="form-control" id="elemeterno" name="elemeterno">
                        </div>
                        <div class="col-md-6">
                        <label for="inputName5" class="form-label">Electricity Consumer No</label>
                        <input type="text" class="form-control" id="elecunsumer" name="elecunsumer">
                        </div> -->
               
             
           
           
       
              
           
                <div class="text-center" style="    margin-top: 34px;margin-bottom: 25px;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>

            </div>
          </div>

        </div>
        </section>
  </main>

  @include('Dashboard.dashboardfooter')