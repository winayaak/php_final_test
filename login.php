<?php
include"db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql=$conn->prepare("select password from users where email =?");
    $sql->bind_param('s',$email);
    $sql->execute();
    $sql->bind_result($password);
    $sql->fetch();
    if(password_verify($pass,$password)){
        $_SESSION['email']=$email;
        header('Location:home.php');
    }
     else {

        echo "PASSWORD NOT MATCHED";

    }
    
}
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>


            <h3 class="text-center" >LOGIN WITH US</h3>
            <hr>
            <div
                class="container border col-5 rounded mb-10 shadow "
            >
                <form action="" method="POST">

                <div class="mb-3">
                    <label for="" class="form-label">EMAIL</label>
                    <input
                        type="text"
                        class="form-control"
                        name="email"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                   
                </div>
                

                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="pass"
                        id=""
                        placeholder=""
                    />
                </div>
                
                <button
                    type="submit"
                    class="btn btn-primary "
                >
                    Submit
                </button>
                

                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
