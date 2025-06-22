<html>

<head>
    <title>Login Screen</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #F2F4F4">
    <div class="container">
        <div style="border: 1px solid gray; width:50%; margin-left:25%; margin-top: 5%; background-color: white; border-radius: 8px">
            <div style="padding: 10px">
                <form action="index.php" method="post">
                    <center><h2>Login</h2></center>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter name..."></input>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter pass..."></input>
                    </div>
                    <br>
                    <div class="form-group">

                        <input type="submit" name="login" id="login" class="btn btn-primary " value="Login"></input>
                    </div>
            </div>
        </div>
</body>

</html>