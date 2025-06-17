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
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
      :root{
        --primary-color:#20B486;
        --secondary-color:#FF9B26;
        --description-color:#646464;
      }
        body {
            background-image: url("https://images.unsplash.com/photo-1562813733-b31f71025d54?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGNvZGluZ3xlbnwwfHwwfHx8MA%3D%3D");
            background-size: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .form-container {
            padding: 40px;
            border-radius: 20px;
            border: 8px solid var(--primary-color);
            box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
                        5px 5px 15px rgba(0, 0, 0, 0.35),
                        inset -5px -5px 15px rgba(255, 255, 255, 0.1),
                        inset 5px 5px 15px rgba(0, 0, 0, 0.35);
            background-color: #223243;
            max-width: 550px;
            width: 100%;
        }
        
        .form-title {
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.1em;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .input-group-custom {
            position: relative;
            margin-bottom: 25px;
        }
        
        .form-control-custom {
            padding: 12px 10px 12px 40px;
            background: #223243;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 25px;
            box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
                        5px 5px 15px rgba(0, 0, 0, 0.35);
            transition: all 0.5s;
        }
        
        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: none;
            outline: none;
        }
        
        .input-icon {
            position: absolute;
            top: 12px;
            left: 16px;
            color: var(--primary-color);
            border-right: 1px solid var(--primary-color);
            padding-right: 10px;
            z-index: 5;
        }
        
        .input-label {
            position: absolute;
            left: 40px;
            top: 12px;
            pointer-events: none;
            transition: all 0.5s;
            padding-left: 10px;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .form-control-custom:focus + .input-label,
        .form-control-custom:not(:placeholder-shown) + .input-label {
            transform: translateY(-25px);
            font-size: 0.75em;
            color: var(--primary-color);
            background: #223243;
            padding: 0 5px;
            left: 35px;
        }
        
        .btn-custom {
            background: var(--primary-color);
            color: #223243;
            border: none;
            border-radius: 25px;
            padding: 10px 0;
            font-weight: 500;
            width: 100%;
            box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.1),
                        5px 5px 15px rgba(0, 0, 0, 0.35);
        }
        
        .form-footer {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9em;
            text-align: center;
            margin-top: 20px;
        }
        
        .form-footer a {
            color: #fff;
            font-weight: 500;
            text-decoration: none;
        }
    </style>
  </head>
  <body>


    <div class="container login">
        <div class="form-container m-auto">
            <h2 class="form-title">Login</h2>
            
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
                <div class="input-group-custom">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder=" ">
                    <label for="email" class="input-label">Admin email</label>
                </div>
                
                <div class="input-group-custom">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" id="password" name="password" placeholder=" ">
                    <label for="password" class="input-label">Admin password</label>
                </div>
                
                <button type="submit" class="btn w-100 bg-success text-light">Login</button>
            </form>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


    <!-- Page content-->
    {{-- <div class="d-flex justify-content-center mt-5 bg-gray-300">
      <div class="card p-3 w-25">
        <h3>Login</h3>
        <form method="POST" action="{{ route('authenticate') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control  @error('password') is-invalid @enderror"
              id="password"
              name="password"
            />
          </div>
          <button type="submit" class="btn btn-success">Login</button>
        </form>
      </div>
    </div> --}}