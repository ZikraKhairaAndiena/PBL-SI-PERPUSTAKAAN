<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan Politeknik Negeri Padang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/icomoon/icomoon.css">  -->
	<link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


  <!-- Tambahkan referensi ke jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Tambahkan referensi ke Slick Carousel -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-lg-between">
    <h3 class="logo me-auto me-lg-0">
      <a href="index.php">
        <img src="assets/img/logopnp.png" alt="Your Logo" class="logo-img">
        Perpustakaan PNP<span>.</span>
      </a>
    </h3>
      <!-- .navbar -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <!-- <li><a class="nav-link scrollto " href="#gallery">Gallery</a></li> -->
          <li><a class="nav-link scrollto" href="#librarian">Librarian</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="admin/login.php" class="get-started-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Selamat Datang<span>.</span></h1>
          <h2>Di Website Perpustakaan Politeknik Negeri Padang</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <!-- <i class="ri-store-line "></i>  -->
            <i class="ri-database-2-line"></i> 
            <h3><a href="#it">Information Technology</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <!-- <i class="ri-bar-chart-box-line"></i> -->
            <i class="ri-calendar-todo-line"></i>
            <h3><a href="#literature">Literature</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <!-- <i class="ri-calendar-todo-line"></i> -->
            <i class="ri-store-line "></i>
            <h3><a href="#social">Social Sciences</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <!-- <i class="ri-paint-brush-line"></i> -->
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="#applied">Applied Sciences</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <!-- <i class="ri-database-2-line"></i> -->
            <i class="ri-paint-brush-line"></i>
            <h3><a href="#art">Art & Recreation</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= Information Technology ======= -->
	<section id="it" class="it">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2>Check our Books</h2>
            <p>Technology Information</p>
          </div>
          <div class="product-list slick-slider" data-aos="fade-up">
            <div class="row">
            <?php
            require 'koneksi.php';
            $query = "SELECT * FROM data_buku INNER JOIN pengarang ON data_buku.pengarang_id = pengarang.id WHERE kategori_id=7";
            $result = $db->query($query);
            
            // Memeriksa apakah query berhasil
            if ($result) {
                // Mengambil data buku dari hasil query
                $book = $result->fetch_assoc();
            
                // Menutup koneksi database
                $db->close();
            } else {
                echo "Error: " . $db->error;
            } 
            while ($book = $result->fetch_assoc()) : ?>
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <!-- Menggunakan URL gambar dari database -->
                        <?php
                        // Membuat URL lengkap ke gambar
                        $imageUrl = 'admin/' . $book['gambar'];
                        ?>
                        <img src="<?php echo $imageUrl; ?>" alt="Gambar Buku" class="book-image">
                    </figure>
                    <figcaption>
                        <h5><?php echo $book['judul']; ?></h5>
                        <span><?php echo $book['nama_pengarang']; ?></span>
                        <div class="thn_terbit"><?php echo $book['thn_terbit']; ?></div>
                        <div class="tersedia" style="color: red;">Tersedia: <?php echo $book['tersedia']; ?></div>
                    </figcaption>
                </div>
            </div>
        <?php endwhile; ?>

            </div><!-- ft-books-slider -->
          </div><!-- grid -->
        </div><!-- inner-content -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="btn-wrap align-right">
            <a href="#" class="btn-accent-arrow"> <button class="prev-button"> << Previous</button> <i class="icon icon-ns-arrow-right"></i></a>
            <a href="#" class="btn-accent-arrow" style="float: right;"><button class="next-button">Next >></button>  <i class="icon icon-ns-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function () {
        $('#it .product-list .row').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        // Click event handler for Prev button
        $(document).on('click', '.btn-wrap .prev-button', function (e) {
            e.preventDefault();
            console.log("Tombol Prev diklik");
            $('#it .product-list .row').slick('slickPrev');
        });

        // Click event handler for Next button
        $(document).on('click', '.btn-wrap .next-button', function (e) {
            e.preventDefault();
            console.log("Tombol Next diklik");
            $('#it .product-list .row').slick('slickNext');
        });
    });
</script>

    
    <!-- ======= Literature ======= -->
    <section id="literature" class="literature">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
        <div class="section-title">
          <h2>Check our Books</h2>
          <p>Literature</p>
        </div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item1.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Simple way of piece life</h3>
										<span>Armor Ramsey</span>
										<div class="item-price">$ 40.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item2.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Great travel at desert</h3>
										<span>Sanchit Howdy</span>
										<div class="item-price">$ 38.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item3.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>The lady beauty Scarlett</h3>
										<span>Arthur Doyle</span>
										<div class="item-price">$ 45.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item4.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Once upon a time</h3>
										<span>Klien Marry</span>
										<div class="item-price">$ 35.00</div>
									</figcaption>
								</div>
							</div>

						</div><!--ft-books-slider-->
					</div><!--grid-->
				</div><!--inner-content-->
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- ======= Soscial Sciences ======= -->
    <section id="social" class="social">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
        <div class="section-title">
          <h2>Check our Books</h2>
          <p>Social Sciences</p>
        </div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item1.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Simple way of piece life</h3>
										<span>Armor Ramsey</span>
										<div class="item-price">$ 40.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item2.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Great travel at desert</h3>
										<span>Sanchit Howdy</span>
										<div class="item-price">$ 38.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item3.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>The lady beauty Scarlett</h3>
										<span>Arthur Doyle</span>
										<div class="item-price">$ 45.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item4.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Once upon a time</h3>
										<span>Klien Marry</span>
										<div class="item-price">$ 35.00</div>
									</figcaption>
								</div>
							</div>

						</div><!--ft-books-slider-->
					</div><!--grid-->
				</div><!--inner-content-->
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- ======= Applied Sciences ======= -->
    <section id="applied" class="applied">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
        <div class="section-title">
          <h2>Check our Books</h2>
          <p>Applied Sciences</p>
        </div>
				<div class="product-list slick-slider" data-aos="fade-up">
            <div class="row">
            <?php
            require 'koneksi.php';
            $query = "SELECT * FROM data_buku INNER JOIN pengarang ON data_buku.pengarang_id = pengarang.id WHERE kategori_id=9";
            $result = $db->query($query);
            
            // Memeriksa apakah query berhasil
            if ($result) {
                // Mengambil data buku dari hasil query
                $book = $result->fetch_assoc();
            
                // Menutup koneksi database
                $db->close();
            } else {
                echo "Error: " . $db->error;
            } 
            while ($book = $result->fetch_assoc()) : ?>
            <div class="col-md-3">
                <div class="product-item">
                    <figure class="product-style">
                        <!-- Menggunakan URL gambar dari database -->
                        <?php
                        // Membuat URL lengkap ke gambar
                        $imageUrl = 'admin/' . $book['gambar'];
                        ?>
                        <img src="<?php echo $imageUrl; ?>" alt="Gambar Buku" class="book-image">
                    </figure>
                    <figcaption>
                        <h5><?php echo $book['judul']; ?></h5>
                        <span><?php echo $book['nama_pengarang']; ?></span>
                        <div class="thn_terbit"><?php echo $book['thn_terbit']; ?></div>
                        <div class="tersedia" style="color: red;">Tersedia: <?php echo $book['tersedia']; ?></div>
                    </figcaption>
                </div>
            </div>
        <?php endwhile; ?>

            </div><!-- ft-books-slider -->
          </div><!-- grid -->
        </div><!-- inner-content -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="btn-wrap align-right">
            <a href="#" class="btn-accent-arrow"> <button class="prev-button"> << Previous</button> <i class="icon icon-ns-arrow-right"></i></a>
            <a href="#" class="btn-accent-arrow" style="float: right;"><button class="next-button">Next >></button>  <i class="icon icon-ns-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function () {
        $('#it .product-list .row').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        // Click event handler for Prev button
        $(document).on('click', '.btn-wrap .prev-button', function (e) {
            e.preventDefault();
            console.log("Tombol Prev diklik");
            $('#it .product-list .row').slick('slickPrev');
        });

        // Click event handler for Next button
        $(document).on('click', '.btn-wrap .next-button', function (e) {
            e.preventDefault();
            console.log("Tombol Next diklik");
            $('#it .product-list .row').slick('slickNext');
        });
    });
</script>

    <!-- ======= Art & Recreation ======= -->
    <section id="art" class="art">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
        <div class="section-title">
          <h2>Check our Books</h2>
          <p>Art & Recreation</p>
        </div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item1.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Simple way of piece life</h3>
										<span>Armor Ramsey</span>
										<div class="item-price">$ 40.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item2.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Great travel at desert</h3>
										<span>Sanchit Howdy</span>
										<div class="item-price">$ 38.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item3.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>The lady beauty Scarlett</h3>
										<span>Arthur Doyle</span>
										<div class="item-price">$ 45.00</div>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="assets/images/product-item4.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>Once upon a time</h3>
										<span>Klien Marry</span>
										<div class="item-price">$ 35.00</div>
									</figcaption>
								</div>
							</div>

						</div><!--ft-books-slider-->
					</div><!--grid-->
				</div><!--inner-content-->
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Jadwal</a></h4>
              <p><b>Buka</b>: Senin - Jum'at</p><br>
              <p>Buka : 08.00 WIB | Isoma : 12.00 - 13.00 WIB | Tutup : 15.00 WIB</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Koleksi</a></h4>
              <p>Kami memiliki banyak jenis koleksi di perpustakaan kami, berkisar dari Fiksi ke Ilmu Material, dari bahan cetak untuk koleksi digital seperti CD-ROM, CD, VCD dan DVD. Kami juga mengumpulkan serial harian publikasi seperti surat kabar dan juga serial bulanan seperti majalah.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Keanggotaan</a></h4>
              <p>Untuk dapat pinjaman koleksi perpustakaan kami, Anda harus terlebih dahulu menjadi anggota perpustakaan. Ada syarat dan kondisi yang harus Anda patuhi.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="gallery" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Check our Gallery</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Portfolio Section -->

    <!-- ======= Librarian Section ======= -->
    <section id="librarian" class="team">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Librarian</h2>
          <p>Check our Librarian</p>
        </div>
        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/lib_ratnawati.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ratnawati</h4>
                <span>Librarian</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/lib_nurmawilis.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Nurmawilis</h4>
                <span>Librarian</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/lib_ismaneli.png" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ismaneli</h4>
                <span>Librarian</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/lib_deddy.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Deddy Prayama</h4>
                <span>Librarian</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/mohhatta.jpeg" class="testimonial-img" alt="">
                <h3>Mohammad Hatta</h3>
                <h4>Wakil Presiden Pertama Indonesia | Bapak Koperasi Indonesia</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Aku rela dipenjara asalkan bersama buku, karena dengan buku aku bebas
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/hamka.jpeg" class="testimonial-img" alt="">
                <h3>Buya Hamka</h3>
                <h4>Ulama | Filsuf | Sastrawan Indonesia</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Membaca buku-buku yang baik berarti memberi makan rohani yang baik
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/chairil.jpeg" class="testimonial-img" alt="">
                <h3>Chairil Anwar</h3>
                <h4>Penyair</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Bacalah, karena dengan membaca, kita bisa mengelilingi dunia, menggali pengetahuan, dan memahami kehidupan dengan lebih baik
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/najwa.jpg" class="testimonial-img" alt="">
                <h3>Najwa Shihab</h3>
                <h4>Jurnalis</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Cuma perlu satu buku untuk jatuh cinta pada membaca. Cari buku itu, mari jatuh cinta.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/tereliye.png" class="testimonial-img" alt="">
                <h3>Tere Liye</h3>
                <h4>Penulis</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Dalam setiap halaman buku, terdapat petualangan dan kebijaksanaan yang menanti untuk diungkap
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.311424619519!2d100.46354517432742!3d-0.9133242353308866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7be96dab6f1%3A0x33bb46d09e2c9cf9!2sGedung%20C%20%3A%20Perpustakaan%20Politeknik%20Negeri%20Padang!5e0!3m2!1sid!2sid!4v1701740557352!5m2!1sid!2sid" width="100%" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Gedung C Kampus Politeknik Negeri Padang, Padang, Indonesia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>pustaka@pnp.ac.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>Telp: 0751 72590</p>
                <p>Fax: 0751 72576</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <h6><b>Buku Pengunjung</b></h6>
            <form action="insert-pengunjung.php" method="post"  class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="perlu" id="perlu" placeholder="Keperluan" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="saran" rows="5" placeholder="Saran" required></textarea>
              </div>
              
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="date" name="tgl_kunjung" class="form-control" id="tgl_kunjung"  readonly>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="time" class="form-control" name="jam_kunjung" id="jam_kunjung"  readonly>
                </div>
              </div>
              <script>
                // Mengisi tanggal dan waktu sekarang pada kolom tgl_kunjung dan jam_kunjung
                document.getElementById('tgl_kunjung').valueAsDate = new Date();
                document.getElementById('jam_kunjung').value = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
            </script>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Perpustakaan PNP<span>.</span></h3>
              <p>
              Gedung C Kampus Politeknik Negeri Padang  <br>
              Padang, Indonesia<br><br>
                <strong>Phone:</strong> 0751 72590<br>
                <strong>Email:</strong> pustaka@pnp.ac.id<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#it">Our Books</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#librarian">Librarian</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="assets/js/jquery-1.11.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/script.js"></script>

</body>

</html>