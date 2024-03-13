@include('navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                min-height: 100vh;
                padding: 100px;
                box-sizing: border-box;
            }

            .heading {
                position: absolute;
                top: 0;
                z-index: 1;
                padding: 20px;
                box-sizing: border-box;
                width: 100%;
                max-width: 800px;
                text-align: center;
            }

            .box-container {
            display: flex;
            padding: 30px;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            gap: 100px;
            }

            .box {
            height: 130px;
            width: 230px;
            border-radius: 20px;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            font-size: 10px;
            }
            .box:hover {
            transform: scale(1.08);
            }
            h2 {
            position: relative;
            text-align: center;
            color: #353535;
            font-size: 60px;
            font-family: 'Lato', sans-serif;
            margin: 0;
            color: #9651dc;
            }

            p {
            font-family: 'Lato', sans-serif;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: #785998;
            margin: 0;
            }

            .box4 {
            height: 300px;
            width: 420px;
            border-radius: 20px;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            font-size: 10px;
        }

        </style>
    </head>
    <body>
        <div class="container">
        <div class="heading">
            <h2 id="greeting-date" style="margin-right: 280px; font-size: 25px"></h2>
            <h2 id="greeting" id="name" style="font-size: 50px">Good morning, {{ session('user')->name }}!</h2>
            </div>

            <div class="box-container">
                <div class="box box1">
                    <div class="text">
                        <p class="topic">Completed task</p>
                        <p class="topic-heading">1</p>
                    </div>
                </div>

                <div class="box box2">
                    <div class="text">
                        <p class="topic">Incomplete task</p>
                        <p class="topic-heading">3</p>
                    </div>
                </div>

                <div class="box box3">
                    <div class="text">
                        <p class="topic">Total task</p>
                        <p class="topic-heading">4</p>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box box4">
                    <div class="text">
                        <p class="topic">Incomplete task by Section</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
                <div class="box box4">
                    <div class="text">
                        <p class="topic">Total task by completion status</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box box4">
                    <div class="text">
                        <p class="topic">Notepad</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
                <div class="box box4">
                    <div class="text">
                        <p class="topic">Task I've assigned</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
          const greetingDateElement = document.getElementById("greeting-date");
          const greetingElement = document.getElementById("greeting");
          const nameElement = document.getElementById("name");
          const currentTime = new Date();
          const hours = currentTime.getHours();
          const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
          const day = days[currentTime.getDay()];
          const month = months[currentTime.getMonth()];
          const date = currentTime.getDate();

          if (hours < 12) {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good morning, ${nameElement.textContent}!`;
          } else if (hours < 18) {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good afternoon, ${nameElement.textContent}!`;
          } else {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good evening, ${nameElement.textContent}!`;
          }
        </script>
    </body>
</html>
