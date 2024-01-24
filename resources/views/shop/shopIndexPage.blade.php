@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Shop</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
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
        <a href="{{route('createShopIndex')}}" class="btn btn-primary" style="float: right;width:154px;margin-bottom: 17px;">Create Shop</a>
        </div>
            <div class="col-lg-12">
                
            <div class="card">
            <div class="card-body">
  
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Si No</th>
                    @if(session('role') == 1)
                    <th scope="col">Office</th>
                    <th scope="col">Market Complex</th>
                    @endif
                    <th scope="col">Floor No</th>
                    <th scope="col">Shop Number</th>
                    <th scope="col">Shop Size (In Sqft)</th>
                    <th scope="col">Electricity Available</th>
                    <th scope="col">Electricity meter No</th>
                    <th scope="col">Electricity Consumer No</th>
                    <th scope="col">Action</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                @php 
                  $i=1;
                  @endphp

                  @foreach($allshop as $shop)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    @if(session('role') == 1)
                    <td>{{$shop->officeName}}</td>
                    <td>{{$shop->mComplexName}}</td>
                    @endif
                    <td>{{$shop->floorNo}}</td>
                    <td>{{$shop->shopNo}}</td>
                    <td>{{$shop->shopSize}}</td>
                    <td>{{$shop->electricityAval}}</td>
                  
                    <td>{{$shop->electricmeterNo}}</td>
                    <td>{{$shop->electricConsumeNo}}</td>
                    
                   
                    <td>  <a href="{{ route('editOffice', ['id' => $shop->id]) }}" >
                      <i class="bi bi-pencil-square"></i></a>
                      <a href="{{ route('deleteOffice', ['id' => $shop->id]) }}" class="delete-btn">
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