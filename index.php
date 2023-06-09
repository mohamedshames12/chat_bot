<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>chat bot</title>
</head>
<body>
    <div class="wrapper">
        <div class="title">GoldenBox Bot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="mes-hesder">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-filed">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here..." required>
                <button id="send-btn">send</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#send-btn').on('click', function(){
                $value = $("#data").val();
                $mes = '<div class="user-inbox inbox"><div class="mes-hesder"><p>'+ $value +'</p></div></div>';
                $(".form").append($mes);
                $("#data").val('');

                // start ajax code 

                $.ajax({
                    url: 'messages.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-user"></i></div><div class="mes-hesder"><p>'+ result +'</p></div> </div>';
                        $(".form").append($replay); 
                    }
                })
            })
        })
    </script>
</body>
</html>