<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }
        .social-icons {
            margin-top: 15px;
        }
        .social-icons a {
            display: inline-block;
            margin: 0 8px;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            color: #fff;
            border-radius: 50%;
            background-color: #00bcd4;
            transition: background-color 0.3s ease;
        }
        .social-icons a:hover {
            background-color: #008ba3;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .footer {
                padding: 15px;
            }
            .footer p {
                font-size: 12px;
            }
            .social-icons a {
                width: 25px;
                height: 25px;
                line-height: 25px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <footer class="footer">
        <p>&copy; 2023 YourSite. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="#" target="_blank">F</a>
            <a href="#" target="_blank">T</a>
            <a href="#" target="_blank">I</a>
            <a href="#" target="_blank">G</a>
        </div>
    </footer>
</body>
</html>
