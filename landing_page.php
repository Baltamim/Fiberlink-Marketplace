<?php

include 'config.php';

session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }

// if(isset($_POST['add_to_cart'])){

//    $product_name = $_POST['product_name'];
//    $product_price = $_POST['product_price'];
//    $product_image = $_POST['product_image'];
//    $product_quantity = $_POST['product_quantity'];

//    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

//    if(mysqli_num_rows($check_cart_numbers) > 0){
//       $message[] = 'already added to cart!';
//    }else{
//       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
//       $message[] = 'product added to cart!';
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header_landing.php'; ?>

<section class="home">

   <div class="content">
      <h3>Hand Picked Book to your door.</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
      <!-- <a href="about.php" class="white-btn">discover more</a> -->
   </div>

</section>

<section class="products">

   <h1 class="title">Latest Products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="login.php" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" width="100%">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rp <?php echo $fetch_products['price']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop2.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>CV Tridaya didirikan tahun 2004 di kota Jakarta. Perusahaan ini bergerak di bidang perdagangan untuk barang-barang telekomunikasi dan bermitra dengan PT telekomunikasi Indonesia.
Pada awalnya barang-barang yang diperdagangkan adalah untuk jaringan tembaga, seiring perkembangan di dunia pertelekomunikasian Indonesia jaringan tembaga mulai bermigrasi ke jaringan fiber optik, dan CV Tridaya aktif berkegiatan di jaringan fiber optik juga.
Sebagian Mitra dagangnya antara lain:
Koperasi Pegawai Telkom Solo,
Mataram, Jakarta Selatan, Jayapura, Pasuruan, Palu, PT Putri indah Palembang, PT anutapura palu, PT rajawali Mitra solusi Jakarta, PT anhako Solo, PT Putrajaya Bandung, PT Mitra akses Suropati Pasuruan, PT Mitra akses Solusindo Pandaan.</p>
         <!-- <a href="about.php" class="btn">read more</a> -->
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p> -->
      <a href="contact2.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer_user.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>