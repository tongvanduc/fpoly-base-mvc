<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Web</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <?php require_once 'components/head.php' ?>
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php require_once 'components/navbar.php' ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php require_once 'components/main-menu.php' ?>

                    <!-- Chỗ này để content của Page -->
                    <?php require_once $view . '.php'; ?>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require_once 'components/foot.php' ?>
    
</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2023 03:46:02 GMT -->

</html>