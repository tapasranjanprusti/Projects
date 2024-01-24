@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Price</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('priceIndex')}}">Price</a></li>
            <li class="breadcrumb-item active">Create Price</li>
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
                   
                  <form action="{{route('storeSetPrice')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
        
             
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Squre Feet</label>
                  <input type="text" class="form-control" name="sqrft" id="sqrft" value="1" readonly>
                
                </div>

               
                
                 
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Price</label>
                  <input type="text" class="form-control" id="priceset" name="priceset">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



