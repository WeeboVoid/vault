@extends('layouts.app')

@section('js')
    {!! NoCaptcha::renderJs() !!}
@endsection
@section('content')


<style>
  /* Apply the gradient to the entire body of the page for a full canvas of light and dark purples */
body {
    background: linear-gradient(135deg, #b19cd9 0%, #6a5acd 100%); /* A blend from gentle light purple to a deep, dark purple */
    min-height: 100vh; /* Ensure the gradient covers full height of the viewport */
    color: #fff; /* Light text for readability against the dark background */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* A clean, modern font choice */
}

/* Card styling to maintain readability and elegance */
.card {
    background-color: rgba(255, 255, 255, 0.85); /* Semi-transparent white for a soft, frosted look */
    border: none;
    border-radius: 8px; /* Rounded edges for a smoother look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* A subtle shadow for depth */
}

.card-header, .btn-primary {
    background-color: #54397e; /* A deep, rich purple for contrast and elegance */
    color: #fff; /* White text to stand out */
}

/* Ensuring inputs and buttons are distinctly interactive */
.form-control, .form-check-input {
    border-radius: 4px; /* Softly rounded edges for a friendly touch */
    border: 1px solid #ccc; /* A subtle border for definition */
}

.form-control:focus, .form-check-input:focus {
    border-color: #8a2be2; /* Focus with a vibrant purple border */
    box-shadow: 0 0 0 0.2rem rgba(138, 43, 226, 0.25); /* A soft, glowing halo for emphasis */
}

/* Error messages and links stand out for immediate attention */
.invalid-feedback, .text-danger, .btn-link {
    color: #f8d7da; /* Soft pink for visibility and contrast */
}

.btn-link:hover {
    color: #f8d7da; /* A gentle hover effect to indicate interactivity */
}

/* Enhancing the overall feel with button dynamics */
.btn-primary {
    border: none;
    transition: background-color 0.3s ease; /* Smooth transition for a tactile feel */
}

.btn-primary:hover {
    background-color: #472a77; /* A slightly lighter purple on hover for interaction feedback */
}

/* Tailor the captcha to align with our enchanted theme */
.g-recaptcha {
    margin-bottom: 20px; /* Ensures spacing is consistent */
}

/* Lastly, ensuring all text is legible against the gradient */
.container, .form-check-label {
    color: #333; /* Dark text for contrast against the lighter card background */
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
    background: linear-gradient(135deg, rgba(177, 156, 217, 0.95) 0%, rgba(106, 90, 205, 0.95) 100%); /* A gradient similar to the body, but with opacity for text readability */
    border: 1px solid #6a5acd; /* A border to define the card's edge */
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1); /* A subtle shadow for a 3D effect */
    border-radius: 10px; /* Rounded corners for a modern look */
    color: #fff; /* Light text for readability against the gradient */
    padding: 20px; /* Sufficient padding for content */
    margin-top: 20px; /* Ensuring the card doesn't touch other elements */
}

/* Since the card will now be darker, we may need to adjust the text color for contrast */
.card-header, .card-body {
    color: #fff; /* Ensures text is readable on the darker background */
}

/* We'll also need to adjust input and button styles to fit the new design */
.form-control, .form-check-input {
    background-color: #fff; /* Light background for the inputs for contrast */
    border: 1px solid #ddd; /* A light border that's still visible on the gradient */
    color: #333; /* Dark text for readability */
}

.btn-primary {
    background-color: #fff; /* Light background for the button to stand out */
    color: #6a5acd; /* Dark purple text to match the overall theme */
    border: 1px solid #6a5acd; /* A border to tie it into the theme */
    transition: all 0.3s ease; /* Smooth transition for mouse hover effects */
}

.btn-primary:hover {
    background-color: #6a5acd; /* Dark purple background on hover */
    color: #fff; /* White text on hover for contrast */
}

/* Adjust the link color for readability against the new background */
a {
    color: #f8d7da; /* Soft pink for visibility and contrast */
}

a:hover {
    color: #fff; /* White on hover to maintain readability */
}


</style>

<title>Login Page</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                {!! NoCaptcha::display() !!}
                            </div>
                            @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection