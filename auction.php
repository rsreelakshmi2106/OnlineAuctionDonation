<?php
include("header.php");
?>

<div class="container-xxl py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <?php
            include("conn.php");
            $select = "SELECT * FROM products WHERE id='$_REQUEST[id]'";
            $res = mysqli_query($con, $select);
            $row = mysqli_fetch_array($res);
            ?>
            <div class="col-lg-12">
                <br>
                <br>
                <div class="row g-5 align-items-center">
                    <center><h1 class="mb-5"></h1></center>
                </div>
                <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <input type="text" class="form-control border-0" name="p_id" hidden value="<?php echo $row['id']; ?>" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" readonly name="name" value="<?php echo $row['name']; ?>" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" readonly name="category" value="<?php echo $row['category']; ?>"  style="height: 55px;">
                            </div>
                            <div class="col-6">
                                <input class="form-control border-0" name="disc" readonly value="<?php echo $row['disc']; ?>" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" readonly value="<?php echo $row['image']; ?>" name="image"  style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0"  name="price" placeholder="Price" style="height: 55px;" required>
                            </div>
                            <!--0div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" id="current_time" readonly name="current_time" style="height: 55px;">
                            </div-->
							  <div class="col-12 col-sm-6">
                              <label style="">start time</label>
								<input type="datetime-local" name="s_datetime"  class="form-control border-0"  style="height: 55px;" required>
                            </div>
							  <div class="col-12 col-sm-6">
                             
							 <label style="float-left">end time</label>
								<input type="datetime-local" name="e_datetime"  class="form-control border-0"  style="height: 55px;" required>
                            </div>
                            <div class="col-12">
							 
                                <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    include("conn.php");
                    
                    if (isset($_POST['submit'])) {
                        $p_id = $_POST['p_id'];
                        $name = $_POST['name'];
                        $category = $_POST['category'];
                        $disc = $_POST['disc'];
                        $image = $_POST['image'];
                        $price = $_POST['price'];
                        $start = $_POST['s_datetime'];
                        $end = $_POST['e_datetime'];
                        $ini_price=$_POST['price'];
                       // $start = $_POST['current_time'];
                        $up = "UPDATE products SET price='$price' where id='$p_id'";
                        mysqli_query($con, $up);
                        $ins = "INSERT INTO auction(p_id, name, category, disc, image, price,s_time, e_time,initial_price) VALUES ('$p_id', '$name', '$category', '$disc', '$image', '$price', '$start','$end','$ini_price')";
                        mysqli_query($con, $ins);
                        echo '<script>
                        window.location="index.php";
                        </script>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script>
    // Update current time every second
    setInterval(function() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var formattedTime = hours + ":" + minutes + ":" + seconds;
        document.getElementById("current_time").value = formattedTime;
    }, 1000);
</script-->

<?php
include("footer.php");
?>
