@include('User.header')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}
/* body {
  background-color: #eeeeee;
  display: flex;
  justify-content: center;
  align-items: center;
}
.container {
  width: 100%;
  max-width: 400px;
  background-color: #fff;
} */
.container > .navrpt {
  background-color: #3996ab;
  height: 120px;
  width: 100%;
  margin-bottom: 2rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: end;
}
.container > nav > img {
  width: 100px;
  position: relative;
  transform: translateY(50%);
  box-shadow: 0 0 0 8px #fff;
  border-radius: 50%;
  background-color: #ffffff;
}
.container > .caption {
  margin-top: 4rem;
  display: flex;
  flex-direction: column;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  width: fit-content;
  text-align: center;
  color: #222;
  line-height: 1.4;
}
.container > .caption > h5 {
  font-size: 17px;
  letter-spacing: 1px;
}
.container > .orders-box {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  position: relative;
}
.container > .orders-box > .order {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
  color: #000;
  margin-bottom: 1.5rem;
}
.container > .orders-box > .order > span:nth-of-type(1) {
  margin: 0 -10px;
  color: #000;
  font-weight: 900;
}
.container > .orders-box > .order > span:not(span:nth-of-type(1)) {
  cursor: pointer;
  font-size: 18px;
}
.container > .orders-box > .order > .box-1 {
  margin: 0 -7px;
  border: 1px solid #a3080c;
  box-shadow: inset 0 0 0 0.7px #a3080c;
  border-radius: 7px;
  color: #000;
  font-weight: 900;
  padding: 5px 7px;
}
.container > .orders-box .order > p {
  font-weight: 600;
}
.container > .orders-box > .order > .xmark-box > i {
  font-size: 16px;
  color: #f3f3f3;
  background-color: #a3080c;
  padding: 5px 8px;
  border-radius: 50%;
  transition: all 0.15s;
  cursor: pointer;
}
.container > .orders-box > .order > .xmark-box > i:hover {
  filter: sepia(60%);
}
.container > .orders-box > .order:nth-of-type(2) > .xmark-box > i {
}

.container > .orders-box > .beverage-box > img {
  width: 27px;
  background-color: #f3f3f3;
  border-radius: 6px;
  border: 1px solid #a3080c;
}

.container > .orders-box > .beverage-box {
  border-radius: 6px;
  cursor: pointer;
  width: 50%;
  padding: 5px;
  background-color: #a3080c;
  color: #f3f3f3;
  letter-spacing: 0.5px;
  font-weight: 100;
  display: flex;
  gap: 0.3rem;
  align-items: center;
  margin-bottom: 1rem;
  transition: all 0.3s;
}
.container > .orders-box > .beverage-box:hover {
  filter: sepia(60%);
}
.container > .orders-box > .bill-box {
  background-color: #f0f0f0;
  color: #333;
  display: flex;
  justify-content: space-between;
  padding: 0.5rem;
  border-radius: 6px;
  line-height: 1.4;
}
.checkout {
  background-color: #3996ab;
  color: #fdf2f2;
  margin-top: 1rem;
  padding: 0.5rem;
  border-radius: 7px;
  text-align: center;
  letter-spacing: 0.4px;
  cursor: pointer;
  transition: all 0.4s ease-out;
  width: 100%;
}
 .checkout:hover {
  background-color: #a3080c;
  color: #e8e8e8;
  width: 100%;
}
@media screen and (min-width: 500px) {
  body {
    height: 100vh;
  }
  .container {
    border-radius: 8px;
  }
  nav {
    border-radius: 8px 8px 0 0;
  }
  .container > .orders-box > .order > span:nth-of-type(1) {
    margin: 0 -20px;
  }
  .container > .orders-box > .order > .box-1 {
    margin: 0 -17px;
  }
}

.red-text {
        color: red;
    }


</style>

<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{route('webIndex')}}">Home</a></li>
    </ol>
    <h2>Report</h2>

  </div>
</section>

<section id="blog" >
  <div class="container" >

  <nav class="navrpt">
      <img src="{{ asset('assets/userTemp/images/reportimg.jpg') }}" alt="o">
    </nav>
    <div class="caption">
      <p>Your Mothly Report</p>
      <h5>PKDA</h5>
    </div>
    <div class="orders-box">
      <div class="order order1">
        <p>Payment No</p>
        <span>|</span>
        <p>Shop ID</p>
        <span>|</span>
       
          <p>Month</p>
       
        <span>|</span>
        <p>Year</p>
        <span>|</span>
        <p>Amount</p>
        <p>Addon Electric Price</p>
   
      </div>
      <hr>
      @php 

      $i=1;
      $subtotal = 0;

      @endphp
      @foreach($paymentDetails as $payment)

      <div class="order order1">
        <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$i}}</p>
      
        <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$payment->shopId}}</p>
     
        
          <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$payment->monthNm}}</p>
      
        <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$payment->year}}</p>

        <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$payment->price}}</p>
        <p class="{{ $payment->month < date('n') ? 'red-text' : '' }}">{{$payment->addonElectricprice}}</p>
    
      </div>
      

      @php 

      $i++;
      $subtotal += $payment->price + $payment->addonElectricprice;

      @endphp
      

      @endforeach

      <div class="bill-box">
        <div class="info">
          <p>Subtotal</p>
        
          <p>Total (TVA Incl.)</p>
        </div>
        <div class="money">
          <p>{{$subtotal}}</p>
         
          <p>{{$subtotal}}</p>
        </div>
      </div>
      <form>
      <input type="submit" class="checkout" value="Checkout">
      </form>
      
    </div>


</div>
</section>

<script src="https://kit.fontawesome.com/8535745612.js" crossorigin="anonymous"></script>




@include('User.footer')