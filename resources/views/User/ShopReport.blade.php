@include('User.header')
<style>


* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image:url("assets/userTemp/images/blog/blog-1.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.containerimh {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px; 
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  margin-top: 32px;
}

.btn:hover {
  opacity: 1;
}
</style>
<!-- <main id="main"> -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{route('webIndex')}}">Home</a></li>
    </ol>
    <h2>Report</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" >
  <div class="container" >
<!-- 
  <div class="row">
  <div class="col-lg-7 entries">

<article class="entry">

  <div class="entry-img">
    <img src="{{ asset('assets/userTemp/images/portfolio/reporthome.jpg') }}" alt="" class="img-fluid">
  </div>
</article>
      </div>

      <div class="col-lg-5 entries">
        hhh
      </div>

  </div> -->

  <div class="bg-img">
  <form action="{{route('tenantsPaymentReportPage')}}" method="post" class="containerimh">
    @csrf
  

    <label ><b>Tenant ID</b></label>
    <input type="text" class="form-control" placeholder="Enter Your ID" name="TenantId" required>

    <label><b>Year</b></label>
<select class="form-control" name="fromYear" required>
    <option value="" disabled selected>Select a year</option>
    <script>
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= currentYear - 10; year--) {
            document.write(`<option value="${year}">${year}</option>`);
        }
    </script>
</select>


    <button type="submit" class="btn">Report</button>
  </form>
</div>
    </div>
  
</section>
<!-- </main> -->



@include('User.footer')