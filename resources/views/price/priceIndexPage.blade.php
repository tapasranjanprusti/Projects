@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Price</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Price</li>
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
        <a href="{{route('createPriceIndex')}}" class="btn btn-primary" style="float: right;width:154px;margin-bottom: 17px;">Create Price</a>
        </div>
            <div class="col-lg-12">
                
            <div class="card">
            <div class="card-body">
  
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Si No</th>
                    <th scope="col">Shop No</th>
                    <th scope="col">Office Name</th>
                    <th scope="col">Market complex Name</th>
                    <th scope="col">Price</th>
              
                    <th scope="col">Action</th>
                   
                    
                  </tr>
                </thead>
                <tbody>

                @php 
                  $i=1;
                  @endphp

                  @foreach($allprice as $price)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$price->shopNo}}</td>
                    <td>{{$price->officeName}}</td>
                    <td>{{$price->mComplexName}}</td>
                    <td>{{$price->Price}}</td>
              
                   
                    <td>  <a href="{{ route('editOffice', ['id' => $price->id]) }}" >
                      <i class="bi bi-pencil-square"></i></a>
                      <a href="{{ route('deleteOffice', ['id' => $price->id]) }}" class="delete-btn">
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