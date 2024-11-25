<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body, html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;

            overflow: hidden;
        }

        .container {
            text-align: center;
            max-width: 600px;
        }

        h1 {
            font-size: 10rem;
            margin-bottom: 1rem;
            color: #e43f5a;
            text-shadow: 0 0 20px #e43f5a;
        }

        h2 {
            font-size: 2.5rem;
            color: #1fab89;
            margin-bottom: 2rem;
        }

        p {
            font-size: 1.2rem;
            color: #a9a9a9;
            margin-bottom: 2rem;
        }

        .home-link {
            display: inline-block;
            font-size: 1rem;
            padding: 10px 25px;
            color: #fff;
            background: #162447;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 0px 15px rgba(255, 0, 55, 0.5);
        }

        .home-link:hover {
            color: #e43f5a;
            background: #1fab89;
            box-shadow: 0px 0px 15px rgba(34, 211, 238, 0.5);
        }
        
        .animated-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(45deg, #e43f5a, #1fab89, #162447, #1b1b2f);
            background-size: 400% 400%;
            z-index: -1;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page not found.</h2>
        <p>The page you're looking for doesn't exist, but we're here to guide you back home.</p>
        <a href="/" class="home-link">Back to Home</a>
    </div>
    <div class="animated-bg"></div>
</body>
</html>
