@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Market Complex</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Market Complex</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="col-lg-12">
        <a href="{{route('createMcomplexIndex')}}" class="btn btn-primary" style="float: right;width:154px;margin-bottom: 17px;">Create Market-Complex</a>
        </div>
            <div class="col-lg-12">
                
            <div class="card">
            <div class="card-body">
  
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Si No</th>
                    <th scope="col">Office Id</th>
                    <th scope="col">Complex Name</th>
                    <th scope="col">At</th>
                    <th scope="col">Po</th>
                    <th scope="col">City</th>
                    <th scope="col">Pin</th>
                    <th scope="col">District</th>
                    <th scope="col">N.Floor</th>
                    <th scope="col">N.Shop</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                @php 
                  $i=1;
                  @endphp

                  @foreach($allcomplex as $complex)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$complex->officeId}}</td>
                    <td>{{$complex->mComplexName}}</td>
                    <td>{{$complex->at}}</td>
                    <td>{{$complex->po}}</td>
                    <td>{{$complex->city}}</td>
                    <td>{{$complex->pin}}</td>
                    <td>{{$complex->district}}</td>
                    <td>{{$complex->noOfFloor}}</td>
                    <td>{{$complex->noOfShop}}</td>
                   
                    <td>  <a href="{{ route('editOffice', ['id' => $complex->id]) }}" >
                      <i class="bi bi-pencil-square"></i></a>
                      <a href="{{ route('deleteOffice', ['id' => $complex->id]) }}" class="delete-btn">
                       <i class="bi bi-trash-fill"></i>
                    </td>

                  </tr>
                  @php 
                  $i++;
                  @endphp
                 @endforeach
          
                </tbody>
              </table>
          

            </div>
          </div>

                  
            </div>
        </div>
        </section>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
        $(".delete-btn").on("click", function (event) {
            event.preventDefault();

            var deleteUrl = $(this).attr("href"); // Store the href attribute

            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = deleteUrl; // Redirect using the stored URL
            }
        });
    });
</script>

  @include('Dashboard.dashboardfooter')