@extends('layouts.app')

@section('content')

<!-- Using Tailwind CSS for modern, responsive design -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script> <!-- Replace 'your-fontawesome-kit.js' with your actual Font Awesome kit script -->

<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-500 to-blue-600">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <div class="text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Register</h2>
            <p class="text-gray-600">Join us and start your journey!</p>
        </div>
        <form class="mt-8 space-y-6" id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Your name">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    <span onclick="togglePasswordVisibility('password')" class="fas fa-eye-slash absolute right-3 bottom-3 cursor-pointer text-gray-600"></span>
                </div>
                <div class="relative">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirm Password">
                    <span onclick="togglePasswordVisibility('password-confirm')" class="fas fa-eye-slash absolute right-3 bottom-3 cursor-pointer text-gray-600"></span>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePasswordVisibility(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const toggleIcon = passwordInput.nextElementSibling;

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var emailPattern = /^\d{10}@iau\.edu\.sa$/;
    var form = document.getElementById('registrationForm');
    var emailInput = document.getElementById('email');

    form.addEventListener('submit', function (event) {
        if (!emailPattern.test(emailInput.value)) {
            event.preventDefault();
            alert('Email is not valid. It should be in the format: 1111111111@iau.edu.sa');
        }
    });
});
</script>
@endsection
