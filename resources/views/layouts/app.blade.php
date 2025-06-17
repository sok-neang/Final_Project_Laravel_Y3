<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      *{
        padding: 0%;
        margin: 0%;
        box-sizing: border-box
      }
      :root{
        --primary-color:#20B486;
        --secondary-color:#FF9B26;
        --description-color:#646464;
      }
      .text-active{
        color: var(--primary-color);
      }
      .text-description{
        color: var(--description-color);
      }
      h1{
        font-size: 50px;
      }
      .post-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Number of lines to show */
                line-clamp: 2;
        -webkit-box-orient: vertical;
      }
      .btn-login, .btn-logout{
          border: 2px solid #fff;
          border-radius: 10px;
          background-color:var(--primary-color);
      }
      .btn-logout:hover{
        border: 2px solid #fff;
        background-color: var(--primary-color);
      }

      /* Hero banner */
          .highlight {
      color: #1ab07a;
    }
    .btn-green {
      background-color: #1ab07a;
      color: white;
    }
    .btn-outline-green {
      border: 1px solid #1ab07a;
      color: #1ab07a;
    }
    .feature-icon {
      font-size: 1.5rem;
      margin-right: 10px;
      color: #1ab07a;
    }
    .stats-box {
      border-radius: 15px;
      border: 1px solid var(--primary-color);
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      background-color: #fff;
      padding: 10px;
    }
    .brand-logos img {
      max-height: 30px;
      margin: 0 20px;
    }
    .person-img {
      border: 2px solid var(--primary-color);
      background-color: var(--primary-color);
      border-radius: 50%;
      max-width: 100%;
      height: auto;
    }

    /* scroll */
    .scroll-container {
      scrollbar-width: none;
      -ms-overflow-style: none; 
      
    }
    .scroll-container::-webkit-scrollbar {
      display: none; 
    }
    /* ====3D Rotating====  */
    .rotating{
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 80vh;
    }
    .box{
      position: relative;
      width: 150px;
      height: 200px;
      transform-style: preserve-3d;
      animation: animation 20s linear infinite;
    }
    @keyframes animation{
      0%{
        transform: perspective(1000px) rotateY(0deg);
      }
      100%{
        transform: perspective(1000px) rotateY(360deg);
      }
    }
    .box span{
      position: absolute;
      top: 0;
      left: 0;
      width:100%;
      height: 100%;
      transform-origin: center;
      transform-style: preserve-3d;
      transform: rotateY(calc(var(--i)* 45deg)) translateZ(400px) ;
      -webkit-box-reflect:below 0px linear-gradient(transparent, transparent, #0004);
    }
    .box span img{
      position: absolute;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
      object-fit: cover;

    }
    </style>

  </head>
  <body>
    <!-- Responsive navbar-->
      @include('components.navbar')
    <!-- Page content-->
    <div class="container mt-5">
      @yield('content')
    </div>
    <!-- Footer-->
     @include('components.footer')

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
