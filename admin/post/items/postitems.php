<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "../../../config/item_config.php";
    
        if(isset($_POST['but_upload'])){
            $item_name = $_POST['item_name'];
            $item_subname = $_POST['item_subname'];
            $item_desc = $_POST['item_desc'];
            $item_stock = $_POST['item_stock'];
            $item_file = $_FILES['item_file']['name'];
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["item_file"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");

            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
                
                // Convert to base64 
                $image_base64 = base64_encode(file_get_contents($_FILES['item_file']['tmp_name']) );
                $item_img = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                // Insert record
                $query = "insert into items(item_name,item_subname,item_desc,item_stock,item_file,item_img) values('".$item_name."','".$item_subname."','".$item_desc."','".$item_stock."','".$item_file."','".$item_img."')";
            
                mysqli_query($con,$query) or die(mysqli_error($con));
                
                // Upload file
                move_uploaded_file($_FILES['item_file']['tmp_name'],'upload/'.$item_file);
                echo '<script>alert("Successfully upload items")</script>';
            }
        }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Items - Cressida Beauty</title>
    <link rel="icon" href="../../../assets/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/sb-admin.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>  
</head>
<body>
    <div class="container"> 
        <div class="col-md-6 mt-5 px-4 py-4 shadow" style="margin: 0 auto; background-color: #fff">
            <p class="mb-2">&larr; <a href="http://localhost/work/cressidabeauty_admin/index.php/crsitems"> Kembali</a></p>
            <h3 class="text-dark mb-3">Post Items</h3>
            <hr>
            <form method="post" action="" enctype='multipart/form-data'>
                <div class="form-group">
                    <label><b>Item Name</b></label>
                    <input type="text" name="item_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><b>Item Sub Name</b></label>
                    <input type="text" name="item_subname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><b>Item Description</b></label>
                    <textarea type="text" id="postitems" name="item_desc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label><b>Item Stock</b></label>
                    <input type="number" name="item_stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><b>Item Image</b></label><br>
                    <input type='file' name='item_file' />
                </div>
                <input class="btn btn-block btn-primary mt-3" type='submit' value='Submit' name='but_upload'>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../../../assets/js/main.js"></script>
    <script src="../../../assets/sweet/sweetalert2.all.min.js"></script>

    <script>
		ClassicEditor
			.create( document.querySelector( '#postitems' ) )
			.catch( error => {
				console.error( error );
			} );
	</script>
</body>
</html>