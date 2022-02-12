<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <header class="bg-primary p-3">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div>
                        <a class="h4 text-light text-decoration-none" href="index.php">
                            <i class="fas fa-home h4 text-light pe-1"></i>Home
                        </a>
                    </div>

                    <?php if (!isset($_SESSION['id'])) : ?>

                        <div class="">
                            <a class="btn btn-light text-dark text-decoration-none text-uppercase px-3" href="login.php">
                                <i class="fas fa-sign-in-alt text-primary pe-1"></i>login</a>
                            <a class="btn btn-light text-dark text-decoration-none text-uppercase px-3" href="register.php">
                                <i class="fas fa-home text-primary pe-1"></i>register</a>
                        </div>

                    <?php else : ?>

                        <div class="">
                            <a class="btn btn-light text-dark text-decoration-none px-3" href="logout.php">
                                <i class="fas fa-sign-out-alt text-primary pe-1"></i>logout 
                                <span class="text-primary ms-1"><?php if (isset($_SESSION['name'])) {echo '[' . $_SESSION['name'] . ']';} ?></span>
                            </a>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
    </header>