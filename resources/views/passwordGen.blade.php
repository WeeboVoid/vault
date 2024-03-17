<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Password Generator</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");


       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #b19cd9 0%, #6a5acd 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            width: 350px;
            max-width: 100%;
            position: relative;
        }

        .result-container {
            border: solid 1px #000000;
            border-radius: 50px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: relative;
            font-size: 18px;
            letter-spacing: 1px;
            padding: 10px 10px;
            height: 50px;
            width: 100%;
            margin-bottom: 18px;
        }

        .result-container #result {
            word-wrap: break-word;
            max-width: calc(100% - 0px);
            overflow-y: scroll;
            height: 100%;
        }

        #result::-webkit-scrollbar {
            width: 1rem;
        }

        .organize {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        .organize label {
            color: blue;
        }

        .organize input[type="number"] {
            max-width: 50px;
            padding-inline-start: 0.5rem;
            border: 1px solid blue;
            border-radius: 5px;
            outline: none;
        }


        .buttonscss {
            background-color: #6a5acd;
            border: 0;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: 450;
            outline: 0;
            padding: 13px 19px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: all .3s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .buttonscss:before {
            background-color: initial;
            background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
            border-radius: 125px;
            content: "";
            height: 35%;
            left: 4%;
            opacity: .3;
            position: absolute;
            top: 0;
            transition: all .3s;
            width: 92%;
        }

        .buttonscss:hover {
            box-shadow: rgba(255, 255, 255, .2) 0 3px 15px inset, rgba(0, 0, 0, .1) 0 3px 5px, rgba(0, 0, 0, .1) 0 10px 13px;
            transform: scale(1.05);
        }

        .buttonscss:active {
            transform: translateY(2px);
            transition-duration: .35s;
        }

        .checkbox .innerCheckbox {
            position: relative;
        }

        .checkbox .innerCheckbox label {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            height: 28px;
            width: 28px;
            display: block;
        }

        .checkbox .innerCheckbox label:after {
            border: 2px solid #fff;
            border-top: none;
            border-right: none;
            content: "";
            height: 6px;
            left: 8px;
            opacity: 0;
            position: absolute;
            top: 9px;
            transform: rotate(-45deg);
            width: 12px;
        }

        .checkbox .innerCheckbox input[type="checkbox"] {
            visibility: hidden;
            display: none;
            opacity: 0;
        }

        .checkbox .innerCheckbox input[type="checkbox"]:checked+label {
            background-color: blue;
            border-color: black;
        }

        .checkbox .innerCheckbox input[type="checkbox"]:checked+label:after {
            opacity: 1;
        }

        .tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            bottom: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%);
        }

        .tooltip.active {
            opacity: 1;
        }

        .tooltip.errorSymbols {
            background-color: rgba(255, 0, 0, 0.7);
            /* Red background */
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            position: absolute;
            bottom: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%);
        }

        .tooltip.errorSymbols.active {
            opacity: 1;
        }



        .dropDownList select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #ffffff;
            border: 1.5px solid #ccc;
            border-radius: 50px;
            padding: 8px 12px;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            outline: none;
        }

        .dropDownList select:focus {
            border-color: blue;
        }

        .dropDownList select option {
            padding: 8px 12px;
            font-size: 16px;
        }

        .custom-arrow {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .custom-arrow::after {
            content: "\25BC";
            font-size: 16px;
        }


        
    </style>
</head>

<body>
    @include('sideBar')
    <div class="container">
        <div class="result-container">
            <span id="result"></span>
        </div>
        <div>
            <button class="buttonscss" id="generate">Generate</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="buttonscss" id="clipboard">Copy</button>
            <div class="tooltip" id="tooltip">Copied!</div>
            <div class="tooltip errorSymbols" id="tooltipSymbols"></div>
        </div>
        <div>
            <div class="organize">
                <label>Password Length</label>
                <input type="number" id="length" min="4" max="150" value="16">
            </div>
            <div class="organize">
                <label>Include Symbols</label>
                <div class="checkbox">
                    <div class="innerCheckbox">
                        <input type="checkbox" id="symbols" checked>
                        <label for="symbols"></label>
                    </div>
                </div>
            </div>
            <div class="organize" id="numSymbolsSetting" style="display: flex; font-size: 14px;">
                <label>* Number of Symbols*</label>
                <input type="number" id="numSymbols" min="1" max="37" value="4">
            </div>
            <div class="organize">
                <label>Include Numbers</label>
                <div class="checkbox">
                    <div class="innerCheckbox">
                        <input type="checkbox" id="numbers" checked>
                        <label for="numbers"></label>
                    </div>
                </div>
            </div>
            <div class="organize">
                <label>Include Uppercase Letters (A-Z)</label>
                <div class="checkbox">
                    <div class="innerCheckbox">
                        <input type="checkbox" id="uppercase" checked>
                        <label for="uppercase"></label>
                    </div>
                </div>
            </div>
            <div class="organize">
                <label>Include Lowercase Letters (a-z)</label>
                <div class="checkbox">
                    <div class="innerCheckbox">
                        <input type="checkbox" id="lowercase" checked>
                        <label for="lowercase"></label>
                    </div>
                </div>
            </div>

            <div class="dropDownList">
                <label for="passwordHistory">Password History:</label>
                <div style="position: relative;">
                    <select id="passwordHistory">
                        <option>Select a password</option>
                    </select>
                    <div class="custom-arrow"></div>
                </div>
            </div>
        </div>

        <script>
            const resultEl = document.getElementById("result"); // Reference to the element displaying the generated password
            const lengthEl = document.getElementById("length"); // Reference to the input field for specifying the password length
            const uppercaseEl = document.getElementById("uppercase"); // Reference to the checkbox for including uppercase letters in the password
            const lowercaseEl = document.getElementById("lowercase"); // Reference to the checkbox for including lowercase letters in the password
            const numbersEl = document.getElementById("numbers"); // Reference to the checkbox for including numbers in the password
            const symbolsEl = document.getElementById("symbols"); // Reference to the checkbox for including symbols in the password
            const numSymbolsEl = document.getElementById("numSymbols"); // Reference to the input field for specifying the number of symbols in the password
            const generateEl = document.getElementById("generate"); // Reference to the button for generating a new password
            const clipboardEl = document.getElementById("clipboard"); // Reference to the button for copying the generated password to clipboard
            const numSymbolsSetting = document.getElementById("numSymbolsSetting"); // Reference to the container for settings related to the number of symbols
            const tooltip = document.getElementById("tooltip"); // Reference to the tooltip element for displaying copy confirmation

            let numSymbolsStored = 0; // Variable to store the number of symbols when unchecked

            symbolsEl.addEventListener("change", () => {
                if (symbolsEl.checked) {
                    // If symbols checkbox is checked, restore the stored value
                    numSymbolsEl.value = numSymbolsStored;
                    numSymbolsSetting.style.display = "flex";
                } else {
                    // If symbols checkbox is unchecked, store the current value and set it to 0
                    numSymbolsStored = numSymbolsEl.value;
                    numSymbolsEl.value = 0;
                    numSymbolsSetting.style.display = "none";
                }
            });

            clipboardEl.addEventListener("click", () => {
                const password = generatedPassword; // Copy the original generated password
                if (!password) { return; }

                navigator.clipboard.writeText(password).then(() => {
                    tooltip.classList.add("active");
                    setTimeout(() => tooltip.classList.remove("active"), 1350);
                });
            });

            // Define generatedPassword variable outside any function to make it accessible globally
            let generatedPassword = '';
            generateEl.addEventListener("click", () => {
                const length = +lengthEl.value;
                const numSymbols = +numSymbolsEl.value;
                const hasLower = lowercaseEl.checked;
                const hasUpper = uppercaseEl.checked;
                const hasNumber = numbersEl.checked;
                const hasSymbol = symbolsEl.checked;

                // Update generatedPassword with the new generated password
                generatedPassword = generatePassword(length, numSymbols, hasLower, hasUpper, hasNumber, hasSymbol);
                const visiblePassword = generatedPassword.slice(0, 20); // Get the first 20 characters
                const maskedPassword = generatedPassword.length > 20 ? visiblePassword + '...' : visiblePassword; // Add three dots if password is longer than 20 characters
                resultEl.innerText = maskedPassword;

                savePassword(generatedPassword);
            });

            // Function to generate a random password based on user input
            function generatePassword(length, numSymbols, lower, upper, number, symbol) {
                // Variable to store the generated password
                let generatedPassword = '';

                // Create an array of objects representing different character types based on user input
                const typesArr = [{ lower }, { upper }, { number }].filter(item => Object.values(item)[0]);

                // If no character types are selected, return an empty string
                if (typesArr.length === 0) {
                    return "";
                }

                // If symbols are selected, add the specified number of symbols to the password
                if (symbol) {
                    const symbols = getSymbols(numSymbols);
                    generatedPassword += symbols;
                }

                // Shuffle the array of character types to randomize the order
                typesArr.sort(() => Math.random() - 0.5);

                // Generate the password by looping through the specified length and adding characters of selected types
                for (let i = 0; i < length; i++) {
                    const randomType = typesArr[i % typesArr.length];
                    const funcName = Object.keys(randomType)[0];
                    generatedPassword += randomFunc[funcName]();
                }

                // Trim the password to the specified length and shuffle the characters again
                generatedPassword = generatedPassword.slice(0, length);
                return shuffleString(generatedPassword);
            }

            // Function to retrieve a specified number of random symbols
            function getSymbols(numSymbols) {
                const symbols = '~!@#$%^&*+-/.,\\{}[]();:?<>"\'_'; // Updated symbols list
                let result = '';
                for (let i = 0; i < numSymbols; i++) {
                    result += symbols.charAt(Math.floor(Math.random() * symbols.length));
                }
                return result;
            }

            // Function to generate a random lowercase letter
            function getRandomLower() {
                return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
            }

            // Function to generate a random uppercase letter
            function getRandomUpper() {
                return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
            }

            // Function to generate a random number between 0 and 9
            function getRandomNumber() {
                return String.fromCharCode(Math.floor(Math.random() * 10) + 48);
            }

            // Function to shuffle characters in a string randomly
            function shuffleString(string) {
                // Split the string into an array of characters, shuffle it, then join it back into a string
                return string.split('').sort(() => 0.5 - Math.random()).join('');
            }

            // Object containing references to the random character generation functions
            const randomFunc = {
                lower: getRandomLower, // Reference to getRandomLower function for generating lowercase letters
                upper: getRandomUpper, // Reference to getRandomUpper function for generating uppercase letters
                number: getRandomNumber // Reference to getRandomNumber function for generating numbers
            };


            // Function to handle saving the generated password
            function savePassword(password) {
                // Send a POST request to save the password to the server
                fetch('/save-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ password: password })
                })
                    .then(response => response.json())
                    .then(data => console.log('Password saved:', data))
                    .catch(error => console.error('Error:', error));
            }

            // Function to fetch and display password history from the server
            function fetchPasswordHistory() {
                // Send a GET request to retrieve password history from the server
                fetch('/password-history', {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Update the dropdown menu with retrieved password history
                        const historyDropdown = document.getElementById("passwordHistory");
                        historyDropdown.innerHTML = '<option>Select a password</option>';
                        data.forEach(passwordEntry => {
                            const truncatedPassword = passwordEntry.password.length > 26 ? passwordEntry.password.substring(0, 26) + '...' : passwordEntry.password;
                            const option = document.createElement("option");
                            option.textContent = truncatedPassword;
                            option.value = passwordEntry.password;
                            historyDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching password history:', error);
                    });
            }

            // Event listener triggered when the DOM content is fully loaded
            document.addEventListener('DOMContentLoaded', () => {
                fetchPasswordHistory();    // Fetch the password history from the server and populate the dropdown menu
                
                // Get a reference to the password history dropdown menu
                const passwordHistoryDropdown = document.getElementById("passwordHistory");
                passwordHistoryDropdown.addEventListener("change", (event) => {
                    const selectedPassword = event.target.value;
                    if (selectedPassword !== "Select a password") {
                        copyPasswordToClipboard(selectedPassword);
                    }
                });

                // Function to copy a selected password to the clipboard
                function copyPasswordToClipboard(password) {
                    // Use the Clipboard API to copy the password to the clipboard
                    navigator.clipboard.writeText(password).then(() => {
                        // Display a tooltip indicating successful copy
                        tooltip.classList.add("active");
                        setTimeout(() => tooltip.classList.remove("active"), 1350);
                    }).catch((error) => {
                        console.error('Error copying password to clipboard:', error);
                    });
                }
            });

            // Function executed when the window has fully loaded
            window.onload = function () {
                // Get references to the input fields and tooltip elements
                var lengthField = document.getElementById('length');
                var symbolsField = document.getElementById('numSymbols');
                var tooltip = document.getElementById("tooltip");
                var tooltipSymbols = document.getElementById("tooltipSymbols");

                lengthField.addEventListener('input', function () {
                    // Check if the entered value exceeds the maximum allowed length
                    if (this.value > 150) {
                        // If so, set it to the maximum allowed length
                        this.value = 150;
                    } else if (this.value < 4) {
                        // If the value is less than the minimum allowed length, set it to the minimum
                        this.value = 4;
                    }
                });

                symbolsField.addEventListener('input', function () {
                    // Get the maximum allowed number of symbols based on the password length
                    var maxLength = parseInt(lengthField.value);
                    var numSymbols = parseInt(this.value);
                    var maxAllowedSymbols = Math.min(maxLength, 37); // Ensure symbols don't exceed the minimum of maxLength and 37

                    // Check if the number of symbols exceeds the password length
                    if (numSymbols > maxLength) {
                        // Display a tooltip indicating the issue
                        tooltipSymbols.innerText = "Number of symbols can't be higher than password length";
                        tooltipSymbols.classList.add("active");
                        setTimeout(() => {
                            tooltipSymbols.classList.remove("active");
                        }, 3350);
                        // Set number of symbols to the maximum allowed value
                        this.value = maxAllowedSymbols; // Set number of symbols to the maximum allowed value
                    } else if (numSymbols > 37) {
                        // If the number of symbols exceeds the maximum allowed, set it to the maximum
                        this.value = 37;
                    } else if (numSymbols < 1) {
                        // If the number of symbols is less than 1, set it to 1
                        this.value = 1;
                    }
                });
            }

        </script>
</body>

</html>