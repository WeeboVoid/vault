@extends('layouts.app')
@include('sideBar')
@section('content')

<style>
    .centered-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
}

body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #C7C5F4, #776BCC);
    min-height: 100vh;
}
.centered-form form {
    width: 100%; /* Adjust this width as needed */
    max-width: 500px; /* Maximum width of the form */
}

.centered-form .form-control {
    width: calc(100% - 16px); /* Full width of the form container minus padding */
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box; /* Includes padding and border in the element's total width and height */
    border: 1px solid #ccc;
    border-radius: 4px;
}

.centered-form button {
    display: block;
    width: calc(100% - 16px); /* Full width of the form container minus padding */
    padding: 10px;
    margin-top: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.centered-form button:hover {
    background-color: #0056b3;
}
</style>

<div class="centered-form min-h-screen bg-gray-100 flex items-center justify-center">
    <form action="{{ route('dashboard.update', $dashboard->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2 class="text-center text-2xl font-bold mb-6">Edit Entry</h2>

        <div class="mb-4">
            <label for="websiteUrl" class="block mb-2 text-sm font-bold text-gray-700">Website URL</label>
            <input type="url" class="form-control" name="websiteUrl" id="websiteUrl" required placeholder="https://example.com">
        </div>
        
        <div class="mb-4">
            <label for="yourEmail" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
            <input type="email" class="form-control" name="yourEmail" id="yourEmail" required placeholder="you@example.com">
        </div>
        
        <div class="mb-4">
            <label for="yourPassword" class="block mb-2 text-sm font-bold text-gray-700">New Password (leave blank if unchanged)</label>
            <input type="password" class="form-control" name="yourPassword" id="yourPassword" required placeholder="••••••••">
        </div>
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update
        </button>
    </form>
</div>
@endsection
