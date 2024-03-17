@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Password Vault</title>
@include('sideBar')  
<script src="https://cdn.tailwindcss.com/3.0.14"></script> 
<script src="assets/js/main.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@zxcvbn-ts/core@2.0.0/dist/zxcvbn-ts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@zxcvbn-ts/language-common@2.0.0/dist/zxcvbn-ts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@zxcvbn-ts/language-en@2.0.0/dist/zxcvbn-ts.js"></script>
</head>

<body class="bg-gray-100">
  
<div class="min-h-screen flex flex-col items-center justify-center">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-3xl font-bold text-red-600">VAULT</h1>
      <i class="fas fa-lock text-4xl text-green-500"></i>
      <div dir="rtl" class="text-3xl font-bold text-green-500">خزنة</div>
    </div>

    <div class="mb-4">
      <label for="passwords" class="block text-sm font-medium text-gray-700 mb-1">Saved passwords</label>
      <select id="passwords" class="form-select block w-full mt-1 border-gray-300 rounded-md shadow-sm" onchange="selectPassword()">
        <option value="">Select a password</option>
            @if(isset($dashboardEntries) && $dashboardEntries->count() > 0)
                @foreach($dashboardEntries as $entry)
                    <option value="{{ $entry->yourPassword }}">{{ $entry->yourPassword }}</option>
                @endforeach
            @else
                <option disabled>No passwords found</option>
            @endif
      </select>
    </div>

    <div class="mb-4 relative">
        <label for="test-password" class="block text-sm font-medium text-gray-700 mb-1">Test password</label>
        <input type="password" id="test-password" class="form-input block w-full mt-1 border-gray-300 rounded-md shadow-sm pr-10" oninput="updatePasswordDetails()" onclick="resetDropdown()">
        <span id="togglePassword" class="absolute bottom-0 right-0 pr-3 flex items-center cursor-pointer">
          <i class="fas fa-eye-slash" aria-hidden="true"></i>
        </span>
      </div>
      


    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700 mb-1"> Password Strength </label>
      <div class="w-full bg-gray-300 rounded-full h-2.5 dark:bg-gray-700">
        <div id="password-strength-bar" class="bg-red-400 h-2.5 rounded-full" style="width: 0%"> </div>
        <hr>
      </div>
      <div class="flex justify-between text-xs font-medium text-gray-700 mt-1">
        <span>weak</span>
        <span>Normal</span>
        <span>Strong</span>
      </div>
    </div>
    <div class="block text-sm font-medium text-gray-700" id="passwordStrength">  </div>
    <hr><br>
    <div class="grid grid-cols-2 gap-4 mb-4">
      
      <div>
        <label class="block text-sm font-medium text-gray-700">Characters</label>
        <div id="char-count" class="text-sm">0</div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Numbers</label>
        <div id="number-count" class="text-sm">0</div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Special Character</label>
        <div id="special-char-count" class="text-sm">0</div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Length</label>
        <div id="length-count" class="text-sm">0</div>
      </div>
    </div>
    
    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">compromised</label>
      <div id="compromised-status" class="text-sm">NO</div>
    </div>

  </div>
</div>

<script>
function selectPassword() {
  const selectedPassword = document.getElementById('passwords').value;
  document.getElementById('test-password').value = selectedPassword;
  updatePasswordDetails();
}
function zxcvbnms() {
    const firstName = "{{ $dictionary['firstname'] }}";
    const middlename = "{{ $dictionary['middlename'] }}";
    const lastName = "{{ $dictionary['lastname'] }}";
    const nickname = "{{ $dictionary['nickname'] }}";
    const DOB = "{{ $dictionary['DOB'] }}";
    const phone = "{{ $dictionary['phone'] }}";
    const favcolor = "{{ $dictionary['favcolor'] }}";
    const petname = "{{ $dictionary['petname'] }}";
    const partnername = "{{ $dictionary['partnername'] }}";
    const password = document.getElementById('test-password').value;
    const options = {
        translations: zxcvbnts['language-en'].translations,
        graphs: zxcvbnts['language-common'].adjacencyGraphs,
        dictionary: {
            userInputs: [firstName, middlename, lastName, nickname, DOB, phone, favcolor, petname, partnername],
            ...zxcvbnts['language-common'].dictionary,
            ...zxcvbnts['language-en'].dictionary,
        },
    }
    zxcvbnts.core.zxcvbnOptions.setOptions(options);
    const result = zxcvbnts.core.zxcvbn(password);

    // Construct HTML string for the pattern information
    let patternHTML = '<div><strong>Pattern:</strong>';
    if (result.sequence) {
        patternHTML += '<ul>';
        for (const sequence of result.sequence) {
            if (sequence.pattern !== 'bruteforce') {
                patternHTML += '<li>';
                patternHTML += `<strong>Pattern Type:</strong> ${sequence.pattern} `;
                patternHTML += `<strong>Match:</strong> ${sequence.token} `;
                if (sequence.baseToken !== undefined) {
                    patternHTML += `<strong>Word Base:</strong> ${sequence.baseToken} `;
                }
                if (sequence.repeatCount !== undefined) {
                    patternHTML += `<strong>Repeat Count:</strong> ${sequence.repeatCount} `;
                }
                if (sequence.matchedWord !== undefined) {
                    patternHTML += `<strong>Matched Word:</strong> ${sequence.matchedWord} `;
                }
                patternHTML += `</li>`;
            }
        }
        patternHTML += '</ul>';
    } else {
        patternHTML += 'No pattern information available.</div>';
    }

    // Display the result
    
    document.getElementById('passwordStrength').innerHTML = `
        <div><strong>Feedback:</strong> ${result.feedback.suggestions.join(', ')}</div>
        <div><strong>Warning:</strong> ${result.feedback.warning}</div>
        <div><strong>log:</strong> ${result.guessesLog10}</div>
        ${patternHTML}
    `;
}

function updatePasswordDetails() {
  const password = document.getElementById('test-password').value;
  let characters = (password.match(/[A-Za-z]/g) || []).length;
  let numbers = (password.match(/\d/g) || []).length;
  let specialChars = (password.match(/[~!@#$%^&*+\-\/.,{}[\]();:?<>|'"_]/g) || []).length;
  let length = password.length;

  document.getElementById('char-count').textContent = characters;
  document.getElementById('number-count').textContent = numbers;
  document.getElementById('special-char-count').textContent = specialChars;
  document.getElementById('length-count').textContent = length;
  zxcvbnms();
  const strengthBar = document.getElementById('password-strength-bar');
  const result = zxcvbnts.core.zxcvbn(password);
  calculatePasswordStrength(result.guessesLog10,strengthBar);

  
}


function calculatePasswordStrength(guessesLog10,strengthBar) {
  if (guessesLog10 < 3) {
    strengthBar.className = 'bg-red-400 h-2.5 rounded-full';
    strengthBar.style.width = '0%';
    return 0; // too guessable
  } else if (guessesLog10 < 6) {
    strengthBar.className = 'bg-red-400 h-2.5 rounded-full';
    strengthBar.style.width = '25%';
    return 25; // very guessable
  } else if (guessesLog10 < 8) {
    strengthBar.className = 'bg-yellow-400 h-2.5 rounded-full';
    strengthBar.style.width = '50%';
    return 50; // somewhat guessable
  } else if (guessesLog10 < 10) {
    strengthBar.className = 'bg-blue-400 h-2.5 rounded-full';
    strengthBar.style.width = '75%';
    return 75; // safely unguessable
  } else {
    strengthBar.className = 'bg-green-400 h-2.5 rounded-full';
    strengthBar.style.width = '100%';
    return 100; // very unguessable
  }
}


// Initial call to set the strength meter and counts if a password is pre-selected
updatePasswordDetails();


function resetDropdown() {
  document.getElementById('passwords').value = "";
}

// Toggle password visibility
document.getElementById('togglePassword').addEventListener('click', function(e) {
  const password = document.getElementById('test-password');
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  
  // Toggle the eye/eye-slash icon
  this.querySelector('i').classList.toggle('fa-eye-slash');
  this.querySelector('i').classList.toggle('fa-eye');
});


</script>

</body>
</html>
