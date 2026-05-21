<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Juntalia</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
   <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <style>
      .footer_section {
         background: #222;
         color: #fff;
         padding: 50px 0;
         display: flex;
         justify-content: center;
         text-align: center;
      }

      .footer_section .container {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 40px;
      }

      .footer_logo {
         font-size: 24px;
         font-weight: bold;
         color: #FF914D;
      }

      .footer_text,
      .useful_text,
      .address_text {
         font-size: 14px;
         color: #bbb;
      }

      .footer_menu ul,
      .subscribe_menu ul,
      .social_icon ul {
         list-style: none;
         padding: 0;
         margin: 0;
      }

      .footer_menu ul li,
      .subscribe_menu ul li {
         margin-bottom: 8px;
      }

      .footer_menu ul li a,
      .subscribe_menu ul li a {
         color: #fff;
         text-decoration: none;
         transition: 0.3s;
      }

      .footer_menu ul li a:hover,
      .subscribe_menu ul li a:hover {
         color: #FF914D;
      }

      .map_icon a {
         display: flex;
         align-items: center;
         color: #bbb;
         text-decoration: none;
      }

      .map_icon a:hover {
         color: #FF914D;
      }

      .social_icon ul {
         display: flex;
         justify-content: center;
         gap: 10px;
         padding: 0;
      }

      .social_icon ul li a {
         display: flex;
         align-items: center;
         justify-content: center;
         width: 35px;
         height: 35px;
         background: rgb(187, 61, 61);
         border-radius: 30%;
         color: #fff;
         font-size: 18px;
         transition: 0.3s;
      }

      .social_icon ul li a:hover {
         background: #FF6200;
      }

      .social_icon ul li a img {
         width: 24px;
         height: 24px;
         object-fit: contain;
      }

      .copyright_section {
         background: #111;
         text-align: center;
         padding: 10px 0;
      }
   </style>
</head>

<body>
   @include('menu')
   <div class="footer_section">
      <div class="container">
         <div class="col-lg-3 col-md-6">
            <h2 class="footer_logo">Juntalia</h2>
            <p class="footer_text">Tu evento, más fácil y a tu alcance</p>
         </div>
         <div class="col-lg-3 col-md-6">
            <h2 class="useful_text">Contacto</h2>
            <p class="address_text">Universidad Nacional sede Manizales</p>
            <p class="address_text">Teléfono: +57 3334444555</p>
            <p class="address_text">Email: comunicaciones@juntalia.com</p>
         </div>
         <div class="col-lg-3 col-md-6">
            <h2 class="useful_text">Síguenos</h2>
            <div class="social_icon">
               <ul>
                  <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
                  <li><a href="https://www.x.com/"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                  <li>
                     <a href="https://www.temu.com/">
                        <img src="{{asset('assets/images/temu-icon.png')}}" alt="Temu">
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">Hecho por Gabriel Franco Obando, David Espitia Zapata y Cristian Andrés Arenas Vargas.</p>
      </div>
   </div>
   <script src="{{asset('assets/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>
