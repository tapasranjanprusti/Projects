@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Assin Tenants</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenantsAssignIndex')}}">Assin Tenants</a></li>
            <li class="breadcrumb-item active">Create Assin Tenants</li>
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
                            <option value="{{$tenant->id}}">{{$tenant->name}}</option>
                           
                          @endforeach
                        
                    </select>
                </div>
                @if(session('role') == 1)
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Office</label>
                  <select  class="form-select" id="officeId" name="officeId">
                            <option value="">Choose...</option>
                            @foreach($alloffice as $office)
                            <option value="{{$office->id}}">{{$office->officeName}}</option>
                           
                          @endforeach

                    </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Market Complex</label>
                  <select  class="form-select" id="marketComplex" name="marketComplex">
                            <option value="">Choose...</option>
                 
                    </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Shop Number</label>
                  <select  class="form-select" id="shopId" name="shopId">
                            <option value="">Choose...</option>
             
                    </select>
                </div>
                @else

                              
              <input type="hidden" name="officeId" value="{{session('office') }}">
              <input type="hidden" name="marketComplex" value="{{session('marketComplex')}}">
              <div class="col-md-6">
                  <label for="inputName5" class="form-label">Shop Number</label>
                  <select  class="form-select" id="shopId" name="shopId">
                            <option value="">Choose...</option>
                            @foreach($allshop as $shop)
                            <option value="{{$shop->shopNo}}">{{$shop->shopNo}}</option>

                            @endforeach
             
                    </select>
                </div>
              @endif

             


                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Montly Rent Amount</label>
                  <input type="text" class="form-control" id="mra" name="mra" readonly>
                </div>
              
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Shop License No</label>
                  <input type="text" class="form-control" id="sln" name="sln">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Date Of Allotment Of Shop</label>
                  <input type="date" class="form-control" id="doaos" name="doaos">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Security Deposit</label>
                  <input type="text" class="form-control" id="securityDepo" name="securityDepo">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mode of Security Deposit </label>
                  <select  class="form-select" id="mosd" name="mosd">
                            <option selected>Choose...</option>
                        
                            <option value="0">DD</option>
                            <option value="1">Bank Transfer</option>
                            <option value="1">Cash</option>
                          
                        
                        </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Is Security Deposit Refundable</label>
                  <select  class="form-select" id="isdr" name="isdr">
                            <option selected>Choose...</option>
                        
                            <option value="0">Yes</option>
                            <option value="1">No</option>
                            
                          
                        
                        </select>
                </div>
               

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Tenure of Rent Aggreement(In Years)</label>
                  <input type="text" class="form-control" id="torg" name="torg">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Date of Completion of Aggreement</label>
                  <input type="date" class="form-control" id="docoa" name="docoa">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Is Electricity Bills also to be Payble By Tenants</label>
                  <select  class="form-select" id="iebatbpbt" name="iebatbpbt">
                            <option selected>Choose...</option>
                        
                            <option value="0">Yes</option>
                            <option value="1">No</option>

                          
                        
                        </select>
                </div>
               

       
              
           
                <div class="text-center" style="margin-top: 34px;margin-bottom: 25px;">
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
<script>
$(document).ready(function() {

 
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

        $('#marketComplex').on('change', function () {
            var marketCompId = $(this).val();

            // Make an Ajax request to get Shop Numbers
            $.ajax({
                type: "GET",
                url: '{{ route('getShopNumbers') }}',
                data: { marketCompId: marketCompId },
                success: function (data) {
                    var shopIdSelect = $('#shopId');
                    shopIdSelect.empty();
                    shopIdSelect.append('<option value="">Choose...</option>');

                    $.each(data, function (index, shop) {
                        shopIdSelect.append('<option value="' + shop.shopNo + '">' + shop.shopNo + '</option>');
                    });
                }
            });
        });
    });










  $('#shopId').change(function() {
    var shopNo = $(this).val();
    // alert(shopNo)

    if (shopNo) {
      $.ajax({
        url: '/getShopPrice',
        type: 'GET',
        data: {
          shopNo: shopNo
        },
        success: function(response) {
          if (response && response.price) {
            $('#mra').val(response.price);
          } else {
            $('#mra').val('Price not available');
          }
        },
        error: function() {
          $('#mra').val('Error fetching price');
        }
      });
    } else {
      $('#mra').val('');
    }
  });

</script>

<script>
    // Function to update the "Date of Completion of Agreement" based on tenure and date of allotment
    function updateCompletionDate() {
        var doaos = document.getElementById("doaos").value;
        var torg = parseInt(document.getElementById("torg").value);
        
        if (doaos && torg) {
            var dateOfAllotment = new Date(doaos);
            var completionDate = new Date(dateOfAllotment);
            completionDate.setFullYear(completionDate.getFullYear() + torg);
            
            var docoa = document.getElementById("docoa");
            docoa.value = completionDate.toISOString().substr(0, 10);
        }
    }
    
    // Add event listeners for changes in "Tenure of Rent Agreement" and "Date of Allotment of Shop"
    document.getElementById("torg").addEventListener("input", updateCompletionDate);
    document.getElementById("doaos").addEventListener("input", updateCompletionDate);
</script>



  @include('Dashboard.dashboardfooter')