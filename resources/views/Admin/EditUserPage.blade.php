@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Create Common Bill</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('UserIndex')}}">Users</a></li>
            <li class="breadcrumb-item active">Edit User</li>
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
                   
                  <form action="{{route('UpdateUser')}}" method="post" enctype="multipart/form-data" class="row g-12">
                  @csrf

                  <input type="hidden" class="form-control"  name="eduseId" value="{{$editUser[0]->id}}">

                     
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Name</label>
                  <input type="text" class="form-control" id="edname" name="edname" value="{{$editUser[0]->name}}">
                </div>

                   
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Email</label>
                  <input type="text" class="form-control" id="edemail" name="edemail" value="{{$editUser[0]->email}}">
                </div>

                   
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mobile</label>
                  <input type="text" class="form-control" id="edmob" name="edmob" value="{{$editUser[0]->Mob}}">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Password</label>
                  <input type="text" class="form-control" id="edpass" name="edpass" value="{{$editUser[0]->password}}">
                </div>
                
             
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Role</label>
                  <select  class="form-select" id="edRole" name="edRole">
                            <option value="">Choose Role</option>
                            <option value="1" @if($editUser[0]->role == 1) selected @endif>Super Admin</option>
                            <option value="2" @if($editUser[0]->role == 2) selected @endif>Admin</option>
                 
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Office</label>
                  <select  class="form-select" id="officeId" name="edofficeId">
                            <option value="">Choose Office</option>
                            @foreach($alloffice as $office)
                            <option value="{{$office->id}}" @if($editUser[0]->officeId == $office->id) selected @endif>{{$office->officeName}}</option>
                           
                            @endforeach
            
                 
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Market Complex</label>
                  <select  class="form-select" id="marketComplex" name="edmarketComplex">
                            <option value="">Choose Marketcomplex</option>
            
                 
                </select>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Image</label>
                  <input type="file" class="form-control" id="edimage" name="edimage">
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

    var officeIdVal=$('#officeId').val();
    var marketComp={{$editUser[0]->marketComplexId}};
    // alert(marketComp)
    $.ajax({
                type: "GET",
                url: '{{ route('getMarketComplexes') }}',
                data: { officeId: officeIdVal },
                success: function (data) {
                    var marketComplexSelect = $('#marketComplex');
                    marketComplexSelect.empty();
                    marketComplexSelect.append('<option value="">Choose...</option>');

                    $.each(data, function (index, marketComplex) {
                        var isSelected = marketComp === marketComplex.id ? 'selected' : '';
                marketComplexSelect.append('<option value="' + marketComplex.id + '" ' + isSelected + '>' + marketComplex.mComplexName + '</option>');
                    
                    });
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