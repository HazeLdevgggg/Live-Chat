<?
        session_start ();
        $_SESSION['pass'];
        $_SESSION['name'];
        try{
            $servername = 'sportmarludev.mysql.db'; 
            $username = 'sportmarludev';
            $password = 'DevMadein34'; 
            $dbname = 'sportmarludev'; 
            $connection = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password); 
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $connection->prepare("SELECT * FROM user WHERE username=:username");
            $stmt->bindParam(':username', $_SESSION['name']);
            $stmt->execute(); 
            $user = $stmt->fetch();
            $stmt = $connection->prepare("SELECT * FROM user WHERE password=:password");
            $stmt->bindParam(':password', $_SESSION['pass']);
            $stmt->execute(); 
            $pass = $stmt->fetch();
            if ($user and $pass) {
                echo '
                        <!DOCTYPE html>
                        <html lang="en" dir="ltr">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Chat</title> 
                            <link rel="stylesheet" href="assets/css/style-chat.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        </head>
                        <body>
                            <section class="msger">
                            <header class="msger-header">
                                <div class="msger-header-title">
                                <i class="fas fa-comment-alt"></i> Live Chat
                                </div>
                                <div class="msger-header-options">
                                <span></span>
                                </div>
                            </header>

                            <main class="msger-chat">
                                <div id="chat-messages">
                                <!-- Messages will be dynamically added here -->
                                </div>
                            </main>

                            <form id="chat-form" class="msger-inputarea" action="send_message.php" method="post">
                                <input type="text" id="message-input" class="msger-input" placeholder="Enter your message...">
                                <button type="submit" class="msger-send-btn">Send</button>
                            </form>
                            </section>

                            <script src="chat.js"></script>

                            <style>
                            .color-button {
                            display: block;
                            width: 30px;
                            height: 30px;
                            margin: 5px;
                            cursor: pointer;
                            border-radius: 50%;
                            }
                            </style>
                            </head>
                                <style>
                                    .color-picker-button {
                                    appearance: none;
                                    width: 20px;
                                    height: 100px;
                                    background: linear-gradient(to bottom, red, yellow, lime, aqua, blue, fuchsia, red);
                                    border: none;
                                    cursor: pointer;
                                    }
                                </style>
                            </head>
                                <body>
                                <form id="color-form" method="post">
                                    <input type="color" name="color-picker" id="color-picker" class="color-picker-button">
                                </form>
                                <script>
                                    var colorPicker = document.getElementById("color-picker");
                                    var colorForm = document.getElementById("color-form");
                                    colorPicker.addEventListener("change", function(event) {
                                        colorForm.submit();
                                    });
                                </script>
                            </body>
                            </html>
                ';


                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $colorSubmitted = true;
                    $selectedColor = $_POST["color-picker"];
                    $hexColor = $selectedColor;

                } else {
                    $colorSubmitted = false;
                }
                if ($colorSubmitted) {
                    session_start();
                    $_SESSION['color'] = $hexColor;
                }
            }else{
                header('Location: http://dev.sport-market.shop/livechat/login.php');
                exit();
            } 
        }
        catch(PDOException $e){
            echo $e->getMessage();
        } 
        // limiter la taille des user
    ?>

















