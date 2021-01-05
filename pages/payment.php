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

$name = $_SESSION["user"]["name"];
$sql_items = "SELECT * FROM transaksi WHERE username='$name' ORDER BY id ASC";
$result_items = mysqli_query($con, $sql_items);

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "remove":
            $del = "DELETE FROM transaksi WHERE id='".$_GET["user"]."'";
            mysqli_query($con,$del) or die(mysqli_error($con));

            echo '<script>
            alert("Successfully remove item");
            location="payment.php";
            </script>';
        break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Cressida Beauty</title>
    <link rel="icon" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/sb-admin.css">
    <link rel="stylesheet" href="../assets/slick/slick.css">
    <link rel="stylesheet" href="../assets/slick/slick-theme.css"/>
</head>
<body class="content-2">
    <div class="bg-header pad-header">
        <div class="container">
            <div class="row">
                <a href="home.php">
                    <svg width="40" height="32" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 23V19C21 20.6 23.3333 22.3333 24.5 23H21Z" fill="#825348"/>
                        <path d="M22.0182 16C19.6182 13.6 22.0182 11 23.5182 10C23.0181 14 25.0182 13.5 29.0182 17C32.2182 19.8 28.6849 22.1667 26.5182 23C29.5182 19.5 25.0182 19 22.0182 16Z" fill="#805146"/>
                        <path d="M16.7201 0.423439V8.42344C14.3201 0.423423 9.72011 0.423433 7.72009 1.42344C-1.27994 6.42342 3.72009 14.9235 6.72009 16.9235C9.12009 18.5235 12.3868 16.9235 13.7201 15.9235C16.6467 12.7823 23.4 6.6 27 7C30 7 31.5 9.5 30.5 11.5C29.5 13.5 26.5 13 27 11C27.3333 10.6667 27.8 9.6 27 8C26.2 6.4 20.8134 10.2823 18.2201 12.4235L14.2201 16.4235C14.0534 16.9235 12.7201 18.0235 8.72012 18.4235C3.72012 18.9235 -3.27988 10.9234 1.72012 3.92344C5.72012 -1.67656 12.3868 -0.0765601 15.2201 1.42344L16.7201 0.423439Z" fill="#805146"/>
                        <path d="M15 12L18 9V20C18 20.8 18.6667 21.6667 19 22H13C14.2 21.6 14.5 20.5 14.5 20V14C14.5 13.2 14.5 13 15 12Z" fill="#805146"/>
                        <circle cx="28.5" cy="10.5" r="2.5" fill="#805146"/>
                    </svg>
                </a>
                <div class="ml-3 payment-title">Checkout</div>
            </div>
        </div>
    </div>
    <div class="container mt-2 mb-2 p-0">
        <div class="p-0 col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="col p-3 address-section my-2">
                        <div class="font">
                            <i class="fas fa-fw fa-map-marker-alt"></i>
                            Shipping address
                        </div>
                        <hr>
                        <div class="mt-2">
                            <table class="table-responsive">
                                <tr>
                                    <td class="text-dark" style="width: 200px;">Person name</td>
                                    <td class="text-dark" style="width: 450px;">Person address, lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
                                    <td class="text-dark text-center" style="width: 100px;"><a class="btn-change-address" href="#">Change</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col p-3 item-section my-2">
                        <div class="font">
                            <i class="fas fa-fw fa-shopping-basket"></i>
                            Your Product
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                            <table class="table-responsive px-3">
                                <tr>
                                    <th class="font text-center" style="width: 80px;">Item pict</th>
                                    <th class="font text-center" style="width: 200px;">Item name</th>
                                    <th class="font text-center" style="width: 150px;">Unit price</th>
                                    <th class="font text-center" style="width: 50px;">Qty</th>
                                    <th class="font text-center" style="width: 150px;">Subtotals</th>
                                    <th class="font text-center" style="width: 100px;">Action</th>
                                </tr>
                            <?php while($data_items = mysqli_fetch_array($result_items)) { 
                                $itemprice = $data_items['item_price'];
                                ?>
                                <tr>
                                    <td class="text-center"><img src="../admin/post/items/upload/<?php echo $data_items['item_img'] ?>" width="50px" alt=""></td>
                                    <td class="font text-center" style="font-size: 12px !important;"><?php echo $data_items["item_name"] ?></td>
                                    <td class="font text-center"><?php echo number_format($data_items['item_price']) ?></td>
                                    <td class="font text-center"><?php echo $data_items['item_qty'] ?></td>
                                    <td class="font text-center"><?php echo number_format($data_items['total_price']) ?></td>
                                    <td class="font text-center">
                                        <a class="font" href="payment.php?action=remove&user=<?php echo $data_items['id'] ?>">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="col p-3 kurir-section my-2">
                        <div class="font">
                            <i class="fas fa-fw fa-truck"></i>
                            Delivery Service
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="font">JNE Express</div>
                        </div>
                        <?php 
                        $ongkir = 14000;
                        ?>
                        <div class="d-flex justify-content-between">
                            <div class="font">Total : </div>
                            <div class="font">Rp <?php echo number_format($ongkir) ?></div>
                        </div>
                    </div>
                    <div class="col p-3 bayar-section my-2">
                        <div class="font">
                            <i class="fas fa-fw fa-money-check-alt"></i>
                            Payment Method
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="font">Bank Transfer</div>
                            <div class="font">No. rek : 90003129200</div>
                        </div>
                    </div>
                    <div class="col p-3 total-section my-2">
                        <div class="font">
                            <i class="fas fa-fw fa-money-bill-wave"></i>
                            Total Payment
                        </div>
                        <hr>
                        <div class="d-flex my-2 justify-content-between">
                            <div class="font">Total shipping cost : </div>
                            <div class="font">Rp <?php echo number_format($ongkir) ?></div>
                        </div>
                        <?php
                        $query_sum_qty = "SELECT SUM(item_qty) FROM transaksi WHERE username='$name'";
                        $result = mysqli_query($con, $query_sum_qty);
                        while($row = mysqli_fetch_array($result)){
                            $grand_subtotal = $itemprice * $row['SUM(item_qty)'];
                            $grand_total = $ongkir + ($itemprice * $row['SUM(item_qty)']);
                        }
                        ?>
                        <div class="d-flex my-2 justify-content-between">
                            <div class="font">Subtotal for product : </div>
                            <div class="font">Rp <?php echo number_format($grand_subtotal) ?></div>
                            </div>
                        <div class="d-flex my-2 justify-content-between">
                        <div class="font">Total payment : </div>
                        <div class="font">Rp <?php echo number_format($grand_total) ?></div>
                        </div>
                        <hr>
                        <a href="#" class="btn btn-order btn-block rounded-0">Make Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <a href="#" class="scrollToTop btn" style="position: fixed; bottom: 20px; right: 15px; display: none; z-index: 3;"><i class="fas fa-fw fa-chevron-up"></i></a>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
    <script src="../assets/sweet/sweetalert2.all.min.js"></script>
</body>
</html>