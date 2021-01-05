<?php 
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cressidabeauty";

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$product_name = $_GET['product_name'];
$sql_items = "SELECT * FROM items WHERE item_name='$product_name'";
$result_items = mysqli_query($con, $sql_items);

if(isset($_POST['but_upload'])) {
    $username = $_SESSION["user"]["name"];
    $item_name = $_POST['item_name'];
    $item_img = $_POST['item_img'];
    $item_qty = $_POST['item_qty'];
    $item_price = $_POST['item_price'];
    $total = $item_qty * $item_price;
    $total_price = $total;

    $query = "insert into transaksi(username,item_name,item_img,item_qty,item_price,total_price) values('".$username."','".$item_name."','".$item_img."','".$item_qty."','".$item_price."','".$total_price."')";

    mysqli_query($con,$query) or die(mysqli_error($con));
    echo '<script>
    alert("Successfully add item");
    location="payment.php";
    </script>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Info - Cressida Beauty</title>
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/sb-admin.css">
    <link rel="stylesheet" href="../assets/slick/slick.css">
    <link rel="stylesheet" href="../assets/slick/slick-theme.css"/>
</head>
<body>
    <div class="content-2">
        <!-- header start -->
        <div class="text-center pt-4">
            <svg width="50" height="42" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 23V19C21 20.6 23.3333 22.3333 24.5 23H21Z" fill="#825348"/>
                <path d="M22.0182 16C19.6182 13.6 22.0182 11 23.5182 10C23.0181 14 25.0182 13.5 29.0182 17C32.2182 19.8 28.6849 22.1667 26.5182 23C29.5182 19.5 25.0182 19 22.0182 16Z" fill="#805146"/>
                <path d="M16.7201 0.423439V8.42344C14.3201 0.423423 9.72011 0.423433 7.72009 1.42344C-1.27994 6.42342 3.72009 14.9235 6.72009 16.9235C9.12009 18.5235 12.3868 16.9235 13.7201 15.9235C16.6467 12.7823 23.4 6.6 27 7C30 7 31.5 9.5 30.5 11.5C29.5 13.5 26.5 13 27 11C27.3333 10.6667 27.8 9.6 27 8C26.2 6.4 20.8134 10.2823 18.2201 12.4235L14.2201 16.4235C14.0534 16.9235 12.7201 18.0235 8.72012 18.4235C3.72012 18.9235 -3.27988 10.9234 1.72012 3.92344C5.72012 -1.67656 12.3868 -0.0765601 15.2201 1.42344L16.7201 0.423439Z" fill="#805146"/>
                <path d="M15 12L18 9V20C18 20.8 18.6667 21.6667 19 22H13C14.2 21.6 14.5 20.5 14.5 20V14C14.5 13.2 14.5 13 15 12Z" fill="#805146"/>
                <circle cx="28.5" cy="10.5" r="2.5" fill="#805146"/>
            </svg>    
        </div>
        <nav class="px-5 navbar navbar-expand-md sticky-top navbar-light bg-header-about">
            <div class="container">
                <button style="margin-left: -20px" class="navbar-toggler mr-auto p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav mr-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="15" height="15" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.44215 8.88431C6.89549 8.88431 8.88431 6.89549 8.88431 4.44215C8.88431 1.98882 6.89549 0 4.44215 0C1.98882 0 0 1.98882 0 4.44215C0 6.89549 1.98882 8.88431 4.44215 8.88431ZM4.44216 8.08347C6.4532 8.08347 8.08347 6.4532 8.08347 4.44216C8.08347 2.43112 6.4532 0.800843 4.44216 0.800843C2.43112 0.800843 0.800843 2.43112 0.800843 4.44216C0.800843 6.4532 2.43112 8.08347 4.44216 8.08347Z" fill="#805146"/>
                                    <rect x="7.54565" y="7.07019" width="4.62058" height="0.95299" transform="rotate(44.7517 7.54565 7.07019)" fill="#805146"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu rounded-0 dropdown-menu-left animated--grow-in" aria-labelledby="userDropdown">
                                <div class="px-3 py-1 form" href="#">
                                <form action="">
                                    <input type="text" class="form-control rounded-0" placeholder="Search here...">
                                    <button type="submit" class="btn btn-block btn-outline-brown mt-1 rounded-0">Search</button>
                                </form>
                                </div>
                            </div>
                        </li>
                    </div>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mr-4">
                            <a style="color: #805146 !important; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 400;" class="nav-link text-uppercase" href="home.php">home</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a style="color: #805146 !important; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 400;" class="nav-link text-uppercase" href="allproducts.php">all products</a>
                        </li>
                        <li class="nav-item active mr-4">
                            <a style="color: #805146 !important; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 900;" class="nav-link text-uppercase" href="lipglow.php">lip glow</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a style="color: #805146 !important; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 400;" class="nav-link text-uppercase" href="cressidairl.php">cressda irl</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a style="color: #805146 !important; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: 400;" class="nav-link text-uppercase" href="about.php">about</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ml-auto">
                    <?php 
                        if(!isset($_SESSION["user"])) {
                            echo '<a href="../log-reg/login.php" class="nav-link">
                            <svg width="18" height="18" viewBox="0 0 42 39" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -7px;">
                                <path d="M21.0794 2C14.6794 2 14.0794 8.33333 14.5794 11.5H27.5796C28.0795 8.33333 27.4794 2 21.0794 2Z" stroke="#805146" stroke-width="3"/>
                                <path d="M7.0798 12H33.5798C44.78 12 39.2464 16.3333 35.0796 18.5V29.5C35.0796 36 33.0796 37 28.5796 37H11.5796C7.57959 36.2 6.91306 31.6667 7.0798 29.5V18.5C-2.1202 13.3 3.24646 12 7.0798 12Z" stroke="#805146" stroke-width="3"/>
                                <rect x="13.0796" y="18.5" width="4" height="4" fill="#805146"/>
                                <rect x="25.0796" y="18.5" width="4" height="4" fill="#805146"/>
                            </svg>
                        </a>';
                        } else {
                            echo '<a href="payment.php" class="nav-link">
                            <svg width="18" height="18" viewBox="0 0 42 39" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -7px;">
                                <path d="M21.0794 2C14.6794 2 14.0794 8.33333 14.5794 11.5H27.5796C28.0795 8.33333 27.4794 2 21.0794 2Z" stroke="#805146" stroke-width="3"/>
                                <path d="M7.0798 12H33.5798C44.78 12 39.2464 16.3333 35.0796 18.5V29.5C35.0796 36 33.0796 37 28.5796 37H11.5796C7.57959 36.2 6.91306 31.6667 7.0798 29.5V18.5C-2.1202 13.3 3.24646 12 7.0798 12Z" stroke="#805146" stroke-width="3"/>
                                <rect x="13.0796" y="18.5" width="4" height="4" fill="#805146"/>
                                <rect x="25.0796" y="18.5" width="4" height="4" fill="#805146"/>
                            </svg>
                        </a>';
                        }
                    ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user-circle" style="color: #805146; font-size: 18px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <?php 
                                    if(!isset($_SESSION["user"])) {
                                        echo '<div class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
                                        echo " User";
                                        echo '</div>';
                                        echo '<a class="dropdown-item" href="../log-reg/register.php">
                                            <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Register
                                        </a>
                                        <a class="dropdown-item" href="../log-reg/login.php">
                                            <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Login
                                        </a>';
                                    } else {
                                        echo '<div class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
                                            echo $_SESSION["user"]["name"];
                                        echo '</div>';
                                        echo '<a class="dropdown-item" href="#" onclick="logout()">
                                            <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>';
                                    }
                                ?>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
        <!-- header end -->

        <!-- container section 1 start -->
        <section class="jumbotron container-moreinfo">
            <div class="container">
                <div class="col-md-12">
                <?php while($data_items = mysqli_fetch_array($result_items)) {
                    $image = $data_items['item_file'] ?>
                    <form method="post" action="" enctype='multipart/form-data'>
                        <div class="row justify-content-center">
                            <div class="col-md-4 my-2">
                                <div class="row">
                                    <div class="items mr-2">
                                        <div class="box active-items d-flex justify-content-center mb-1">
                                            <img class="img-fluid items-img" src="../assets/img/moreinfo-lipglow.png" alt="">
                                        </div>
                                        <div class="box d-flex justify-content-center my-1">
                                            <img class="img-fluid items-img" src="../assets/img/lipglow-orang-boudicca.png" alt="" style="width: max-content;">
                                        </div>
                                        <div class="box my-1"></div>
                                    </div>
                                    <img class="img-fluid" src="../admin/post/items/upload/<?= $image ?>" alt="">
                                    <input hidden name="item_img" type="text" value="<?php echo $data_items['item_file'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="item-name"><?php echo $data_items['item_name'] ?></div>
                                <input hidden name="item_name" type="text" value="<?php echo $data_items['item_name'] ?>">
                                <div class="small-text">Cressida Lip Glow | 50 ml</div>
                                <div class="item-subtitle mt-2">Silky-sheer lip glow enriched with Rice Bran Oil, Lavender Oil, and
                                    Chamomile Oil. Gives a whimsical-magical natural lookv</div>

                                <div class="item-subtitle mt-2">WHAT IT IS: <span class="item-desc"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></div>
                                
                                <div class="item-subtitle mt-3">WHY IT’S SPECIAL:</div>
                                <div class="item-desc">
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                    </ul>
                                </div>
                                
                                <div class="item-subtitle mt-4">BENEFITS FOR YOU:</div>
                                <div class="item-desc">
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</li>
                                    </ul>
                                </div>
                                <div class="row mt-4 ml-1">
                                    <div class="container-add-item px-2 my-1">
                                        <a class="dec-inc" onclick="decreaseItem()">-</a>
                                        <input type="text" id="additem" name="item_qty" value="1"/>
                                        <input hidden name="item_price" type="text" value="<?php echo $data_items['item_price'] ?>">
                                        <a class="dec-inc" onclick="increaseItem()">+</a>
                                    </div>
                                    <?php 
                                        if(!isset($_SESSION["user"])) {
                                            echo '<a href="../log-reg/login.php" class="btn rounded-0 btn-brown-add-item my-1">Add To Bag - Rp145.000</a>';
                                        } else {
                                            echo '<input class="btn rounded-0 btn-brown-add-item my-1" type="submit" value="Add To Bag - Rp145.000" name="but_upload">';
                                            // echo '<a href="payment.php" class="btn rounded-0 btn-brown-add-item my-1">Add To Bag - Rp145.000</a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                </div>
            </div>
        </section>
        <!-- container section 1 end -->

        <!-- content section 3 / footer start -->
        <div class="jumbotron container-6 rounded-0">
            <div class="container">
                <div class="text-center">
                    <svg width="50" height="42" viewBox="0 0 145 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M97.6957 107V88.3913C97.6957 95.8348 108.551 103.899 113.978 107H97.6957Z" fill="#FCFCFC"/>
                        <path d="M102.432 74.4348C91.2671 63.2696 102.432 51.1739 109.411 46.5217C107.084 65.1304 116.389 62.8043 134.998 79.0869C149.885 92.113 133.447 103.123 123.367 107C137.324 90.7174 116.389 88.3913 102.432 74.4348Z" fill="#FCFCFC"/>
                        <path d="M77.7849 1.96991V39.1873C66.6198 1.96984 45.2197 1.96988 35.9152 6.62209C-5.95449 29.8829 17.3065 69.4265 31.263 78.7309C42.4283 86.1744 57.6254 78.7309 63.8283 74.0787C77.4435 59.4655 108.861 30.7043 125.609 32.5652C139.565 32.5652 146.543 44.1957 141.891 53.5C137.239 62.8043 123.283 60.4783 125.609 51.1739C127.159 49.6232 129.33 44.6609 125.609 37.2174C121.887 29.7739 96.8275 47.8351 84.763 57.7961L66.1543 76.4048C65.379 78.7309 59.1762 83.8483 40.5675 85.7092C17.3067 88.0352 -15.2586 50.8177 8.00231 18.2525C26.611 -7.79965 57.6255 -0.356171 70.8067 6.62209L77.7849 1.96991Z" fill="#FCFCFC"/>
                        <path d="M69.7826 55.8261L83.7391 41.8696V93.0435C83.7391 96.7652 86.8406 100.797 88.3913 102.348H60.4783C66.0609 100.487 67.4565 95.3696 67.4565 93.0435V65.1304C67.4565 61.4087 67.4565 60.4783 69.7826 55.8261Z" fill="#FCFCFC"/>
                        <circle cx="132.587" cy="48.8478" r="11.6304" fill="#FCFCFC"/>
                    </svg>
                </div>
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-join-affiliate rounded-0 px-4">JOIN CRESSIDA AFFILIATE PROGRAM</a>
                </div>
                <div class="row justify-content-center mt-3">
                    <a href="home.php" class="footer-menu-text mx-4">HOME</a>
                    <a href="allproducts.php" class="footer-menu-text mx-4">ALL PRODUCTS</a>
                    <a href="lipglow.php" class="footer-menu-text mx-4">LIP GLOW</a>
                    <a href="lipglow.php" class="footer-menu-text mx-4">PALLETE</a>
                    <a href="cressidairl.php" class="footer-menu-text mx-4">CRESSIDA URL</a>
                    <a href="about.php" class="footer-menu-text mx-4 font-weight-bold">ABOUT</a>
                </div>
                <div class="col-md-6 mx-auto text-center email-text mt-4">We also make emails.<br>Receive email updates on stuff you’ll probably want to know about, including products, launches, and events.</div>
                <form action="" class="col-md-6 border container-input mx-auto bg-white mt-3">
                    <input type="text" class="border-0 input-youremail" placeholder="Your Email_">
                    <button type="submit" class="subs-text">Subscribe<i class="fas fa-chevron-right subs-chevron"></i></button>
                    <!-- <a href="#" class="subs-text">Subscribe<i class="fas fa-chevron-right subs-chevron"></i></a> -->
                </form>
                <div class="row justify-content-center mt-3">
                    <a href="#" class="info-text mx-1">Terms of Use</a>
                    <span class="info-text">|</span>
                    <a href="#" class="info-text mx-1">Privacy Policy</a>
                    <span class="info-text">|</span>
                    <a href="#" class="info-text mx-1">Help & FAQ</a>
                </div>
                <div class="row justify-content-center mt-2">
                    <span class="info-text">
                        <i class="far fa-fw fa-copyright"> </i> 
                    </span>
                    <span class="info-text">
                        <script>document.write(new Date().getFullYear()) </script>
                    </span>
                    <span class="info-text mx-1">Cressida Beauty. All rights reserved.</span>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="icon-container text-center mx-1 rounded-circle">
                        <i class="icon fab fa-instagram"></i>
                    </div>
                    <div class="icon-container mx-1 rounded-circle justify-content-center text-center">
                        <svg width="17" height="17" viewBox="0 0 162 181" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;">
                            <path d="M3 178V37.5H54.5C61.7 37.5 74.8333 43.1667 80.5 46C90.5 40 103 37.5 109.5 37.5H158.5V135.5C158.5 142 149 178 105.5 178H3Z" stroke="#805146" stroke-width="6"/>
                            <circle cx="45" cy="95.5" r="35" stroke="#805146" stroke-width="5"/>
                            <circle cx="116" cy="95.5" r="35" stroke="#805146" stroke-width="5"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M41.5 93C47.0228 93 51.5 88.5228 51.5 83C51.5 80.2833 50.4167 77.8196 48.6584 76.0174C48.9375 76.0058 49.2181 76 49.5 76C60.5457 76 69.5 84.9543 69.5 96C69.5 107.046 60.5457 116 49.5 116C38.4543 116 29.5 107.046 29.5 96C29.5 92.4569 30.4213 89.129 32.0375 86.2427C33.3844 90.174 37.1122 93 41.5 93Z" fill="#805146"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M103.5 93C109.023 93 113.5 88.5228 113.5 83C113.5 80.2833 112.417 77.8196 110.658 76.0174C110.938 76.0058 111.218 76 111.5 76C122.546 76 131.5 84.9543 131.5 96C131.5 107.046 122.546 116 111.5 116C100.454 116 91.5 107.046 91.5 96C91.5 92.4569 92.4213 89.129 94.0375 86.2427C95.3844 90.174 99.1122 93 103.5 93Z" fill="#805146"/>
                            <path d="M61 129L80 147.5L98.5 129C83.7 114.2 67.3333 122.833 61 129Z" stroke="#805146" stroke-width="5"/>
                            <path d="M46 38C47.3333 27 56.1 5 80.5 5C104.9 5 114 27 115.5 38" stroke="#805146" stroke-width="10"/>
                        </svg>                        
                    </div>
                    <div class="icon-container mx-1 rounded-circle justify-content-center text-center">
                        <svg width="19" height="19" viewBox="0 0 210 299" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: -3px;">
                            <path d="M29.312 246.312C29.12 246.632 28.9067 246.877 28.672 247.048C28.4587 247.197 28.192 247.272 27.872 247.272C27.5093 247.272 27.0827 247.091 26.592 246.728C26.1013 246.365 25.4827 245.971 24.736 245.544C24.0107 245.096 23.1253 244.691 22.08 244.328C21.056 243.965 19.808 243.784 18.336 243.784C16.9493 243.784 15.7227 243.976 14.656 244.36C13.6107 244.723 12.7253 245.224 12 245.864C11.296 246.504 10.7627 247.261 10.4 248.136C10.0373 248.989 9.856 249.917 9.856 250.92C9.856 252.2 10.1653 253.267 10.784 254.12C11.424 254.952 12.256 255.667 13.28 256.264C14.3253 256.861 15.4987 257.384 16.8 257.832C18.1227 258.259 19.4667 258.707 20.832 259.176C22.2187 259.645 23.5627 260.179 24.864 260.776C26.1867 261.352 27.36 262.088 28.384 262.984C29.4293 263.88 30.2613 264.979 30.88 266.28C31.52 267.581 31.84 269.181 31.84 271.08C31.84 273.085 31.4987 274.973 30.816 276.744C30.1333 278.493 29.1307 280.019 27.808 281.32C26.5067 282.621 24.896 283.645 22.976 284.392C21.0773 285.139 18.912 285.512 16.48 285.512C13.4933 285.512 10.784 284.979 8.352 283.912C5.92 282.824 3.84 281.363 2.112 279.528L3.904 276.584C4.07467 276.349 4.27733 276.157 4.512 276.008C4.768 275.837 5.04533 275.752 5.344 275.752C5.62133 275.752 5.93067 275.869 6.272 276.104C6.63467 276.317 7.04 276.595 7.488 276.936C7.936 277.277 8.448 277.651 9.024 278.056C9.6 278.461 10.2507 278.835 10.976 279.176C11.7227 279.517 12.5653 279.805 13.504 280.04C14.4427 280.253 15.4987 280.36 16.672 280.36C18.144 280.36 19.456 280.157 20.608 279.752C21.76 279.347 22.7307 278.781 23.52 278.056C24.3307 277.309 24.9493 276.424 25.376 275.4C25.8027 274.376 26.016 273.235 26.016 271.976C26.016 270.589 25.696 269.459 25.056 268.584C24.4373 267.688 23.616 266.941 22.592 266.344C21.568 265.747 20.3947 265.245 19.072 264.84C17.7493 264.413 16.4053 263.987 15.04 263.56C13.6747 263.112 12.3307 262.6 11.008 262.024C9.68533 261.448 8.512 260.701 7.488 259.784C6.464 258.867 5.632 257.725 4.992 256.36C4.37333 254.973 4.064 253.267 4.064 251.24C4.064 249.619 4.37333 248.051 4.992 246.536C5.632 245.021 6.54933 243.677 7.744 242.504C8.96 241.331 10.4427 240.392 12.192 239.688C13.9627 238.984 15.9893 238.632 18.272 238.632C20.832 238.632 23.1573 239.037 25.248 239.848C27.36 240.659 29.216 241.832 30.816 243.368L29.312 246.312ZM44.4275 256.904C45.8142 255.432 47.3502 254.259 49.0355 253.384C50.7208 252.509 52.6622 252.072 54.8595 252.072C56.6302 252.072 58.1875 252.371 59.5315 252.968C60.8968 253.544 62.0275 254.376 62.9235 255.464C63.8408 256.531 64.5342 257.821 65.0035 259.336C65.4728 260.851 65.7075 262.525 65.7075 264.36V285H59.9795V264.36C59.9795 261.907 59.4142 260.008 58.2835 258.664C57.1742 257.299 55.4782 256.616 53.1955 256.616C51.5102 256.616 49.9315 257.021 48.4595 257.832C47.0088 258.643 45.6648 259.741 44.4275 261.128V285H38.6995V237.864H44.4275V256.904ZM88.051 252.072C90.419 252.072 92.5523 252.467 94.451 253.256C96.3497 254.045 97.971 255.165 99.315 256.616C100.659 258.067 101.683 259.827 102.387 261.896C103.112 263.944 103.475 266.237 103.475 268.776C103.475 271.336 103.112 273.64 102.387 275.688C101.683 277.736 100.659 279.485 99.315 280.936C97.971 282.387 96.3497 283.507 94.451 284.296C92.5523 285.064 90.419 285.448 88.051 285.448C85.6617 285.448 83.507 285.064 81.587 284.296C79.6883 283.507 78.067 282.387 76.723 280.936C75.379 279.485 74.3443 277.736 73.619 275.688C72.915 273.64 72.563 271.336 72.563 268.776C72.563 266.237 72.915 263.944 73.619 261.896C74.3443 259.827 75.379 258.067 76.723 256.616C78.067 255.165 79.6883 254.045 81.587 253.256C83.507 252.467 85.6617 252.072 88.051 252.072ZM88.051 281C91.251 281 93.6403 279.933 95.219 277.8C96.7977 275.645 97.587 272.648 97.587 268.808C97.587 264.947 96.7977 261.939 95.219 259.784C93.6403 257.629 91.251 256.552 88.051 256.552C86.4297 256.552 85.011 256.829 83.795 257.384C82.6003 257.939 81.5977 258.739 80.787 259.784C79.9977 260.829 79.4003 262.12 78.995 263.656C78.611 265.171 78.419 266.888 78.419 268.808C78.419 272.648 79.2083 275.645 80.787 277.8C82.387 279.933 84.8083 281 88.051 281ZM116.428 277.192C117.473 278.6 118.614 279.592 119.852 280.168C121.089 280.744 122.476 281.032 124.012 281.032C127.041 281.032 129.366 279.955 130.988 277.8C132.609 275.645 133.42 272.573 133.42 268.584C133.42 266.472 133.228 264.659 132.844 263.144C132.481 261.629 131.948 260.392 131.244 259.432C130.54 258.451 129.676 257.736 128.652 257.288C127.628 256.84 126.465 256.616 125.164 256.616C123.308 256.616 121.676 257.043 120.268 257.896C118.881 258.749 117.601 259.955 116.428 261.512V277.192ZM116.14 257.608C117.505 255.923 119.084 254.568 120.876 253.544C122.668 252.52 124.716 252.008 127.02 252.008C128.897 252.008 130.593 252.371 132.108 253.096C133.622 253.8 134.913 254.856 135.98 256.264C137.046 257.651 137.868 259.379 138.444 261.448C139.02 263.517 139.308 265.896 139.308 268.584C139.308 270.973 138.988 273.203 138.347 275.272C137.708 277.32 136.78 279.101 135.564 280.616C134.369 282.109 132.897 283.293 131.148 284.168C129.42 285.021 127.468 285.448 125.292 285.448C123.308 285.448 121.601 285.117 120.172 284.456C118.764 283.773 117.516 282.835 116.428 281.64V295.976H110.7V252.584H114.124C114.934 252.584 115.436 252.979 115.628 253.768L116.14 257.608ZM168.271 265.256C168.271 263.933 168.079 262.728 167.695 261.64C167.332 260.531 166.788 259.581 166.063 258.792C165.359 257.981 164.495 257.363 163.471 256.936C162.447 256.488 161.284 256.264 159.983 256.264C157.252 256.264 155.087 257.064 153.487 258.664C151.908 260.243 150.927 262.44 150.543 265.256H168.271ZM172.879 280.456C172.175 281.309 171.332 282.056 170.351 282.696C169.369 283.315 168.313 283.827 167.183 284.232C166.073 284.637 164.921 284.936 163.727 285.128C162.532 285.341 161.348 285.448 160.175 285.448C157.935 285.448 155.865 285.075 153.967 284.328C152.089 283.56 150.457 282.451 149.071 281C147.705 279.528 146.639 277.715 145.871 275.56C145.103 273.405 144.719 270.931 144.719 268.136C144.719 265.875 145.06 263.763 145.743 261.8C146.447 259.837 147.449 258.141 148.751 256.712C150.052 255.261 151.641 254.131 153.519 253.32C155.396 252.488 157.508 252.072 159.855 252.072C161.796 252.072 163.588 252.403 165.231 253.064C166.895 253.704 168.324 254.643 169.519 255.88C170.735 257.096 171.684 258.611 172.367 260.424C173.049 262.216 173.391 264.264 173.391 266.568C173.391 267.464 173.295 268.061 173.103 268.36C172.911 268.659 172.548 268.808 172.015 268.808H150.351C150.415 270.856 150.692 272.637 151.183 274.152C151.695 275.667 152.399 276.936 153.295 277.96C154.191 278.963 155.257 279.72 156.495 280.232C157.732 280.723 159.119 280.968 160.655 280.968C162.084 280.968 163.311 280.808 164.335 280.488C165.38 280.147 166.276 279.784 167.023 279.4C167.769 279.016 168.388 278.664 168.879 278.344C169.391 278.003 169.828 277.832 170.191 277.832C170.66 277.832 171.023 278.013 171.279 278.376L172.879 280.456ZM202.083 265.256C202.083 263.933 201.891 262.728 201.507 261.64C201.144 260.531 200.6 259.581 199.875 258.792C199.171 257.981 198.307 257.363 197.283 256.936C196.259 256.488 195.096 256.264 193.795 256.264C191.064 256.264 188.899 257.064 187.299 258.664C185.72 260.243 184.739 262.44 184.355 265.256H202.083ZM206.691 280.456C205.987 281.309 205.144 282.056 204.163 282.696C203.182 283.315 202.126 283.827 200.995 284.232C199.886 284.637 198.734 284.936 197.539 285.128C196.344 285.341 195.16 285.448 193.987 285.448C191.747 285.448 189.678 285.075 187.779 284.328C185.902 283.56 184.27 282.451 182.883 281C181.518 279.528 180.451 277.715 179.683 275.56C178.915 273.405 178.531 270.931 178.531 268.136C178.531 265.875 178.872 263.763 179.555 261.8C180.259 259.837 181.262 258.141 182.563 256.712C183.864 255.261 185.454 254.131 187.331 253.32C189.208 252.488 191.32 252.072 193.667 252.072C195.608 252.072 197.4 252.403 199.043 253.064C200.707 253.704 202.136 254.643 203.331 255.88C204.547 257.096 205.496 258.611 206.179 260.424C206.862 262.216 207.203 264.264 207.203 266.568C207.203 267.464 207.107 268.061 206.915 268.36C206.723 268.659 206.36 268.808 205.827 268.808H184.163C184.227 270.856 184.504 272.637 184.995 274.152C185.507 275.667 186.211 276.936 187.107 277.96C188.003 278.963 189.07 279.72 190.307 280.232C191.544 280.723 192.931 280.968 194.467 280.968C195.896 280.968 197.123 280.808 198.147 280.488C199.192 280.147 200.088 279.784 200.835 279.4C201.582 279.016 202.2 278.664 202.691 278.344C203.203 278.003 203.64 277.832 204.003 277.832C204.472 277.832 204.835 278.013 205.091 278.376L206.691 280.456Z" fill="#805146"/>
                            <path d="M144 81.5C144 103.002 138.959 122.126 131.17 135.632C123.274 149.325 113.415 156 104 156C94.585 156 84.7262 149.325 76.8299 135.632C69.041 122.126 64 103.002 64 81.5C64 59.9975 69.041 40.8741 76.8299 27.3678C84.7262 13.6753 94.585 7 104 7C113.415 7 123.274 13.6753 131.17 27.3678C138.959 40.8741 144 59.9975 144 81.5Z" stroke="#805146" stroke-width="14"/>
                            <path d="M4.80074 71.7433C4.36847 65.9437 8.95741 61 14.7731 61H192.227C198.043 61 202.632 65.9437 202.199 71.7433L192.794 197.933C191.782 211.505 180.475 222 166.866 222H40.1342C26.5245 222 15.2177 211.505 14.2062 197.933L4.80074 71.7433Z" fill="#805146"/>
                            <path d="M130.72 104.99C130.3 105.783 129.693 106.18 128.9 106.18C128.293 106.18 127.5 105.76 126.52 104.92C125.587 104.033 124.303 103.077 122.67 102.05C121.037 100.977 118.983 99.9967 116.51 99.11C114.083 98.2233 111.073 97.78 107.48 97.78C103.887 97.78 100.713 98.2933 97.96 99.32C95.2533 100.347 92.9667 101.747 91.1 103.52C89.28 105.293 87.88 107.347 86.9 109.68C85.9667 112.013 85.5 114.463 85.5 117.03C85.5 120.39 86.2 123.167 87.6 125.36C89.0467 127.553 90.9367 129.42 93.27 130.96C95.6033 132.5 98.24 133.807 101.18 134.88C104.167 135.907 107.223 136.933 110.35 137.96C113.477 138.987 116.51 140.13 119.45 141.39C122.437 142.603 125.097 144.143 127.43 146.01C129.763 147.877 131.63 150.187 133.03 152.94C134.477 155.647 135.2 159.03 135.2 163.09C135.2 167.243 134.477 171.163 133.03 174.85C131.63 178.49 129.577 181.663 126.87 184.37C124.163 187.077 120.85 189.223 116.93 190.81C113.01 192.35 108.53 193.12 103.49 193.12C96.9567 193.12 91.3333 191.977 86.62 189.69C81.9067 187.357 77.7767 184.183 74.23 180.17L76.19 177.09C76.75 176.39 77.4033 176.04 78.15 176.04C78.57 176.04 79.1067 176.32 79.76 176.88C80.4133 177.44 81.2067 178.14 82.14 178.98C83.0733 179.773 84.1933 180.66 85.5 181.64C86.8067 182.573 88.3233 183.46 90.05 184.3C91.7767 185.093 93.76 185.77 96 186.33C98.24 186.89 100.783 187.17 103.63 187.17C107.55 187.17 111.05 186.587 114.13 185.42C117.21 184.207 119.8 182.573 121.9 180.52C124.047 178.467 125.68 176.04 126.8 173.24C127.92 170.393 128.48 167.36 128.48 164.14C128.48 160.64 127.757 157.77 126.31 155.53C124.91 153.243 123.043 151.353 120.71 149.86C118.377 148.32 115.717 147.037 112.73 146.01C109.79 144.983 106.757 143.98 103.63 143C100.503 142.02 97.4467 140.923 94.46 139.71C91.52 138.497 88.8833 136.957 86.55 135.09C84.2167 133.177 82.3267 130.82 80.88 128.02C79.48 125.173 78.78 121.627 78.78 117.38C78.78 114.067 79.41 110.87 80.67 107.79C81.93 104.71 83.7733 102.003 86.2 99.67C88.6267 97.29 91.6133 95.4 95.16 94C98.7533 92.5533 102.837 91.83 107.41 91.83C112.543 91.83 117.14 92.6467 121.2 94.28C125.307 95.9133 129.04 98.41 132.4 101.77L130.72 104.99Z" fill="white"/>
                        </svg>    
                    </div>
                </div>
                <hr class="hr-footer mx-auto">
            </div>
        </div>
        <a href="#" class="scrollToTop btn" style="position: fixed; bottom: 30px; right: 30px; display: none"><i class="fas fa-fw fa-chevron-up"></i></a>
        <!-- content section 3 end -->
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/slick/slick.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
    <script src="../assets/sweet/sweetalert2.all.min.js"></script>
	<script>
		function logout() {
        Swal.fire({
        title: 'Logout',
        text: "Anda yakin ingin logout?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Kembali',
        reverseButtons: true
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Anda telah logout',
                    icon: 'success',
                    timer: 1000,
                    onClose: () => {
                    window.location.replace('../log-reg/logout.php')
                    }
                })
            }
        })
      }
	</script>
</body>
</html>