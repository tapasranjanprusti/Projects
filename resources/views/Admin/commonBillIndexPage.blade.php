@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Common Bill</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Common Bill</li>
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
        <a href="{{route('createCommonBillIndex')}}" class="btn btn-primary" style="float: right;width:154px;margin-bottom: 17px;">New Bills</a>
        </div>
            <div class="col-lg-12">
                
            <div class="card">
            <div class="card-body">
  
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Si No</th>
                    <th scope="col">created Date</th>
                    <th scope="col">Month</th>
                    <th scope="col">OfficeName</th>
                    <th scope="col">Market Complex</th>
                    <th scope="col">Electric Price</th>
                    <th scope="col">Per Tenant ElePrice</th>
                 
                    <th scope="col">Action</th>
                   
                    
                  </tr>
                </thead>
                <tbody>

              @php 
                  $i=1;
                  @endphp

                  @foreach($electricBillPrice as $elbill)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td><?php echo date('d-m-Y',strtotime($elbill->created_at))?></td>
                    <td>{{$elbill->month}}</td>
                    <td>{{$elbill->officeName}}</td>
                    <td>{{$elbill->mComplexName}}</td>  
                    <td>{{$elbill->cElectricPrice}}</td>   
                    <td>{{$elbill->perTenantsElectPrice}}</td>             
                    
                   
                    <td>
                    <a href="{{ route('viewAssignTenants', ['id' => $elbill->id]) }}" >
                      <i class="bi bi-eye-fill"></i></a> 
                     
                      <a href="{{ route('deleteOffice', ['id' => $elbill->id]) }}" class="delete-btn">
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