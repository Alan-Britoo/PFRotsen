<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/board.css">
    <title>Academia</title>
    <script src="https://kit.fontawesome.com/2ed691f658.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .home,
        .adm {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .adm-dropdown {
            position: relative;
            display: inline-block;
        }

        .adm-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .adm-dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .adm-dropdown:hover .adm-dropdown-content {
            display: block;
        }
    </style>

</head>

<body>


    <div class="menu">
        <div class="dlogo">
            <img src="../assets/logo.jpg" class="logo" alt="">
            <p>Universidad</p>
        </div>
        <hr>
        <div class="role">
            <h3>admin</h3>
            <p></p>
        </div>
        <hr>
        <ul>
            <h4>Menu Administracion</h4>
            <?php foreach ($menu as $key => $options) : ?>
                <li style="display: flex; align-items: center;">
                    <img style="margin-left: 20px; color: white;" src="<?= $options['icon'] ?>" alt="logo" width="25" height="25">
                    <a style="padding: 5px 5px; color: white;" href="<?= $options['url'] ?>"><?= $key ?></a>
                </li>
            <?php endforeach; ?>
        </ul>


    </div>
    <section class="main" style="margin-top: 0; " >
        <nav style="height: 50px ;  padding-top: 15px; background-color: #e6e6e6;" >
            <div class="home">
                <i class="fas fa-bars"></i>
                <a href="" style="font-size: 18px;" >Home</a>
            </div>
            <div class="adm">
                <div class="adm-dropdown">
                    <a href="#" style="font-size: 18px;" >Administrador <i class="fas fa-chevron-down"></i></a>
                    <div class="adm-dropdown-content">
                        <a href="#" >Perfil</a>
                        <a href="index.php?controller=FirstController&action=logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    