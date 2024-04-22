<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Header</title>
    <style>
        * {
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            margin-top: 0;
        }
        .header {
            margin-top: 0%;
            background-color: #f4f4f4;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .logo span {
            color: #00bcd4;
            font-weight: bold;
        }
        .nav-links a {
            text-decoration: none;
            color: #333;
            margin-right: 20px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #00bcd4;
        }
        .btn {
            padding: 8px 20px;
            background-color: #00bcd4;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #008ba3;
        }

        /* Media Query for responsiveness */
        @media screen and (max-width: 768px) {
            .header {
                padding: 15px;
                flex-direction: column;
                text-align: center;
            }
            .nav-links a {
                display: block;
                margin: 10px 0;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>My<span>Site</span></h1>
        </div>
        <nav class="nav-links">
            <a href="#">Home</a>
            <a href="table.php">Display Users</a>
            <a href="index.php">Create New Account</a>
            <a href="index.php">Logout</a>
        </nav>
    </header>
</body>
</html>

