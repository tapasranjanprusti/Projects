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
                   
                  <form action="{{route('storePrice')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name of Office</label>
                  <select  class="form-select" id="officeNm" name="officeNm">
                    
                    <option selected>Choose...</option>
                
                    @foreach($alloffice as $office)
                  
                    <option value="{{$office->id}}">{{$office->officeName}}</option>
                    @endforeach
                
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name of Market Complex</label>
                  <select  class="form-select" id="mrktcompNm" name="mrktcompNm">
                    
                    <option selected>Choose...</option>
                
                
                  </select>
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name of shop</label>
                  <select  class="form-select" id="shopNm" name="shopNm">
                    
                    <option selected>Choose...</option>
                  
                
                  </select>
                </div>

               
                
                 
                <div class="col-md-6">
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

  <script>
$(document).ready(function () {
    $('#officeNm').on('change', function () {
        var officeId = $(this).val();

        // alert(officeId)
        if (officeId) {
            $.ajax({
                url: '{{ route('getMarkets') }}',
                type: 'GET',
                  // dataType: "json",
                data: {officeId: officeId},
                success: function (data) {
                    //  console.log(data);
                    $('#mrktcompNm').empty();
                    $('#mrktcompNm').append('<option value="">Choose...</option>');
                    $.each(data, function (index, market) {
                    // Append options using the correct property names
                    $('#mrktcompNm').append('<option value="' + market.complexId + '">' + market.marketComplex + '</option>');
                });
                }
            });
        } else {
            $('#mrktcompNm').empty();
            $('#shopNm').empty();
        }
    });

    $('#mrktcompNm').on('change', function () {
        var marketCompId = $(this).val();
        if (marketCompId) {
            $.ajax({

              url: '{{ route('getShops') }}',
                type: 'GET',
                  // dataType: "json",
                  data: {marketCompId: marketCompId},
                success: function (data) {
                  console.log(data);
                    $('#shopNm').empty();
                    $('#shopNm').append('<option value="">Choose...</option>');
                    $.each(data, function (key, value) {
                        $('#shopNm').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('#shopNm').empty();
        }
    });
 });
</script>


