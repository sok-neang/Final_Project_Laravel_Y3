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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            margin-bottom: 15px;
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
        .upload-btn{
            border: 1px 
            border-style: dashed;
        }
        .upload-btn{
            border: 1px solid var(--primary-color);
            border-style: dashed;

        }
    </style>


    <div class="container login" data-aos="zoom-in" data-aos-duration="1000">
        <div class="form-container m-auto">
            <h2 class="form-title">Register</h2>
            
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group-custom mb-4">
                    <button onclick="document.getElementById('profile').click()" class="d-flex form-control justify-content-center align-items-center form-control-custom rounded-1 py-4 upload-btn">
                        <div>
                            <img id="preview" src="#" alt="Preview" style="display: none; max-width: 50px; border-radius: 50%; margin-left: 10px;">
                            <i class="fa-regular fa-image px-2 text-success"></i>
                            Upload Image
                        </div>
                    </button>
                    <input type="file" class="form-control form-control-custom d-none " onchange="previewImage(event)" name="profile" id="profile" accept="image/*">
                </div>
                
                <div class="input-group-custom mt-4">
                    <i class="fa-solid fa-user input-icon"></i>
                    <input type="text" class="form-control form-control-custom" name="name" id="name" value="{{ old('name') }}" placeholder=" "  required>
                    <label class="input-label" for="name">Name</label><br>
                </div>

                <div class="input-group-custom">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control form-control-custom" name="email" id="email" value="{{ old('email') }}" placeholder=" " required>
                    <label class="input-label" for="email">Email</label><br>
                </div>

                <div class="input-group-custom">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control form-control-custom" name="password" id="password" placeholder=" "  required>
                    <label class="input-label" for="password">Password</label><br>
                </div>

                <div class="input-group-custom">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control form-control-custom" name="password_confirmation" id="password_confirmation" placeholder=" " required>
                    <label class="input-label" for="password_confirmation">Confirm Password</label><br>
                </div>
                
                <button type="submit" class="btn w-100 bg-success text-light">Register</button>
            </form>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
                document.querySelector('.fa-regular').style.display = 'none'; // Hide the icon when an image is selected
            };
            reader.readAsDataURL(file);
            }
        }
    </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init();
    </script>
  </body>
</html>

