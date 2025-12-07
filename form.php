<?php
require_once 'includes/view.php';
$view = new view();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f3f6fb;
        }
        .login-card {
            max-width: 420px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            margin-top: 50px;
        }
        .login-icon {
            font-size: 45px;
            color: #0d6efd;
        }
        .btn-custom {
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
            padding: 10px;
            border-radius: 12px;
        }
        .btn-custom:hover {
            background: #0b5ed7;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="login-card text-center">

            <!-- Top Icon -->
            <i class="fa-solid fa-flask login-icon mb-3"></i>

            <h2 class="fw-bold">Welcome Back</h2>
            <p class="text-muted mb-4">Sign in to your Lab Automation account</p>

            <!-- Form -->
            <form action="./includes/form.inc.php" method="POST">
                <div class="mb-3 text-start">
                    <label class="fw-semibold">Username</label>
                    <input type="text" class="form-control p-3" placeholder="Enter your username" name="name">
                </div>

                <div class="mb-3 text-start">
                    <label class="fw-semibold">Password</label>
                    <input type="password" class="form-control p-3" placeholder="Enter your password" name="pwd">
                </div>

                <button type="submit" class="btn btn-custom w-100 mt-2">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Sign In
                </button>
            </form>

            <?php $view->display_errors(); ?>

            <!-- Demo Box -->
            <div class="mt-4 p-3 bg-light rounded">
                <h6 class="fw-bold">Demo Credentials:</h6>
                <p class="mb-1">Admin: admin / password</p>
                <p>User: user / password</p>
            </div>

        </div>
    </div>

</body>
</html>
