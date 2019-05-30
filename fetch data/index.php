
<?php

    $host           = 'localhost';
    $user           = 'root';
    $password       = '';
    $database       = 'rosebel';


    $conn = mysqli_connect($host,$user,$password,$database);

    if ( !$conn ) {
        echo "Connect ". mysqli_connect_error();
    }


    $sql = "SELECT * FROM `products`";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);


//free memory

    mysqli_free_result($result);

//connection











    //echo "<pre>";
    //print_r( $data );



?>








<!-- include header here -->
<?php include('components/header.php'); ?>
<?php include('components/content.php'); ?>




<section class="product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-2">
                    <?php
                        if (!empty($data)) {
                            foreach ($data as $product) {

                                ?>
                                <div class="col-md-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title text-warning" style="font-weight:bold;"><?php echo $product['product_name']; ?></h3>



<!--       
        <p class="card-text"><?php /*echo $product['colors']; */?></p>
-->

                                            <span style="color: yellowgreen;"><b>Colors : </b></span>
                                            <?php
                                                $singleColor = explode(',', $product['colors']);
                                               
                                               foreach ($singleColor as $color):?>
                                                    <ul>
                                                        <li><?php echo $color; ?></li>
                                                    </ul>
                                                <?php endforeach; ?>

                                            <a href="#" class="btn btn-primary">Details</a>
                                            <a href="#" class="btn btn-primary">Price : <?php echo $product['price'] ?>
                                                Taka</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- include footer here -->
<?php include('components/footer.php'); ?>




