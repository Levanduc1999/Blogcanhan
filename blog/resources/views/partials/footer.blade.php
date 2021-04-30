
<!-- Footer -->
<footer class="bg-dark text-center text-white " >
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/profile.php?id=100021767024792" role="button"
        ><i class="fa fa-facebook"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fa fa-google"></i
      ></a>

    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="/subscribe" method='Post'>
        {{ csrf_field() }}
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example2" class="form-control"  name="email"/>
              
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->

  

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
       
        <!--Grid column-->

        <!--Grid column-->
        
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-12 col-md-12 mb-12 mb-md-0">
          <h5 class="text-uppercase">Liên lạc</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">0964246501</a>
            </li>
            <li>
              <a href="#!" class="text-white">levanduc1999bn@gmail.com</a>
            </li>
            <li>
              <a href="#!" class="text-white">https://www.facebook.com/profile.php?id=100021767024792</a>
            </li>
           
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
       
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
