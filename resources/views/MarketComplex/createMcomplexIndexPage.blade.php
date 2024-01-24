@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Market Complex</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('marketComplexIndex')}}">Market Complex</a></li>
            <li class="breadcrumb-item active">Create Market Complex</li>
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
                   
                  <form action="{{route('storeComplex')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name of Office</label>
                  <select  class="form-select" id="offceId" name="offceId">
                    
                    <option selected>Choose...</option>
                    @foreach($alloffice as $offic)
                    <option value="{{$offic->id}}">{{$offic->officeName}}</option>
                    @endforeach
                
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name of Market Complex</label>
                  <input type="text" class="form-control" id="compName" name="compName">
                </div>

                
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">At</label>
                  <input type="text" class="form-control" id="atadd" name="atadd">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Po</label>
                  <input type="text" class="form-control" id="poadd" name="poadd">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">City</label>
                  <input type="text" class="form-control" id="cityadd" name="cityadd">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Pin</label>
                  <input type="text" class="form-control" id="pinadd" name="pinadd">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">District</label>
                  <input type="text" class="form-control" id="distadd" name="distadd">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">No Of Floor</label>
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
                  <label for="inputName5" class="form-label">No Of Shop</label>
                  <input type="text" class="form-control" id="noshop" name="noshop">
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