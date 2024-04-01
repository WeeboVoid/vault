<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custome Wordlist</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #C7C5F4, #776BCC);
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.5);
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

        .Header {
    text-align: center;
    margin-top: 20px;
}

.Header img {
    max-width: 20px;
    height: auto;
}

.Header label {
    color: #C1001F;
    font-size: 20px;
    font-weight: 700;
    margin: 10px 0;
    line-height: 1.4;
}

.Header .Disclaimer {
    color: #666;
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 20px;
}

.Header button {
    margin-top: 20px;
    background-color: #333;
    border: 0;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    padding: 15px 25px;
    transition: background-color 0.3s, transform 0.3s;
}

.Header button:hover {
    background-color: #555;
    transform: scale(1.05);
}

.Header button:active {
    transform: translateY(2px);
    transition-duration: 0.35s;
}


        .organize {
            justify-content:space-between;
            display: flex;
            align-items: center;
            margin: 10px 0;
        }



        .organize label {
            color: rgb(0, 0, 0);    
            margin-right: 1%;
            margin-left: 1%;


        }

        .organize input{
            max-width: 140px;
            padding-inline-start: 0.5rem;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 5px;
            outline: none;
        }


        .buttonscss {
            margin-top: 1%;
            background-color: rgb(0, 0, 0);
            border: 0;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 12px;
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

    </style>
</head>
<body>
    @include('sideBar')
    <div class="container">
        <form action="add" method="POST">
            @csrf
            <div class="organize">
                @if(Session::has('success'))
                    <div style="background-color: #00ff00;">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('fail'))
                    <div style="background-color: #ff0000;">
                        {{Session::get('fail')}}
                    </div>
                @endif
            </div>
            <div class="organize">
                <label type="text" >First name:</label>
                <input type="text" name="firstname" value="{{old('firstname')}}">
            </div>
            <div class="organize">
                <label >Middle name:</label>
                <input type="text" name="middlename" value="{{old('middlename')}}">
            </div>
            <div class="organize">
                <label >Last name:</label>
                <input type="text" name="lastname" value="{{old('lastname')}}">
            </div>

            <div class="organize">
                <label type="nickname">Nickname:</label>
                <input type="text" name="nickname" value="{{old('nickname')}}">
            </div>
            <div class="organize">
                <label for="DOB">Date of Birth:</label>
                <input type="date" id="DOB" name="DOB" value="{{old('DOB')}}" >
            </div>
            <div class="organize">
                <label for="Phone">Phone:</label>
                <input type="number"  name="phone" value="{{old('phone')}}">
            </div>
            <div class="organize">
                <label type="favorite color">Favorite color:</label>
                <input type="text"  name="favcolor" value="{{old('favcolor')}}"> 
            </div>
            <div class="organize">
                <label type="petname">Pet name:</label>
                <input type="text"  name="petname" value="{{old('petname')}}">
            </div>
            <div class="organize">
                <label>Marital Status</label>
                    <label>
                        <input type="radio" name="marital_status" value="single" checked > Single
                    </label>
                    <label>
                        <input type="radio" name="marital_status" value="married" > Married
                    </label>
            </div>
            <div class="organize" id="partner_fields" style="display: none;">
                <div class="organize">
                    <label for="partner_name">Partner's Name</label>
                    <input type="text" id="partner_name" name="partnername" value="{{old('partnername')}}">
                </div>
                <!--
                <div  id="children_fields" >
                </div>
                <button class='buttonscss' type="button" onclick="addChild()">Add</button>
                <button class='buttonscss' type="button" onclick="deleteChild(this.previousElementSibling)">Delete</button>               
                -->
            </div>
                <div class=Header>
                    <div>
                    <img src={{ asset('images/limitation.png') }} >
                    <label >Enter the as much as you can</label>
                    <br>
                    <label class="Disclaimer">All data will only be used for better strength password estimation and more secure password generation. </label>
                    <div>
                    <button type="submit" class=buttonscss >Save</button>
                    </div>
                </div>
            


        </form>
    </div>

    <script>
        function addChild() {
            var childrenFields = document.getElementById('children_fields');
            var childLabel = document.createElement('label');
            childLabel.textContent = 'Child Name:';
            var childInput = document.createElement('input');
            childInput.type = 'text';
            childrenFields.appendChild(childLabel);
            childrenFields.appendChild(childInput);
        }

        function deleteChild() {
    var childrenFields = document.getElementById('children_fields');
    var childrenCount = childrenFields.childElementCount;
    if (childrenCount > 0) {
        // Remove the last child input field and its label
        childrenFields.removeChild(childrenFields.lastElementChild);
        childrenFields.removeChild(childrenFields.lastElementChild);
    }
}



    
        document.getElementsByName('marital_status').forEach(function(radio) {
            radio.addEventListener('change', function() {
                var partnerFields = document.getElementById('partner_fields');
                if (this.value === 'married') {
                    partnerFields.style.display = 'block';
                } else {
                    partnerFields.style.display = 'none';
                }
            });
        });

        
    </script>
    



    
    
</body>
</html>