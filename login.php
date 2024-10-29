<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <header>
        <h1>Martian Safari</h1>
        <div class="logoDiv">
            <img src="assets/placeholder-logo.png">
        </div>
    </header>

    <section class="application">
        <h2>Login</h2>
        <form id="form">
            <span>
                <label for="uerID">User ID</label>
                <input id="userID" name="userID" type="text" required>
            </span>
            <span>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </span>
            <span>
                <button type="submit">Submit</button>
            </span>
        
        </form>
    </section>
</body>
<script src="script/login.js"></script>
</html>