<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com/3.0.14"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
  <style>
    .password-field {
        border: none;
        background: transparent;
    }
    .toggle-password {
        cursor: pointer;
        margin-left: 5px;
    }
    .search-input {
      padding: 8px;
      margin-bottom: 20px;
      width: 100%;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .highlight {
      background-color: yellow;
    } 

    .bg-gray-200 {
          font-family: 'Roboto', sans-serif;
          background: linear-gradient(135deg, #C7C5F4, #776BCC);
          min-height: 100vh;
    } 
    

  </style>
</head>
<body class="bg-gray-200">
  @include('sideBar')
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <div class="max-w-6xl mx-auto my-10 p-5 bg-white rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Password List</h1>
        <a href="{{ route('dashboard.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fa fa-plus mr-2"></i> Add New Entry
        </a>
        <div>
          <a href="{{ route('dashboard.export') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-file-excel mr-2"></i> Export to Excel
          </a>
        </div>
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-top: 20px;">
          <form action="{{ route('dashboard.import') }}" method="POST" enctype="multipart/form-data" style="text-align: center;">
              @csrf
              <div style="margin-bottom: 10px;">
                  <input type="file" name="excel_file" required/>
              </div>
              <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 24px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                  <i class="fa fa-upload" style="margin-right: 5px;"></i>Import to Excel
              </button>
          </form>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      </div>
    </div>

  

    <!-- Search Input -->
    <input type="text" id="searchInput" onkeyup="searchEntries()" placeholder="Search for entries..." class="search-input">

    <!-- Entries -->
    <div class="overflow-hidden overflow-x-auto border-b border-gray-200 rounded-lg">
      <table class="min-w-full bg-white" id="entriesTable">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" style="width: 200px;">
                  Password
              </th>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Website URL
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
          @forelse($dashboardEntries as $entry)
          <tr class="hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $entry->yourEmail }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <div class="flex items-center justify-end">
                  <input type="password" readonly class="password-field" value="{{ $entry->yourPassword }}" />
                  <i class="fas fa-eye toggle-password"></i>
              </div>
          </td>
            <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
              <a href="{{ $entry->websiteUrl }}" style="color: blue;" target="_blank">{{ $entry->websiteUrl }}</a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a href="{{ route('dashboard.edit', $entry->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('dashboard.destroy', $entry->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this entry?')">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
            <tr>
                <td colspan="4" class="text-center text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                    No entries found.
                </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-password').forEach(function(toggleIcon) {
            toggleIcon.addEventListener('click', function(e) {
                const passwordField = this.previousElementSibling;
                const isPassword = passwordField.getAttribute('type') === 'password';
                if (isPassword) {
                    passwordField.setAttribute('type', 'text');
                } else {
                    passwordField.setAttribute('type', 'password');
                }
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });

    function searchEntries() {
      let input = document.getElementById('searchInput');
      let filter = input.value.toUpperCase();
      let table = document.getElementById('entriesTable');
      let tr = table.getElementsByTagName('tr');

      for (let i = 0; i < tr.length; i++) {
        let tds = tr[i].getElementsByTagName('td');
        let found = false;
        for (let j = 0; j < tds.length; j++) {
          if (tds[j].textContent.toUpperCase().indexOf(filter) > -1) {
            found = true;
            break;
          }
        }
        if (found) {
          tr[i].style.display = "";
        } else if (tr[i].getElementsByTagName('th').length === 0) {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
</body>
</html>
