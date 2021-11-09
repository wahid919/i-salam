<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?= $setting->nama_web ?>">
  <link href="<?= $icon ?>" rel="icon">
  <title><?= $setting->nama_web ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700&display=swap">
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/libraries.css" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/style.css" />
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <?= $this->render('component/header2') ?>

    <!-- ============================
        Slider
    ============================== -->
    
    <!-- ========================
        Services
    =========================== -->
    <hr>
    <section id="services" class="services pb-90" style="margin-top: -10%;">
      <div class="container">
      <div class="text-center mt-4 mb-4">
          <h3>Kategori Program</h3>
          <!-- <ul style="display: inline-block;margin-left: auto;margin-right: auto;overflow: auto"> -->
          <ul style="margin-left: auto;margin-right: auto;overflow: auto">
            <ul class="list-group list-group-horizontal border-0 text-dark text-center">
              <li class="list-group-item"><a href="<?=\Yii::$app->request->baseUrl . "/home/program/"?>"> Semua </a></li>
              <?php foreach ($kategori_pendanaans as $kategori_pendanaan) {  ?>
                <li class="list-group-item"><a href="<?=\Yii::$app->request->baseUrl . "/home/program?kategori=".$kategori_pendanaan->id?>"><?= $kategori_pendanaan->name ?> </a></li>
              <?php } ?>
            </ul>
          </ul>
        </div>

        <div class="row">
          <?php foreach ($pendanaans as $pendanaan) { 
            
            $nominal = \app\models\Pembayaran::find()->where(['pendanaan_id' => $pendanaan->id, 'status_id' => 6])->sum('nominal');
            $datetime1 =  new Datetime($pendanaan->pendanaan_berakhir);
            $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
            $interval = $datetime1->diff($datetime2)->days;
            ?>
            <div class="col-lg-4 col-md-4 mt-3">
              <!-- <a href="<?= \Yii::$app->request->baseUrl . "/home/detail-berita?id=" . $berita->slug ?>"> -->
                <div class="card">
                  <!-- <img src="" class="card-img-top" alt="..."> -->
                  <div style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/" . $pendanaan->poster ?>);background-size: cover;height: 200px;">

                  </div>
                  <div class="card-body">
                    <h6 class="card-title"><?= $pendanaan->nama_pendanaan ?></h6>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-6 text-left">
                        Sudah Terkumpul
                      </div>
                      <div class="col-lg-6 col-md-6 col-6 text-right">
                        Durasi
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-6 text-left">
                      <?= \app\components\Angka::toReadableHarga($nominal, false)  ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-6 text-right">
                      <?= $interval;?> Hari
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                            <a href="#" class="btn btn__primary" style="background-color:orange; width:100%;height:100%; border:orange;">Install Aplikasi Untuk Donasi</a>
                        </div>
                    
                    </div>
                <hr>
                    <div class="row">
                    
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <a href="../unduh-file-uraian/<?php echo $pendanaan->id ?>" class="btn btn__primary" style="background-color:orange;width:100%;height:100%;border:orange;">Download prospektur</a>
                        </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } 
          ?>

        </div>
        <hr>
        <div class='d-flex justify-content-center'>
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]); ?>
        </div>
        
<?php /* 
        <div class="row">
          <h2 class="heading__title color-black">Kategori Program</h2>
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-left mb-40">
              <!-- <span class="heading__subtitle">Our Features</span> -->
              <!-- <h2 class="heading__title color-black">PROGRAM KAMI</h2> -->
              <!-- <p class="heading__desc">We continue to pursue that same vision in today's complex, uncertain world,
                working every day to earn our customers’ trust!</p> -->
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="carousel owl-carousel carousel-arrows" data-slide="4" data-slide-md="2" data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="20" data-loop="true" data-speed="800">
              <!-- fancybox item #1 -->
              <?php foreach ($kategori_pendanaans as $kategori_pendanaan) { ?>
                <div class="fancybox-item">
                  <div class="fancybox__icon">

                  </div><!-- /.fancybox-icon -->
                  <div class="fancybox__content">
                    <h4 class="fancybox__title" style=" border-style: solid;border-width: thin;"><?= $kategori_pendanaan->name ?></h4>
                    <!-- <p class="fancybox__desc">International supply chains involves challenging regulations.</p> -->
                  </div><!-- /.fancybox-content -->
                </div><!-- /.fancybox-item -->
              <?php } ?>
            </div><!-- /.carousel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
*/ ?>
      </div><!-- /.container -->
    </section><!-- /.Services -->
    <!-- =========================== 
      fancybox Carousel
    ============================= -->
    <style>
      table {
        width: 100%;
      }
    </style>
    <?php /*
    <section id="projectsCarousel" class="projects-carousel">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-50">
              <h4>Program Berlangsung</h4>
              <p class="heading__desc">Program Kami Yang Sedang Berlangsung:</p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-md="2" data-slide-sm="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800">
              <?php foreach ($pendanaans as $pendanaan) {
                $nominal = \app\models\Pembayaran::find()->where(['pendanaan_id' => $pendanaan->id, 'status_id' => 6])->sum('nominal');

                $datetime1 =  new Datetime($pendanaan->pendanaan_berakhir);
                $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
                $interval = $datetime1->diff($datetime2)->days;


              ?>
                <div class="project-item">
                  <div class="project__img">
                    <img src="<?= \Yii::$app->request->baseUrl . "/uploads/poster/" . $pendanaan->poster; ?>" alt="<?= $pendanaan->nama_pendanaan ?>">
                    <!-- <div class="project__cat">
                    <a href="#"><?= $pendanaan->nama_pendanaan ?></a>
                  </div> -->
                    <!-- /.project-cat -->
                  </div><!-- /.project-img -->
                  <div class="project__content">
                    <h4 class="project__title"><a href="#"><?= $pendanaan->nama_pendanaan ?></a></h4>
                    <table>
                      <tr>
                        <th>Sudah Terkumpul</th>
                        <th>Durasi</th>
                      </tr>
                      <tr>
                        <td><?= \app\components\Angka::toReadableHarga($nominal, false)  ?></td>
                        <td><?= $interval ?> Hari</td>
                      </tr>
                    </table>
                    <!-- <p class="project__desc">We understand that data is the greatest asset when it comes to
                    analyzing and optimizing your supply chain performance.</p> -->
                   
                </div><!-- /.project-content -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                            <a href="#" class="btn btn__primary" style="background-color:orange; border:orange;">Install Aplikasi For Donate</a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2"></div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                        <a href="../unduh-file-uraian/<?php echo $pendanaan->id ?>" class="btn btn__primary" style="background-color:orange; border:orange;">Download prospektur</a>
                        </div>
                    </div>
                  </div>
                </div><!-- /.project-item -->
              <?php } ?>
            </div><!-- /.carousel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.projects-carousel -->
    */ ?>
    <!-- ========================
        Request Quote Tabs
    =========================== -->

    <!-- ========================= 
            Testimonial #1
    =========================  -->

    <!-- =====================
       Clients 1
    ======================== -->
    <section id="clients1" class="clients clients-1 border-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">

          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.clients 1 -->

    <!-- ======================
           banner 3
      ========================= -->

    <!-- ======================
      Blog Grid
    ========================= -->

    <!-- ========================= 
            contact 1
      =========================  -->


    <!-- ========================
            Footer
    ========================== -->
    <?php

    use yii\bootstrap\ActiveForm;
    use yii\bootstrap\Html;
    ?>
    <section id="requestQuoteTabs" class="request-quote request-quote-tabs p-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="request__form">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="quote">
                  <div class="request-quote-panel">
                    <div class="request__form-body">
                      <div class="row">

                        <div class="contact-form" style="margin-left: 10px;margin-right:10px;">

                          <?php $form = ActiveForm::begin(
                            [
                              'id' => 'HubungiKami',
                              'layout' => 'horizontal',
                              'enableClientValidation' => true,
                              'errorSummaryCssClass' => 'error-summary alert alert-error'
                            ]
                          );
                          ?>
                          <div class="form-row">

                            <div class="col-12 col-md-4">
                              <div class="form-group">
                                <?= $form->field($model, 'nama', [
                                  'template' => '
            {label}
            {input}
            {error}
        ',
                                  'inputOptions' => [
                                    'class' => 'form-control'
                                  ],
                                  'labelOptions' => [
                                    'class' => ''
                                  ],
                                  'options' => ['tag' => false]
                                ])->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>
                              </div>
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="form-group">
                                <?= $form->field($model, 'nomor_hp', [
                                  'template' => '
            {label}
            {input}
            {error}
        ',
                                  'inputOptions' => [
                                    'class' => 'form-control'
                                  ],
                                  'labelOptions' => [
                                    'class' => ''
                                  ],
                                  'options' => ['tag' => false]
                                ])->textInput(['maxlength' => true, 'placeholder' => 'Nomor Handphone']) ?>
                              </div>
                            </div>
                            <div class="col-12 col-md-4">
                              <div class="form-group">
                                <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
                                $form->field($model, 'tema_hubungi_kami_id', [
                                  'template' => '
      {label}
      {input}
      {error}
  ',
                                  'inputOptions' => [
                                    'class' => 'form-control'
                                  ],
                                  'labelOptions' => [
                                    'class' => ''
                                  ],
                                  'options' => ['tag' => false]
                                ])->dropDownList(
                                  \yii\helpers\ArrayHelper::map(app\models\TemaHubungiKami::find()->all(), 'id', 'nama_tema'),
                                  [
                                    'prompt' => 'Select',
                                    'disabled' => (isset($relAttributes) && isset($relAttributes['tema_hubungi_kami_id'])),
                                  ]
                                ); ?>
                              </div>
                            </div>
                            <?php echo $form->errorSummary($model); ?>

                            <div class="col-12 text-center">
                              <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-primary']); ?>
                            </div>
                          </div>

                          <?php ActiveForm::end(); ?>
                          <div class="contact-form-result"></div>
                        </div>
                      </div>
                    </div><!-- /.request__form-body -->
                    <div class="widget widget-download bg-theme" style="background-color: orange !important;">
                      <div class="widget__content">
                        <h5>HUBUNGI KAMI</h5>
                        <p>Ingin Menyapa?Ingin tahu lebih banyak tentang kami?Hubungi kami atau kiriman email kepada kami,dari kami akan segera menghubungi Anda Kembali</p>
                        <!-- <a href="#" class="btn btn__secondary btn__hover2 btn__block">
                          <span>Download 2019 Brochure</span><i class="icon-arrow-right"></i>
                        </a> -->
                      </div><!-- /.widget__content -->
                    </div><!-- /.widget-download -->
                  </div><!-- /.request-quote-panel-->
                </div><!-- /.tab -->
              </div><!-- /.tab-content -->
            </div><!-- /.request-form -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Request Quote Tabs -->
    <?= $this->render('component/footer') ?>

    <div class="module__search-container">
      <i class="fa fa-times close-search"></i>
      <form class="module__search-form">
        <input type="text" class="search__input" placeholder="Type Words Then Enter">
        <button class="module__search-btn"><i class="fa fa-search"></i></button>
      </form>
    </div><!-- /.module-search-container -->

    <button id="scrollTopBtn"><i class="fa fa-long-arrow-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/plugins.js"></script>
  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6HOHjE9XM8IbEaL6ZMZdW8e0tavsOL8&libraries=places&region=id&language=en&sensor=false"></script>

  <script>
    var marker;

    function initialize() {

      // Variabel untuk menyimpan informasi (desc)
      var infoWindow = new google.maps.InfoWindow;

      //  Variabel untuk menyimpan peta Roadmap
      var mapOptions = {
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      // Pembuatan petanya
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      // Variabel untuk menyimpan batas kordinat
      var bounds = new google.maps.LatLngBounds();

      // Pengambilan data dari database
      <?php

      $nama = $setting->nama_web;
      $lat = $setting->latitude;
      $lon = $setting->longitude;

      echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");

      ?>

      // Proses membuat marker 
      function addMarker(lat, lng, info) {
        var lokasi = new google.maps.LatLng(lat, lng);
        bounds.extend(lokasi);
        var marker = new google.maps.Marker({
          map: map,
          position: lokasi
        });
        map.fitBounds(bounds);
        bindInfoWindow(marker, map, infoWindow, info);
      }

      // Menampilkan informasi pada masing-masing marker yang diklik
      function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
          if (map.getZoom() > 16) map.setZoom(16); 
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        });
      }

    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>

</html>