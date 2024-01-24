@include('Dashboard.dashboardheader')

  <main id="main" class="main">

        <div class="pagetitle">
        <h1>Update Office</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('OficeIndex')}}">Office</a></li>
            <li class="breadcrumb-item active">Update Office</li>
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
                   
                  <form action="{{route('updateOffice')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name of Office</label>
                  <input type="hidden" class="form-control" id="editId" name="editId" value="{{$editoffice->id}}">

                  <input type="text" class="form-control" id="edtofficeNm" name="edtofficeNm" value="{{$editoffice->officeName}}">
                </div>
           
           
               
                <div class="col-md-12">
                  <label for="inputState" class="form-label">Name of Parent Department</label>
                  <select  class="form-select" id="edtdeptNm" name="edtdeptNm">
                    <option selected>Choose...</option>
                    @foreach($alldepartment as $dept)
                    <option value="{{$dept->id}}" @if($editoffice->departmentId == $dept->id) selected @endif>{{$dept->departmentName}}</option>
                    @endforeach
                  </select>
                </div>
              
           
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                
                </div>
              </form>

            </div>
          </div>

        </div>
        </section>
  </main>

  @include('Dashboard.dashboardfooter')