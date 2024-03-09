<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LV_Phones</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LV_Phones</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/lib/flickity.css" media="screen">
  <link rel="stylesheet" href="./font/fontawesome-free-6.3.0-web/css/all.min.css" />
  <link rel="stylesheet" href="css/lib/bootstrap.min.css" />
  <script src="js/lib/jquery.min.js"></script>
  <script src="js/lib/popper.min.js"></script>
  <script src="js/lib/bootstrap.min.js"></script>
  <script src="js/lib/jquery-3.1.1.min.js"></script>
</head>

<body>
  <?php
  include('inc/load.php');
  include('db/connect.php');
  include('inc/header.php');
  include('inc/banner.php');

  ?>
  <div id="catalory">
    <div class="container">
      <span class="catalory_title">Danh Mục</span>
      <div class="catalory_item row col-6">
        <?php
        $str = "SELECT * FROM category ";
        $product_sql = mysqli_query($con, $str);
        while ($row = mysqli_fetch_array($product_sql)) {
        ?>

          <a href="" class="catalory_item-name">
            <?php echo $row['categoryName']; ?>
          </a>

        <?php } ?>
      </div>
    </div>
  </div>
  <div id="productlist">
    
  </div>
  <nav aria-label="Page navigation example">
      <ul class="pagination" style="justify-content:center;">
        <?php
        $productinpage = 10;
        $totalproduct_str = "SELECT COUNT(*) FROM product";
        $query = mysqli_query($con, $totalproduct_str);
        $row = mysqli_fetch_row($query);
        $totalproduct = $row[0];
        $totalpage = ceil($totalproduct / $productinpage);
        $count = 0;
        while ($count < $totalpage) {
          $count++;
          echo "<li class='page-item'><a class='page-link' >$count</a></li>";
        }
        ?>
      </ul>
    </nav>
  <?php
  include('inc/_loginModal.php');
  include('inc/_sigupModal.php');

  ?>
  <?php
  include('inc/footer.php');
  ?>
</body>
<script src="js/lib/flickity.min.js"></script>
<script src="js/main.js"></script>
<script>
  window.addEventListener('load', function(){
    $.get("./inc/product.php", {page:1}, function(data) {
            $("#productlist").html(data);
          });
  })
      function removenavactive(navitem) {
        navitem.forEach(function(aitem) {
          aitem.classList.remove("active");
        });
      }
      var namepage = document.querySelectorAll('.page-item')
      namepage[0].classList.add("active")
      var numpage = 0;
      namepage.forEach(function(item, index) {
        item.addEventListener('click', function(e) {
          removenavactive(namepage)
          item.classList.add("active")
          numpage = index+1;
          console.log(numpage);
        })
      });
      $(document).ready(function() {
        $(".page-item").click(function() {
          $.get("./inc/product.php", {page:numpage}, function(data) {
            $("#productlist").html(data);
          });
        });
      });
    </script>
</html>