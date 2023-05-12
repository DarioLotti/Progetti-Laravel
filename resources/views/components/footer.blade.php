    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white">
      @auth
      @if(!Auth::user()->is_revisor)
      <div class="container-fluid mt-4 p-5 bg-dark text-light">
        <div class="row">
          <div class="col-12 text-center">
            <p>Coderilla.com</p>
            <p>Vuoi lavorare con noi?</p>
            <p>Registrati e clicca qui</p>
            <a href="{{route('become.revisor')}}" class="btn btn-warning text-light shadow my-3">Diventa revisore</a>
          </div>
        </div>    
      </div>
      @endif
      @endauth
      <footer class="bg-dark text-center text-white">
        
        <ul class=" d-flex justify-content-center pt-4">
          <li class="">
            <x-_locale lang="it"/>
          </li>
          <li class="">
            <x-_locale lang="en"/>
          </li>
          <li class="">
            <x-_locale lang="es"/>
          </li>
        </ul>
        
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
              ></a>
              
              <!-- Twitter -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-twitter"></i
                ></a>
                
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-google"></i
                  ></a>
                  
                  <!-- Instagram -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fab fa-instagram"></i
                    ></a>
                    
                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                      ></a>
                      
                      <!-- Github -->
                      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                      ><i class="fab fa-github"></i
                        ></a>
                      </section>
                      <!-- Section: Social media -->
                    </div>
                    <!-- Grid container -->
                    
                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                      © 2020 Copyright:
                      <a class="text-white" href="/">Coderilla.com</a>
                    </div>
                    <!-- Copyright -->
                  </footer>