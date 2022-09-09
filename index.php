<?php require_once('connection.php'); ?>





<?php
if (isset($_POST['submit'])) {

  $c_name = mysqli_real_escape_string($connection, $_POST['c-name']);
  $c_email = mysqli_real_escape_string($connection, $_POST['c-email']);
  $c_number = mysqli_real_escape_string($connection, $_POST['c-number']);
  $c_massage = mysqli_real_escape_string($connection, $_POST['c-massage']);
  $c_read = "1";

  $query = "INSERT INTO contact (c_name,email,mobile_num,msg,c_read) VALUES ('$c_name','$c_email','$c_number' , '$c_massage','$c_read')";

  $result = mysqli_query($connection, $query);
}




$sql = "SELECT * FROM gallerydb";
$result = mysqli_query($connection, $sql);
$result1 = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home-Company</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>


<body>
  <div class="container  container-lg position-relative" id="container">
    <div class="" id="board">
      <?php require_once('h&f/header.php'); ?>
      <div class="row align-content-center">
        <div class="position-relative mt-3">
          <div class="bg-image-hight col-12">

            <div class=" position-relative">
              <div class="modal fade" tabindex="-1" id="contact-form">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                      <h5 class="modal-title">Contact US</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row ">
                      <div class="col-sm-12 col-md-5 mx-4 mt-auto mb-auto">
                        <h3>Address</h3>
                        <p>Lorem ipsum dolor, <br> sit amet consectetur , <br> adipisicing elit,<br> Fugiat
                          sequi.</p>
                      </div>
                      <div class="col-sm-12 col-md-5">
                        <form action="" method="post">
                          <div class="mb-3">
                            <label for="Email" class="form-label"> Enter Your Name</label>
                            <input type="text" name="c-name" class="form-control" id="c-name" required>
                          </div>
                          <div class="mb-3">
                            <label for="Name" class="form-label">Email address</label>
                            <input type="email" name="c-email" class="form-control" id="c-email" required>
                          </div>
                          <div class="mb-3">
                            <label for="Name" class="form-label">Mobile Number</label>
                            <input type="text" name="c-number" class="form-control" id="c-number">
                          </div>
                          <div class="mb-3">
                            <label for="msg" class="form-label">Enter Your Massage</label>
                            <textarea class="form-control" id="msg" name="c-massage" style="height: 200px;" rows="30" cols="100"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Send</button>
                          </div>
                        </form>
                      </div>
                    </div>



                  </div>
                </div>
              </div>
            </div>
            <div class="heading w-75 m-auto me-5">
              <h1 class="h1  text-white " data-aos="fade-in">Home Decoration</h1>
              <div class="d-sm-block d-md-block d-none">
                <p class="w-75 text-white " data-aos="fade-up">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, perspiciatis est?
                  Sequi tenetur tempora
                  deleniti possimus enim consectetur aliquid a vel, architecto quae laudantium soluta, commodi, magni
                  perferendis laboriosam minima!</p>
                <button class="btn text-white"><a href="#GALLERY" class=" text-decoration-none text-dark">See More</a></button>
              </div>
            </div>


          </div>
          <div class="d-sm-none  d-block ">
            <p class="w-100 text-black ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, perspiciatis est?
              Sequi tenetur tempora
              deleniti possimus enim consectetur aliquid a vel, architecto quae laudantium soluta, commodi, magni
              perferendis laboriosam minima!</p>
            <button class="btn text-white"><a href="#GALLERY" class=" text-decoration-none text-dark">See More</a></button>
          </div>
        </div>

      </div>

      <section>
        <div class="row align-content-center ">
          <div class=" text-center mt-4">
            <h4 class="h4">Our Social Media</h4>
          </div>
          <div class="col align-items-center">
            <a href="#" class=" text-decoration-none">
              <div class="i-button">
                <div class="icon"> <i class="fab fa-facebook-f"></i>
                </div>
                <span>Facebook</span>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="#" class=" text-decoration-none">
              <div class="i-button">
                <div class="icon"> <i class="fab fa-twitter"></i>
                </div>
                <span>twitter</span>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="#" class=" text-decoration-none">
              <div class="i-button">
                <div class="icon"> <i class="fab fa-youtube"></i>
                </div>
                <span>Youtube</span>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="#" class=" text-decoration-none">
              <div class="i-button">
                <div class="icon"> <i class='fab fa-tiktok'></i>
                </div>
                <span>Tik-Tok</span>
              </div>
            </a>
          </div>
          <div class="col">
            <a href="#" class=" text-decoration-none">
              <div class="i-button">
                <div class="icon"> <i class="fab fa-instagram"></i>
                </div>
                <span>Instagram</span>
              </div>
            </a>
          </div>
        </div>
    </div>
    </section>

    <section class=" mt-4">
      <div class="m-auto">
        <div class="Features" id="FEATURES">
          <div class="row m-2" data-aos="fade-up">
            <div class=" col-md-5 col-12">
              <img src="img/gallery/146Z_2107.w023.n001.660B.p1.660.jpg" class=" img-fluid" alt="">
            </div>
            <div class=" col-md-5 col-12 ">
              <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
              <ul>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio similique magni quas omnis dignissimos tempora?</p>
                </li>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur Odio similique magni quas omnis dignissimos tempora? </p>
                </li>
                <li>
                  <p>Lorem ipsum . Odio similique magni quas omnis dignissimos tempora? <a href="blog.php?b-id=29">
                      << See More>>
                    </a></p>
                </li>

              </ul>
            </div>
          </div>
          <div class="row justify-content-end m-2" data-aos="fade-up">

            <div class="col-md-5 col-12 ">
              <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
              <img src="img/gallery/FB_IMG_1628909156311.jpg" class=" img-fluid d-md-none" alt="">

              <ul>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio similique magni quas omnis dignissimos tempora?</p>
                </li>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur Odio similique magni quas omnis dignissimos tempora?</p>
                </li>
                <li>
                  <p>Lorem ipsum . Odio similique magni quas omnis dignissimos tempora? <a href="blog.php?b-id=29">
                      << See More>>
                    </a></p>
                </li>

              </ul>
            </div>
            <div class="col-md-5 col-12 ">
              <img src="img/gallery/FB_IMG_1628909156311.jpg" class=" img-fluid d-none d-md-block" alt="">
            </div>
          </div>


          <div class="row m-2" data-aos="fade-up">
            <div class="col-md-5 col-12 ">
              <img src="img/gallery/FB_IMG_1620823965057.jpg" class=" img-fluid d-none d-md-block" alt="">
            </div>
            <div class="col-md-5 col-12 ">
              <h3>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h3>
              <img src="img/gallery/FB_IMG_1620823965057.jpg" class=" img-fluid d-md-none" alt="">

              <ul>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur, a magni quas omnis dignissimos tempora?</p>
                </li>
                <li>
                  <p>Lorem ipsum dolor sit amet consectetur tempora?</p>
                </li>
                <li>
                  <p>Lorem ipsum . Odio similique magni quas omnis dignissimos tempora?<a href="blog.php?b-id=29">
                      << See More>>
                    </a> </p>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="row mt-5">
        <div class="col-3">
          <img src="img/gallery146Z_2107.w023.n001.660B.p1.660.jpg" class=" image-grayscale w-75" alt="">
        </div>
        <div class="col-4">
          <h6 class="h6 m-auto mt-5 ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint, commodi?</h6>
        </div>

      </div>
      <div class="row">
        <div class="col-4"></div>

        <div class="col-3">
          <h6 class="h6 m-auto mt-5 ">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint, commodi?</h6>
        </div>
        <div class="col-4">
          <img src="img/furniture-g593aba131_1920.jpg" class=" img-thumbnail w-75 " alt="">
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-2 col-sm-3 col-5 ">
          <button class="btn m-0 p-1"> <a href="blog-gallery.php">
              << See More>>
            </a></button>
        </div>
      </div>
    </section>
    <div class="mt-5 mb-3" id="gallery">
      <div class=" text-center">
        <h2>Our Works</h2>
      </div>
      <div id="gallery-slide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/dark-wall-empty-room-with-plants-floor-3d-rendering.jpg" class="img-thumbnail" alt="">
          </div>
          <?php
          while ($row = mysqli_fetch_array($result1)) {
          ?>
            <div class="carousel-item ">
              <img src="<?php echo $row['gallery']; ?>" alt="<?php echo $row['gallery_name']; ?>" class="img-thumbnail h-75">

            </div>
          <?php } ?>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-2 col-sm-3 col-5 ">
            <button class="btn m-0 p-1"> <a href="gallery.php">
                << See More>>
              </a></button>
          </div>
        </div>
      </div>

      </section>

      <section class="display-none">
        <div class="slide hi-slide" id="">
          <div class="hi-prev "><span class=""></span></div>
          <div class="hi-next "> <span class=""></span></div>
          <ul>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <li>
                <img src="<?php echo $row['gallery']; ?>" alt="<?php echo $row['gallery_name']; ?> ">
              </li>

            <?php } ?>

          </ul>
          <div class="row justify-content-center">
            <div class="col-md-2 col-sm-3 col-5 ">
              <button class="btn m-0 p-1"> <a href="gallery.php">See More</a></button>
            </div>
          </div>
        </div>
      </section>
    </div>


    <section class=" mt-5" data-aos="fade-in">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h3 class="h3">Design Tips</h3>
          <p>1.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas libero illum, sint pariatur
            voluptatibus reiciendis!
          </p>
          <p>2.Lorem Voluptas libero illum, sint pariatur voluptatibus reiciendis!
          </p>
          <p>3.Lorem ipsum dolor sit atas libero illum, sint pariatur voluptatibus reiciendis!
          </p>
        </div>
        <div class=" col-md-5 position-relative">
          <img src="img/pots-g749bf87c9_1920.jpg" class=" img-thumbnail" alt="">

        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-2 col-sm-3 col-5 ">
          <button class="btn m-0 p-1"> <a href="blog-gallery.php">See More</a></button>
        </div>
      </div>
    </section>
    <section class=" mt-md-5">
      <div class="row">
        <div class="col-md-6 text-end">
          <h3 class=" mt-5">SHOP</h3>
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="col-6 img_info">
          <img src="img/welcome-to-our-home-g73557b433_1920.jpg" class=" img-fluid img_info " alt="">
          <div class=" position-relative " data-aos="fade-up">
            <div class="info_text text-center m-md-1 m-lg-1">
              <h5 class="h6">Lorem ipsum dolor adip</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quo incidunt ipsam exercitationem ducimus totam maiores.</p>
            </div>
          </div>
        </div>
        <div class="col-6 mt-1 img_info">
          <img src="img/pots-g749bf87c9_1920.jpg" class=" img-fluid" alt="">
          <div class=" position-relative" data-aos="fade-up">
            <div class="info_text text-center m-md-1 m-lg-1">
              <h5 class="h6">Lorem adip</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quo incidunt ipsam exercitationem ducimus totam maiores.</p>
            </div>
          </div>
        </div>
        <div class="col-6 mt-1 img_info">
          <img src="img/modern-living-room-interior-with-sofa-green-plants-lamp-table-dark-wall-background.jpg" class=" img-fluid" alt="">
          <div class=" position-relative" data-aos="fade-up">
            <div class="info_text text-center m-md-1 m-lg-1">
              <h5 class="h6">Lorem ipsum</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quo incidunt ipsam exercitationem ducimus totam maiores.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <div class="container" style="margin-top: 20vh;">
      <?php require_once('h&f/footer.php'); ?>
    </div>

  </div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="js/jquery.hislide.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      offset: 120,
      duration: 1000,
    });
  </script>
</body>

</html>