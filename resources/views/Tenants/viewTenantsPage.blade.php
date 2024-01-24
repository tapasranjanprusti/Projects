@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>View Tenants</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenantsIndex')}}">Tenants</a></li>
            <li class="breadcrumb-item active">View Tenants</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
        <div class="card">
            <div class="card-body">
         
                  <div class="row g-12">
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" value="{{$viewTenants->name}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Address</label>
                  <input type="text" class="form-control" value="{{$viewTenants->add}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Father Name</label>
                  <input type="text" class="form-control" value="{{$viewTenants->fname}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Spouse Name</label>
                  <input type="text" class="form-control" value="{{$viewTenants->spousname}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mobile No</label>
                  <input type="text" class="form-control" value="{{$viewTenants->mob}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Email Id</label>
                  <input type="text" class="form-control" value="{{$viewTenants->email}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Emmergency Contact Number</label>
                  <input type="text" class="form-control" value="{{$viewTenants->emgContact}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Relationsip With Emmergency Contact Number</label>
                  <input type="text" class="form-control" value="{{$viewTenants->relationsipWithContact}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Pan No</label>
                  <input type="text" class="form-control" value="{{$viewTenants->pan}}" readonly>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Adhaar No</label>
                  <input type="text" class="form-control" value="{{$viewTenants->adhaar}}" readonly>
                </div>



            


                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Name</label>
                  <input type="text" class="form-control" value="{{$viewTenants->bankName}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account Number</label>
                  <input type="text" class="form-control" value="{{$viewTenants->bankAccountNo}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account IFSC code</label>
                  <input type="text" class="form-control" value="{{$viewTenants->bankIfsc}}" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Uplord Adhaar</label><br>
                  <img class="viewcropImg" src="{{ asset('images/TenantsImages/' . $viewTenants->adhaarImg) }}" alt="" style="height: 148px;
    width: 30%;">
                </div>
            </div>

            </div>
          </div>

        </div>
        </section>
  </main>

  @include('Dashboard.dashboardfooter')