@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Common Bill</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('UserIndex')}}">Users</a></li>
            <li class="breadcrumb-item active">Create User</li>
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
                   
                  <form action="{{route('storeUser')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf


                     
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" id="uname" name="uname">
                </div>

                   
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Email</label>
                  <input type="text" class="form-control" id="uemail" name="uemail">
                </div>

                   
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mobile</label>
                  <input type="text" class="form-control" id="umob" name="umob">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Password</label>
                  <input type="text" class="form-control" id="upass" name="upass">
                </div>
                
             
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Role</label>
                  <select  class="form-select" id="uRole" name="uRole">
                            <option value="">Choose Role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                 
                </select>
                </div>

                <div class="col-md-6 offhide" >
                  <label for="inputName5" class="form-label">Office</label>
                  <select  class="form-select" id="officeId" name="officeId">
                            <option value="">Choose Office</option>
                            @foreach($alloffice as $office)
                            <option value="{{$office->id}}">{{$office->officeName}}</option>
                           
                            @endforeach
            
                 
                </select>
                </div>

                <div class="col-md-6 comphide">
                  <label for="inputName5" class="form-label">Market Complex</label>
                  <select  class="form-select" id="marketComplex" name="marketComplex">
                            <option value="">Choose Marketcomplex</option>
            
                 
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Image</label>
                  <input type="file" class="form-control" id="uimage" name="uimage">
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
  $('.offhide').hide();
    $('.comphide').hide();

    $('#uRole').on('change', function() {
        var selectedRole = $(this).val();

        if (selectedRole === '2') { 
            $('.offhide').show();
            $('.comphide').show();
        } else {
            $('.offhide').hide();
            $('.comphide').hide();
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





  @include('Dashboard.dashboardfooter')