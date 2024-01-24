@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Office</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Office</li>
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
        <a href="{{route('createOficeIndex')}}" class="btn btn-primary" style="float: right;width:154px;margin-bottom: 17px;">Create Office</a>
        </div>
            <div class="col-lg-12">
                
            <div class="card">
            <div class="card-body">
  
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Si No</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Office Id</th>
                    <th scope="col">Office Name</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @php 
                  $i=1;
                  @endphp

                  @foreach($alloffice as $offc)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$offc->created_at->format('d-nm-Y')}}</td>
                    <td>{{$offc->officeId}}</td>
                    <td>{{$offc->officeName}}</td>
                    <td>{{$offc->departmentName}}</td>
                    <td>  <a href="{{ route('editOffice', ['id' => $offc->id]) }}" >
                      <i class="bi bi-pencil-square"></i></a>
                      <a href="{{ route('deleteOffice', ['id' => $offc->id]) }}" class="delete-btn">
                       <i class="bi bi-trash-fill"></i>
                    </td>

                  </tr>
                  @php 
                  $i++;
                  @endphp
                 @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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