<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Juntalia</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('assets/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
   @include('menu')
   <!-- banner section start -->
   <div class="banner_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <div class="carousel-content">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="blog_img"><img src="{{asset('assets/images/blog-img1.png')}}"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="blog_taital_main">
                           <h1 class="blog_text">EVENTO SOCIAL</h1>
                           <p class="lorem_text">Una tarde increíble, rodeado de las personas que más amas, riendo y compartiendo momentos inolvidables con gente de todas las edades.</p>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="carousel-content">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="blog_img"><img src="{{asset('assets/images/blog-img2.png')}}"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="blog_taital_main">
                           <h1 class="blog_text">MATRIMONIO</h1>
                           <p class="lorem_text">Con Juntalia, tus sueños se hacen realidad. Gestión de eventos con la más alta calidad, sin complicaciones.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <div class="carousel-content">
                  <div class="row"> 
                     <div class="col-md-6">
                        <div class="blog_img"><img src="{{asset('assets/images/blog-img3.png')}}"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="blog_taital_main">
                           <h1 class="blog_text">JUNTA DIRECTIVA</h1>
                           <p class="lorem_text">Optimiza la gestión de tus reuniones y toma decisiones estratégicas con mayor eficacia.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
      </div>
   </div>
   <!-- banner section end -->

     <!-- Junior Mascot Section Start -->
   <div class="junior_section layout_padding">
      <div class="container text-center">
         <h1 class="testimonial_taital">Conoce a Junior</h1>
         <img src="{{asset('assets/images/Junior-Presentacion.jpeg')}}" alt="Junior" class="img-fluid rounded-circle" style="max-width: 300px; border: 5px solid rgb(194, 66, 66);">
         <p class="junior_text mt-4">Junior es la <span class="junior_highlight">alegre mascota</span> de Juntalia, siempre listo para <span class="junior_highlight">animar cualquier evento</span>. Nació en medio de un festival local y desde entonces ha sido el alma de cada celebración. Con su <span class="junior_highlight">sonrisa contagiosa</span> y <span class="junior_highlight">energía infinita</span>, Junior nos recuerda la importancia de disfrutar cada momento al máximo.</p>
      </div>
   </div>
   <!-- Junior Mascot Section End -->

   <!-- categories section end --> 

            <!-- testimonial section start -->
   <div class="testimonial_section layout_padding">
   <div class="container">
      <h1 class="testimonial_taital">Nuestros usuarios más destacables</h1>
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="testimonial_container">
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user1.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Jota Mario</h4>
                     <p class="many_text">"Pude conocer eventos que jamas pense, increible."</p>
                  </div>
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user2.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Maluma</h4>
                     <p class="many_text">"Paz, chajaja."</p>
                  </div>
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user3.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Suso </h4>
                     <p class="many_text">"JAAAAAAAAAAAA brutal."</p>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="testimonial_container">
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user4.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Germán Pachón</h4>
                     <p class="many_text">"Increible, lo mejor para gestionar mis eventos empresariales."</p>
                  </div>
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user5.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Pedro Coral Tavera</h4>
                     <p class="many_text">"Por fin encontre donde hacer mis eventos.!!!!!!"</p>
                  </div>
                  <div class="testimonial_card">
                     <img src="{{asset('assets/images/user6.jpg')}}" class="customer_img">
                     <h4 class="customer_text">Beatriz Pinzón</h4>
                     <p class="many_text">"Más feliz que tres!!!!"</p>
                  </div>
               </div>
            </div>
         </div>
            <!-- testimonial section end -->
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
            </a>
               
         </div>
      @include('eventosCercanos')
      
      </div>
      <!-- layout main section end -->
      @include('footer')
      <!-- Javascript files-->
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/popper.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('assets/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('assets/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>