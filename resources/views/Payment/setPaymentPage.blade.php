@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Generate Payment</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('setPayment')}}">Set Payment</a></li>
            <li class="breadcrumb-item active">Set Payment</li>
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
                @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right;border: unset;background-color: unset;color: red;font-size: 26px;font-weight: bold;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                   
                  <form action="{{route('storeSetPayment')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf
                  <div class="col-md-6">
                  <label for="inputName5" class="form-label">Payment Generate Month</label>
                  <select class="form-control" name="pymentMonth">
                    
                    <option value="">Select Payment Month</option>

                     @foreach($allMonth as $momth)
                     <option value="{{$momth->id}}">{{$momth->month}}</option>

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
                @else

                              
                <input type="hidden" name="officeId" value="{{session('office') }}">
                <input type="hidden" name="marketComplex" value="{{session('marketComplex')}}">

                @endif


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

     
  });

</script>

  @include('Dashboard.dashboardfooter')