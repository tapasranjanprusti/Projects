@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>EditTenants</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenantsIndex')}}">Tenants</a></li>
            <li class="breadcrumb-item active">Edit Tenants</li>
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

            <form action="{{route('updateTenants')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                  <input type="hidden" class="form-control" name="edid" value="{{$editTenants->id}}" >

            
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" name="edtname" value="{{$editTenants->name}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Address</label>
                  <input type="text" class="form-control" name="edAdd" value="{{$editTenants->add}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Father Name</label>
                  <input type="text" class="form-control" name="edfnm" value="{{$editTenants->fname}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Spouse Name</label>
                  <input type="text" class="form-control" name="edSpouse" value="{{$editTenants->spousname}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mobile No</label>
                  <input type="text" class="form-control" name="edMob" value="{{$editTenants->mob}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Email Id</label>
                  <input type="text" class="form-control" name="edEmail" value="{{$editTenants->email}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Emmergency Contact Number</label>
                  <input type="text" class="form-control" name="edCnum" value="{{$editTenants->emgContact}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Relationsip With Emmergency Contact Number</label>
                  <input type="text" class="form-control" name="edRwecn" value="{{$editTenants->relationsipWithContact}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Pan No</label>
                  <input type="text" class="form-control" name="edPan" value="{{$editTenants->pan}}" >
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Adhaar No</label>
                  <input type="text" class="form-control" name="edAdhaar" value="{{$editTenants->adhaar}}" >
                </div>



            


                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Name</label>
                  <input type="text" class="form-control" name="edbanknm" value="{{$editTenants->bankName}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account Number</label>
                  <input type="text" class="form-control" name="edBankacc" value="{{$editTenants->bankAccountNo}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Bank Account IFSC code</label>
                  <input type="text" class="form-control" name="edIfsc" value="{{$editTenants->bankIfsc}}" >
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Uplord Adhaar</label><br>
                  <input type="file" name="edAdaahar">
                  <img class="viewcropImg" src="{{ asset('images/TenantsImages/' . $editTenants->adhaarImg) }}" alt="" style="height: 148px;
    width: 30%;">
                </div>

                
           
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