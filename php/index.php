<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ingresa con tu usuario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center text-center container">
        <form method="post" class="p-2 m-4">
            <h1 class="mb-4">Log In</h1>
            <?php include("db.php") ?>
            <?php include("login.php") ?>
            <hr>
            <div class="mb-4">
                <label for="loginEmail" style="font-size: large; font-family:Arial, Helvetica, sans-serif;">E-mail</label>
                <input type="email" id="loginEmail" name="loginEmail" value="juanbravo@gmail.com" class="form-control form-control-lg" placeholder="Enter your E-mail" required>
            </div>
            <div class="mb-4">
                <label for="loginPassword" style="font-size: large; font-family:Arial, Helvetica, sans-serif;">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" value="juan1"class="form-control form-control-lg" placeholder="Enter your password" required>
            </div>
            <input class="btn btn-primary btn-lg w-100" type="submit" value="Go!" id="loginBtn" name="loginBtn">
        </form>
    </div>
</body>

</html>