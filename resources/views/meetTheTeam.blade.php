<!DOCTYPE html>
<html>
 
<head>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
 
    <!-- linking font awesome for icons -->
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <style>
        /* Whole html box designing */
        html {
            box-sizing: border-box;
        }
 
        /* Body width fixing */
        body {
            max-width: 100%
        }
 
        /* Box sizing depending on parent */
        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }
 
        /* Styling column */
        .column {
            float: left;
            width: 33%;
            margin-bottom: 16px;
            padding: 5px 10px;
        }
 
 
        /* Column width change depends on screen size */
        @media screen and (max-width: 670px) {
            .column {
                width: 100%;
                text-align: none;
            }
        }
 
        /* Card designing */
        .card {
            background-color: white;
        }
 
        .container {
            padding: 0 16px;
        }
 
        /* Icon styling */
        .fa {
            margin: 10px;
            font-size: 68px;
 
        }
 
        .fa:hover {
            transform: rotateY(180deg);
            transition: transform 0.8s;
        }
 
        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
 
        /* Button designing */
        .button {
            border: none;
            padding: 8px;
            color: white;
            background-color: #449D44;
            text-align: center;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
 
        /* Hover effect on button */
        .button:hover {
            background-color: green;
        }
 
        /* Margining first member of team */
        #gfg {
            float: none;
            margin: auto;

        }
    </style>
</head>
 
<body>
    <center>
        <h1>Meet The Team</h1>
        <hr>
        <div class="row">
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                       style="font-size:68px;"></i>
                    <div class="container">
                        <h2>Yazid Alghuraibi</h2>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                       style="font-size:68px;">
                      </i>
                    <div class="container">
                        <h2>Ammar Amin</h2>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                           style="font-size:68px;">
                      </i>
                    <div class="container">
                      <h2>Khalid Almetairi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                       style="font-size:68px;"></i>
                    <div class="container">
                      <h2>Ahmad Alghamdi</h2>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                           style="font-size:68px;">
                      </i>
                    <div class="container">
                      <h2>Murtadha Alhussain</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="column">
                <div class="card">
                    <i class="fa fa-user-circle"
                       style="font-size:68px;"></i>
                    <div class="container">
                        <h2>Faisal Bakhurji</h2>
                    </div>
                </div>
        </div>
    </center>
</body>
 
</html>