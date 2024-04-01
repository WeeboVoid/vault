<!DOCTYPE html>
<html lang="en">

@include('sideBar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include Chart.js DataLabels plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #C7C5F4, #776BCC);
    min-height: 100vh;
            padding-top: 50px; /* Add space at the top */
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 30px 15px;
            background-color: rgba(255, 255, 255, 0.1); /* Transparent background for container */
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1); /* Transparent background for cards */
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2); /* Soft shadow */
            border: 1px solid rgba(255, 255, 255, 0.1); /* Transparent border */
            margin-bottom: 20px; /* Add space between cards */
            transition: transform 0.3s ease; /* Smooth transition */
        }

        .card:hover {
            transform: translateY(-5px); /* Move up on hover */
        }

        .card-header {
            background-color: rgba(0, 123, 255, 0.8); /* Semi-transparent primary color for card header */
            color: #fff; /* White text */
            border-radius: 10px 10px 0 0;
            padding: 10px 15px;
        }

        .card-body {
            padding: 20px;
            text-align: center; /* Center text content */
        }

        #passwordStats ul {
            list-style-type: none; /* Remove list bullet points */
            padding: 0;
            font-size: 20px; /* Larger font size */
        }

        #passwordChart {
            display: none; /* Hide the chart initially */
            width: 100%;
            height: auto;
        }

        #showChartBtn {
            background-color: rgba(0, 123, 255, 0.8); /* Semi-transparent primary color for button */
            color: #fff; /* White text */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px; /* Larger font size */
            margin-top: 20px; /* Add space above the button */
        }

        #showChartBtn:hover {
            background-color: rgba(0, 123, 255, 1); /* Darker shade on hover */
        }

        /* Interactive Animation for Button */
        #showChartBtn:hover {
            transform: scale(1.05); /* Scale up on hover */
        }

        #showChartBtn:active {
            transform: scale(0.95); /* Scale down when clicked */
        }

        /* Stylish Hover Effect for Cards */
        .card:hover {
            transform: translateY(-5px); /* Move up on hover */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3); /* Increase shadow on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Password Manager Dashboard</h2>
            </div>
            <div class="card-body">
                <!-- Text Representation (Displayed by Default) -->
                <div id="passwordStats" class="mt-3">
                    <h4 class="mb-4">Password Statistics</h4>
                    <ul>
                        <li>Total Passwords: {{ $passwordCounts['total'] }}</li>
                        <li>Weak Passwords: {{ $passwordCounts['weak'] }}</li>
                        <!-- <li>Compromised Passwords: {{ $passwordCounts['compromised'] }}</li> -->
                        <li>Strong Passwords: {{ $passwordCounts['strong'] }}</li>
                    </ul>
                    // ToDO: Add more functions Faisal
                </div>
                <!-- Button to Show/Hide Chart -->
                <button id="showChartBtn" onclick="toggleDisplay()">View Chart</button>
                <!-- Chart (Initially Hidden) -->
                <canvas id="passwordChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        function toggleDisplay() {
            var chartDiv = document.getElementById('passwordChart');
            var textDiv = document.getElementById('passwordStats');
            var btn = document.getElementById('showChartBtn');

            if (chartDiv.style.display === 'none') {
                chartDiv.style.display = 'block';
                textDiv.style.display = 'none'; // Hide text
                btn.textContent = 'Hide Chart'; // Change button text
            } else {
                chartDiv.style.display = 'none';
                textDiv.style.display = 'block'; // Show text
                btn.textContent = 'View Chart'; // Change button text back
            }
        }

        // Assuming you pass the passwordCounts object from Laravel to this view
        var ctx = document.getElementById('passwordChart').getContext('2d');
        var passwordChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Total Passwords', 'Weak Passwords', 'Strong Passwords'],
                datasets: [{
                    data: [
                        {{ $passwordCounts['total'] }},
                        {{ $passwordCounts['weak'] }},
                        // {{ $passwordCounts['compromised'] }},
                        {{ $passwordCounts['strong'] }}
                    ],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        // '#FFCE56',
                        '#9966FF'
                    ]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom'
                },
                plugins: {
                    datalabels: {
                        color: '#fff',
                        display: function(context) {
                            return context.dataset.data[context.dataIndex] > 0;
                        },
                        font: {
                            weight: 'bold'
                        },
                        formatter: function(value, context) {
                            return context.chart.data.labels[context.dataIndex] + "\n" + value + '%';
                        }
                    }
                }
            }
        });

        // Hide the chart initially
        window.onload = function() {
            var chartDiv = document.getElementById('passwordChart');
            var textDiv = document.getElementById('passwordStats');
            var btn = document.getElementById('showChartBtn');

            chartDiv.style.display = 'none'; // Hide chart
            textDiv.style.display = 'block'; // Show text by default
            btn.textContent = 'View Chart'; // Change button text initially
        };
    </script>
</body>

</html>
