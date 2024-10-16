<!--Section: Block Content-->
<!DOCTYPE html>
<html>
<head>
  <title>E-commerce</title>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <div class="container">
      <section>

    <!--Grid row-->
    <div class="row mt-4">

      <!--Grid column-->
      <div class="col-lg-11 m-auto">

        <!-- Card -->
        <div class="card wish-list mb-3">
          <div class="card-body">

            <h5 class="mb-4">Cart (<span>2</span> items)</h5>

            @foreach($products as $product)
            <div class="row mb-4">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                  <img class="img-fluid w-100"
                    src="{{$product['img']}}" alt="Sample">
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6">         
                  <div>
                    <h5>{{$product['title']}}</h5>
                    <p class="text-justify">{{$product['description']}}</p>
                  </div>                      
              </div>
              <div class="col-lg-4 text-center">

                <p class="mb-0 "><span><strong><i class="fa fa-rupee"></i>{{$product['price']}}</strong></span></p>
                <br>
                          
                  <button class="btn btn-md btn-primary "> Add To Cart</button><br>
                  <div class="form-group d-flex mt-4 pull-right">
                    <label class="d-flex mr-4 text-muted">QTY</label>
                    <input type="text" name="quantity" value="1" style="width: 60%" class="form-control qty text-center " id="{{$product['product_id']}}" >
                  </div>
                        
              </div>
            </div>
        
             <hr class="mb-4">
        @endforeach

          </div>
        </div>
     

      </div>
      <!--Grid column-->

      <!--Grid column-->
   
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>
  <!--Section: Block Content-->
  </div>

  <script type="text/javascript">
      $(document).ready(function(){
          $('.qty').on('blur',function(e){
            e.preventDefault();
          })      


      });
  </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
