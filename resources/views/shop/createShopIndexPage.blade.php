@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Shop</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('shopIndex')}}">Shop</a></li>
            <li class="breadcrumb-item active">Create Shop</li>
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
                   
                  <form action="{{route('storeShop')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf

                  @if(isset($sqrPrice->price))
                    <input type="hidden" value="{{ $sqrPrice->price }}" name="sqrprice" id="sqrprice">
                    @else
                    <input type="hidden" value="" name="sqrprice" id="sqrprice">
                    @endif


                  @if(session('role') == 1)

                  <div class="col-md-6">
               
                  <label for="inputName5" class="form-label">Ofice Name</label>
                  <select  class="form-select" id="officeId" name="officeId">
                            <option value="">Choose Office</option>
                            @foreach($alloffice as $office)
                            <option value="{{$office->id}}">{{$office->officeName}}</option>
                           
                            @endforeach
            
                 
                </select>
                </div>
                    <div class="col-md-6">
          
                  <label for="inputName5" class="form-label">Name of Market Complex</label>
                  <select  class="form-select" id="marketComplex" name="marketComplex">
                    
                    <option selected>Choose...</option>
            
                
                  </select>
                </div>
                @else

                 
                <input type="hidden" name="officeId" value="{{session('office') }}">
                <input type="hidden" name="marketComplex" value="{{session('marketComplex')}}">
                @endif


               
                <div class="col-md-6">
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
                  <label for="inputName5" class="form-label">Price</label>
                  <input type="text" class="form-control" id="shopPrice" name="shopPrice" readonly>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
$(document).ready(function() {
  $('#shopsize').keyup(function() {
    var shopSize = parseFloat($(this).val());
    var sqrPrice = parseFloat($('input[name="sqrprice"]').val());

    if (!isNaN(shopSize) && !isNaN(sqrPrice)) {
      var totalPrice = shopSize * sqrPrice;
      $('#shopPrice').val(totalPrice);
    }else {
                // Show SweetAlert if sqrPrice is empty
                
                Swal.fire({
                    title: 'Error',
                    text: 'Please create square price first',
                    icon: 'error',
                    showConfirmButton: true
                });
                $(this).val("");

            }
  });


  
  $('#officeId').on('change', function () {
            var officeId = $(this).val();

            // Make an Ajax request to get Market Complexes
            $.ajax({
                type: "GET",
                url: '{{ route('getMarketComplexes') }}',
                data: { officeId: officeId },
                success: function (data) {
                    var marketComplexSelect = $('#marketComplex');
                    marketComplexSelect.empty();
                    marketComplexSelect.append('<option value="">Choose...</option>');

                    $.each(data, function (index, marketComplex) {
                        marketComplexSelect.append('<option value="' + marketComplex.id + '">' + marketComplex.mComplexName + '</option>');
                    });
                }
            });
        });

});
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


  @include('Dashboard.dashboardfooter')