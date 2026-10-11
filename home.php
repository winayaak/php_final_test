<?php
include "db.php";
session_start();



if (isset($_POST['add'])) {

    $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $sql=$conn->prepare("insert into book(title,author,isbn,category,price)values(?,?,?,?,?)");
    $sql->bind_param('ssisi',$title,$author,$isbn,$category,$price);
    if($sql->execute()){
        echo " Record inserted successully";
    }
}

if(isset($_POST['update'])){

    $bid=$_POST['bid'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $sql=$conn->prepare("update book set title=?,author=?,isbn=?,category=?,price=? where bid=?");
    $sql->bind_param('ssisii',$title,$author,$isbn,$category,$price,$bid);
    if($sql->execute()){
        echo "Record updated successfully";
    }
}

if(isset($_POST['delete'])){

    $bid=$_POST['bid'];
    $sql=$conn->prepare("delete from book where bid=?");
    $sql->bind_param('i',$bid);
    if ($sql->execute()) {
        echo " Record deleted";
    }
}

$result=$conn->query("select * from book");

?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Management</title>

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

            <nav
                class="navbar navbar-expand-sm navbar-light bg-success"
            >
                <div class="container">

                    <a class="navbar-brand" href="#">
                        <h2>Hello</h2>
                    </a>

                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavId">

                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    href="#"
                                    aria-current="page"
                                >
                                    Home
                                    <span class="visually-hidden">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>

                            <li class="nav-item dropdown">

                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    Dropdown
                                </a>

                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >

                                    <a class="dropdown-item" href="#">
                                        Action 1
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        Action 2
                                    </a>

                                </div>

                            </li>

                        </ul>

                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="csv.php"
                            role="button"
                        >
                            CSV
                        </a>

                        <a
                            name=""
                            id=""
                            class="btn btn-danger m-1"
                            href="logout.php"
                            role="button"
                        >
                            logout
                        </a>

                    </div>

                </div>

            </nav>

        </header>


        <main>

        <div class="container mt-4">


        

        <div class="card shadow mb-5">

            <div class="card-header bg-success text-white">

                <h3 class="mb-0">
                    Add Books
                </h3>

            </div>


            <div class="card-body">

                <form action="" method="POST">

                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Title
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id=""
                            placeholder="Enter Title name"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Author
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="author"
                            id=""
                            placeholder="Enter author"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Isbn
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="isbn"
                            id=""
                            placeholder="Enter isbn"
                        />

                    </div>


                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Category
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id=""
                            placeholder="Enter category"
                        />

                    </div>


                    
                    <div class="mb-3">

                        <label
                            for=""
                            class="form-label fw-bold"
                        >
                            Price
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="price"
                            id=""
                            placeholder="Enter price"
                        />

                    </div>


                    <button
                        type="submit"
                        name="add"
                        class="btn btn-success"
                    >
                        Add
                    </button>

                </form>

            </div>

        </div>



        <!-- ================= ALL PRODUCTS ================= -->

        <div class="card shadow mb-5">

            <div class="card-header bg-success text-white">

                <h3 class="mb-0">
                    All Books
                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle shadow-sm">

                        <tr class="table-success">

                            <th>BId</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th>Action</th>

                        </tr>


                        <?php while($row=$result->fetch_assoc()) { ?>

                        <tr>

                            <td>
                                <?php echo $row['bid']; ?>
                            </td>


                            <td>

                                <form action="" method="POST">

                                    <input
                                        type="hidden"
                                        name="bid"
                                        value="<?php echo $row['bid'];?>"
                                    >

                                    <input
                                        type="text"
                                        name="title"
                                        value="<?php echo $row['title'];?>"
                                        class="form-control"
                                    >

                            </td>


                            <td>

                                <input
                                    type="text"
                                    name="author"
                                    value="<?php echo $row['author'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <input
                                    type="number"
                                    name="isbn"
                                    value="<?php echo $row['isbn'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <input
                                    type="text"
                                    name="category"
                                    value="<?php echo $row['category'];?>"
                                    class="form-control"
                                >

                            </td>
                              <td>

                                <input
                                    type="number"
                                    name="price"
                                    value="<?php echo $row['price'];?>"
                                    class="form-control"
                                >

                            </td>


                            <td>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    name="update"
                                >
                                    Update
                                </button>

                                </form>

                            </td>


                            <td>

                                <form action="" method="POST">

                                    <input
                                        type="hidden"
                                        name="bid"
                                        value="<?php echo $row['bid'];?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        name="delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        <?php
                        }
                        ?>

                    </table>

                </div>

            </div>

        </div>


        </div>

        </main>


        <footer>
            <!-- place footer here -->
        </footer>


        <!-- Bootstrap JavaScript Bundle -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYWJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>

    </body>
</html>