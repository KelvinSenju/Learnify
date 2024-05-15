<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .chat-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .chat-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 70%;
            padding: 8px;
        }

        button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-box" id="chat-box">
            <?php include 'fetch_messages.php'; ?>
        </div>
        <form action="send_message.php" method="post">
            <input type="text" name="message" id="message-input" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
