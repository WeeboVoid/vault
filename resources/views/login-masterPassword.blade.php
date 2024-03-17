<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>





        body, html {
            height: 100%;
            margin: 0;
        }
        .bg {
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .form-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            width: 120%;
            max-width: 500px;
            padding: 15px;
            margin: auto;
            text-align: center;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }

        .radio:checked+div {
            border-color: #4F46E5;
        }

        .radio:focus+div {
            box-shadow: 0 0 0 2px #C7D2FE;
        }

        .generate-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .generate-container input[type="number"],
        .generate-container input[type="text"] {
            margin: 0;
            text-align: center;
            flex-grow: 0.3;
        }

        .generate-container button {
            padding: 0.5rem 1rem;
            background-color: #54397e;
            color: white;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .generate-container button:hover {
            background-color: #4338CA;
        }
        .bg-gray-100{
    background: linear-gradient(135deg, #b19cd9 0%, #6a5acd 100%);
    }
  
      /* Apply the gradient to the entire body of the page for a full canvas of light and dark purples */
    body {
        /* background: linear-gradient(135deg, #b19cd9 0%, #6a5acd 100%); A blend from gentle light purple to a deep, dark purple */
        min-height: 100vh; /* Ensure the gradient covers full height of the viewport */
        background: linear-gradient(135deg, #C7C5F4, #776BCC);	
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* A clean, modern font choice */
        /* background-image: url('{{ asset('assets/images/temp-bg.png') }}'); */
        background-repeat: no-repeat;
        background-position: center center;
      background-size: cover; 
    }
    /* Card styling to maintain readability and elegance */
    .card {
        background-color: rgba(255, 255, 255, 0.85); /* Semi-transparent white for a soft, frosted look */
        border: none;
        border-radius: 8px; /* Rounded edges for a smoother look */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* A subtle shadow for depth */
        
    }
    
    /* .card-header, .btn-primary { */
        /* background-color: #54397e; A deep, rich purple for contrast and elegance */
        /* color: #fff; White text to stand out */
        /* text-align: center; */
    /* } */
    
    .card-header
  {
      margin-top: -21px; /* Remove bottom margin */
      background-color: #54397e; /* A deep, rich purple for contrast and elegance */
      color: #fff; /* White text to stand out */
      text-align: center;
      padding: 1rem; /* Add padding for spacing */
      
  }
    /* Ensuring inputs and buttons are distinctly interactive */
    /* .form-control, .form-check-input { */
        /* border-radius: 4px; Softly rounded edges for a friendly touch */
        /* border: 1px solid #ccc; A subtle border for definition */
        /* width:90%; */
        /* text-align: left; */
    /* } */
    
    .form-control:focus, .form-check-input:focus {
        border-color: #8a2be2; /* Focus with a vibrant purple border */
        box-shadow: 0 0 0 0.2rem rgba(138, 43, 226, 0.25); /* A soft, glowing halo for emphasis */
        text-align: left;
    }
    
    /* Error messages and links stand out for immediate attention */
    .invalid-feedback, .text-danger, .btn-link {
        color: #f8d7da; /* Soft pink for visibility and contrast */
    }
    
    .btn-link:hover {
        color: #f8d7da; /* A gentle hover effect to indicate interactivity */
    }
    
    /* Enhancing the overall feel with button dynamics */
    /* .btn-primary {
      background-color: #54397e;
        border: none;
        transition: background-color 0.3s ease; /* Smooth transition for a tactile feel 
    } */
    
    .btn-primary:hover {
        background-color: #472a77; /* A slightly lighter purple on hover for interaction feedback */
    }
    
    /* Tailor the captcha to align with our enchanted theme */
    .g-recaptcha {
        margin-bottom: 20px; /* Ensures spacing is consistent */
    }
    
    /* Lastly, ensuring all text is legible against the gradient */
    .container-body, .form-check-label {
   
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
  
    }
    
    /* Apply these styles to your stylesheet to transform your entire page into a realm of purples, where light and dark shades merge in a dance of elegance and mystery. Adjust the gradient's colors and direction as you see fit to perfectly match your vision. */
      
      /* Extend the gradient to the navbar and style the login/register buttons with a modern touch */
    .navbar {
        background: linear-gradient(135deg, #b19cd9 0%, #6a5acd 100%); /* Harmonizing with the body's gradient */
        padding: 1rem 2rem; /* Generous padding for a spacious layout */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* A subtle shadow for depth */
    }
    
    .navbar a, .navbar .navbar-brand {
        color: #fff; /* Ensuring all text in the navbar is bright and visible */
        transition: color 0.3s ease; /* Smooth transition for hover effects */
    }
    
    .navbar a:hover, .navbar .navbar-brand:hover {
        color: #f0e8ff; /* A lighter shade for hover, adding a subtle interactive cue */
    }
    
    /* Styling the login and register buttons for a modern, standout look */
    .btn-login, .btn-register {
        background-color: transparent; /* A clear background to contrast against the gradient */
        border: 2px solid #fff; /* White border to make them stand out */
        color: #fff; /* White text for visibility */
        transition: all 0.3s ease; /* Smooth transition for mouse hover effects */
    }
    
    .btn-login:hover, .btn-register:hover {
        background-color: #fff; /* Switch to a solid background on hover */
        color: #6a5acd; /* Change text color to dark purple for a striking effect */
    }
    
    /* Now, apply a modern style to the entire header, ensuring it integrates seamlessly with our mystical theme. This approach not only enhances the aesthetic appeal but also ensures a cohesive user experience from top to bottom. */
    
    /* Remember, the class names .btn-login and .btn-register are placeholders. Replace them with the actual class or ID identifiers used in your HTML for the login and register buttons. This will ensure the styles are applied correctly. */
    
    /* Card styling to incorporate the gradient in a modern way */
    .card {
       background: linear-gradient(90deg, #5D54A4, #7C78B8);		
      position: center;	
      height: 530px;
      width: 400px;	
      box-shadow: 0px 0px 24px #5C5696;
      z-index: 1;
    }
    
    /* Since the card will now be darker, we may need to adjust the text color for contrast */
  
    
    .card-body
    {
      position: center;	
      height: 100%;
      color: white;
      z-index:2;
      
      
    }
    /* We'll also need to adjust input and button styles to fit the new design */
    .form-control {
      background: linear-gradient(90deg, #b9b3e5, #c8c5ec);
      background-color: #fff; /* Light background for the inputs for contrast */
      border: 1px solid #ddd; /* A light border that's still visible on the gradient */
      color: #333; /* Dark text for readability */
      padding: 15px; /* Adjust padding according to your design */
      width: 90%;
      border-radius: 4px; /* Softly rounded edges for a friendly touch */
      border: 1px solid #ccc; /* A subtle border for definition */
      text-align: left;
      margin-left:22px;
      /* margin-top:15px; */
  }
    
    .btn-primary {
        /* color: #6a5acd; Dark purple text to match the overall theme */
        border: 1px solid #6a5acd; /* A border to tie it into the theme */
        transition: all 0.3s ease; /* Smooth transition for mouse hover effects */
        font-size: 1.2rem; /* Increase font size for a larger button */
        padding: 12px 60px;
        /* margin-left: 10px; */
        color:white;
        background-color: #623d9c;
    }
    
    .btn-primary:hover {
        background-color: #442be686; /* Dark purple background on hover */
        color: #fff; /* White text on hover for contrast */
    }
    
    /* Adjust the link color for readability against the new background */
    a {
        color: #f8d7da; /* Soft pink for visibility and contrast */
    }
    
    a:hover {
        color: #fff; /* White on hover to maintain readability */
    }
    .form-check-input {
    margin-left:40px;
  }
    .text-just
    {
        text-justify: auto;
        color:#fff;
        font-size: 130%;
        
    }
    .form-control {
    background: linear-gradient(90deg, #b9b3e5, #c8c5ec);
    background-color: #fff; /* Light background for the inputs for contrast */
    border: 1px solid #ddd; /* A light border that's still visible on the gradient */
    color: #333; /* Dark text for readability */
    padding: 15px; /* Adjust padding according to your design */
    width: 90%;
    border-radius: 4px; /* Softly rounded edges for a friendly touch */
    border: 1px solid #ccc; /* A subtle border for definition */
    text-align: left;
    margin: auto; /* Center horizontally */
}
    </style>
</head>
<body>
    
    <div class="bg d-flex align-items-center justify-content-center">
        <div class="login-form">
            <form action="/checkMasterPassword" method="POST">
                @csrf
                <div class="form-group">
                    @if(isset($error))
                    <div style="color: red; font-size: 20px;">
                          {{ $error }}
                      </div>
                      @endif
                      <br><br>
                    <label for="master_password_login" class="text-just"><strong> Master Password</strong></label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="master_password_login" name="master_password_login" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <span >&#128065;</span>
                            </button>
                        </div>
                    </div>
                    @error('master_password_login')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $("#togglePassword").click(function(){
            $(this).toggleClass("active");
            var type = $(this).hasClass("active") ? "text" : "password";
            $("#master_password_login").attr("type", type);
            // Change eye icon
            $("#eyeIcon").html(type === "text" ? "&#128065;" : "&#128064;");
        });
    </script>
</body>
</html>
