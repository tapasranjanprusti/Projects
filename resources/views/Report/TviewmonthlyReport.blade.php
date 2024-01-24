@include('Dashboard.dashboardheader')

<style>
    .total-td{
        background-color: #dbffdc !important;
    }
</style>


<main id="main" class="main">

        <div class="pagetitle">
        <h1>View Tenants Monthly Report</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Monthly Report</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
       <div class="row">
        <div class="col-sm-12">
          <div class="table-responsive table-wrapper-scroll-y">
            <table class="table datatable" id="myTable">
              <thead>
                 <tr>
                 <th>Payment No</th>
                 <th>Shop Id</th>
                 <th>Month</th>
                 <th>Year</th>
                 <th>Amount</th>
        
                </tr>
            </thead>
            <tbody>
            @php 
             $i=1;
             $grandTotal = 0;
            @endphp

            @foreach($tenantsPayreport as $tenantrp)
    
          <tr>
            <td>{{$i}}</td>
            <td>{{$tenantrp->shopId}}</td>
            <td> {{$tenantrp->month}} </td>
            <td style="font-family: auto;">{{$tenantrp->year}} </td>
            <td style="font-family: auto;">₹{{$tenantrp->price}}</td>            
         </tr>
        
        <tr>
         <td> </td>
         <td> </td>
         <td> </td>
         <td > Electric Bill</td>
         <td  style="font-family: auto;"><span style="float: left; font-family: auto;">₹ {{$tenantrp->addonElectricprice}}</span></td>  
       </tr> 
      <tr>
      <td> </td>
         <td> </td> 
         <td> </td>
        <td > Total</td>
        <td colspan="1" style="font-family: auto;"><span style="float: left; font-family: auto;">₹ {{$tenantrp->price + $tenantrp->addonElectricprice}}</span>
        </td>
     </tr> 
     @php 
                  $i++;
                  $grandTotal += $tenantrp->price + $tenantrp->addonElectricprice;
                  @endphp
     @endforeach

     <tr>
     <td> </td>
         <td> </td>
         <td> </td>

                            <td><strong>Grand Total</strong></td>
                            <td>
                                <span style="float: left;">₹{{ $grandTotal }}</span>
                            </td>
                        </tr>

   </tbody>
                      
    </table>
  </div>
</div>
</div>
</div>
        </div>
        </section>
</main>



@include('Dashboard.dashboardfooter')