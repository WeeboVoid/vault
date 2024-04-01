<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #C7C5F4, #776BCC);
            min-height: 100vh;
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
        margin-left: 120px;
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
        
    }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="card">
            <h1 class="card-header"><strong>Master Password Generation Form</h1>
            <form id="passwordForm" action="{{ route('register-step2.post') }}" method="POST">
                @csrf
                <input type="hidden" id="masterPassword" name="master_password">
                <fieldset>
                    <legend class="text-just"style=font-size:125%><strong> &nbsp &nbsp Choose a method to get a master  &nbsp&nbsp&nbsp&nbsppassword</strong></legend>
                    <br>
                    <div class="mb-4">
                        <input type="radio" id="random" name="passwordMethod" class="radio hidden" checked>
                        <div class="block p-4 border-2 border-gray-300 rounded-lg">
                            <div class="generate-container">
                                <label for="random" class="text-just">Randomly generated&nbsp;</label>
                                <input type="number" id="length" value="16" min="1" max="128" class="w-16 text-lg font-medium mr-2">
                                <button id="generateRandom" type="button">Generate</button>
                            </div>
                            <input type="text" id="randomPassword"
                                class="form-control" readonly>
                            <!-- Hidden input for master password -->                        </div>
                    </div>
                    <div class="mb-4">
                        <input type="radio" id="arabic" name="passwordMethod" class="radio hidden">
                        <div class="block p-4 border-2 border-gray-300 rounded-lg">
                            <div class="generate-container">
                                <label for="arabic" class="text-just">Rememberable arabic words</label>
                                <button id="generateArabic" type="button">Generate</button>
                            </div>
                            <input type="text" id="arabicPassword"
                                class="form-control" readonly>
                            <!-- Hidden input for master password -->
                        </div>
                    </div>
                    <div class="mb-6">
                        <input type="radio" id="own" name="passwordMethod" class="radio hidden">
                        <div class="block p-4 border-2 border-gray-300 rounded-lg">
                            <label for="own" class="cursor-pointer">
                                <span class="text-just">Use your own password</span>
                                <div class="flex justify-between items-center">
                                    <input type="password" id="userPassword" placeholder="Enter password"
                                        class="form-control">
                                    <button type="button" id="togglePassword" class="ml-2 text-blue-500">
                                        <!-- Eye Open Icon (Visible by default) -->
                                        <svg id="eyeOpenIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            style="display:block;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                                        </svg>
                                        <!-- Eye Closed Icon (Hidden by default) -->
                                        <svg id="eyeClosedIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            style="display:none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .635-2.023 2.088-3.676 4.043-4.908M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c1.221 0 2.395.219 3.463.625M21.542 12C20.268 16.057 16.477 19 12 19c-.633 0-1.25-.076-1.846-.225M15.537 9.587l.707-.707M17.681 7.444l.707-.707M19.825 5.3l.707-.707M22 12a10.013 10.013 0 01-.215 1.801m-.394 1.196l.609.609M4.222 19.778l.707-.707" />
                                        </svg>
                                    </button>
                                </div>
                            </label>
                            <!-- Hidden input for master password -->
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-purple-900 text-white font-bold py-2 px-4 rounded transition-colors duration-300 ease-in-out hover:bg-indigo-800 focus:outline-none focus:shadow-outline">
                        Save
                    </button>
                </fieldset>
            </form>
        </div>
    </div>

    

    <script>
       document.addEventListener('DOMContentLoaded', function () {
    const arabicPhrases = [
        'بِسْمِ-الله-الرَّحْمٰنِ-الرَّحِيْمِ',
        'الحمدلله-رب-العالمين',
        'الرحمن-الرحيم-مالك-يوم-الدين',
        // ... more phrases
    ];

    // Function to generate a random password
    function generateRandomPassword(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789ءآأؤإئابةتثجحخدذرزسشصضطظعغفقكلمنهوىي';
        let result = '';
        const charactersLength = characters.length;
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    // Function to select an Arabic phrase as a password
    function generateArabicPassword() {
        const randomIndex = Math.floor(Math.random() * arabicPhrases.length);
        return arabicPhrases[randomIndex];
    }

    // Handling password generation for the random method
    document.getElementById('generateRandom').addEventListener('click', function () {
        const length = document.getElementById('length').value;
        const randomPassword = generateRandomPassword(length);
        document.getElementById('randomPassword').value = randomPassword;
        // Update the master password hidden input
        document.getElementById('masterPassword').value = randomPassword;
    });

    // Handling password generation for the Arabic method
    document.getElementById('generateArabic').addEventListener('click', function () {
        const arabicPassword = generateArabicPassword();
        document.getElementById('arabicPassword').value = arabicPassword;
        // Update the master password hidden input
        document.getElementById('masterPassword').value = arabicPassword;
    });

    // Toggling password visibility for the custom password method
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        const password = document.getElementById('userPassword');
        const eyeOpenIcon = document.getElementById('eyeOpenIcon');
        const eyeClosedIcon = document.getElementById('eyeClosedIcon');
        const passwordType = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', passwordType);
        // Toggle icons
        eyeOpenIcon.style.display = passwordType === 'password' ? "none" : "block";
        eyeClosedIcon.style.display = passwordType === 'password' ? "block" : "none";
    });

    // Update master password when user types their own
    document.getElementById('userPassword').addEventListener('input', function () {
        document.getElementById('masterPassword').value = this.value;
    });

    // Handle method selection and disable/enable inputs accordingly
    document.querySelectorAll('input[name="passwordMethod"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            disableAndClearAll();
            // Enable the appropriate input or button based on the selected method
            switch (this.id) {
                case 'random':
                    document.getElementById('generateRandom').disabled = false;
                    document.getElementById('length').disabled = false;
                    document.getElementById('length').focus();
                    break;
                case 'arabic':
                    document.getElementById('generateArabic').disabled = false;
                    document.getElementById('generateArabic').focus();
                    break;
                case 'own':
                    document.getElementById('userPassword').disabled = false;
                    document.getElementById('togglePassword').disabled = false;
                    document.getElementById('userPassword').focus();
                    break;
            }
        });
    });

    function disableAndClearAll() {
        document.getElementById('generateRandom').disabled = true;
        document.getElementById('length').disabled = true;
        document.getElementById('randomPassword').value = '';
        document.getElementById('generateArabic').disabled = true;
        document.getElementById('arabicPassword').value = '';
        document.getElementById('userPassword').disabled = true;
        document.getElementById('togglePassword').disabled = true;
        document.getElementById('userPassword').value = '';
    }

    // Initially disable all inputs
    disableAndClearAll();
});

// Handle form submission
document.getElementById('passwordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // You could do additional validation or processing here if needed

    // Submit the form
    this.submit();
});

    </script>



</body>

</html>
