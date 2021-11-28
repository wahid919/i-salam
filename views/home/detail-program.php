<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

// namespace Midtrans;

use yii\helpers\Url;
?>
<hr class="mt-0">
<section id="blogSingle" class="blog blog-single pt-50 pb-50">
  <div class="container">
    <div class="program1-wrap">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="program1__big-img">
            <img class="border-r10" alt="program 1" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg">
          </div>
          <div class="program1__img-wrap">
            <div class="program1-img">
              <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" data-lightbox="program">
                <img alt="program Small 1" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" class="img-project">
              </a>
            </div>
            <div class="program1-img">
              <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" data-lightbox="program">
                <img alt="program Small 1" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" class="img-project">
              </a>
            </div>
            <div class="program1-img">
              <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" data-lightbox="program">
                <img alt="program Small 1" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" class="img-project">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="program__text">
            <h3 class="font-weight-bold text-detail-program">Mari Ikut Wakaf Masjid di Indonesia</h3>
            <div class="table-responsive d-none d-lg-block">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th style="color:#787878" scope="col">Kategori</th>
                    <th style="color:#787878" scope="col">Tempat</th>
                    <th style="color:#787878" scope="col">Penerima Wakaf</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="font-weight-bold text-isalam-1 font-size-08">Sosial & Kemanusiaan</td>
                    <td class="font-weight-bold text-isalam-1 font-size-08">Kota Jakarta Pusat</td>
                    <td class="font-weight-bold text-isalam-1 font-size-08">Ahmad Salim</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive d-none d-block d-sm-block d-md-block d-lg-none">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th style="color:#787878">Kategori</th>
                    <th style="color:#787878">Tempat</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="font-weight-bold text-isalam-1 font-size-08">Sosial & Kemanusiaan</td>
                    <td class="font-weight-bold text-isalam-1 font-size-08">Kota Jakarta Pusat</td>
                  </tr>
                  <tr>
                    <th colspan="2" style="color:#787878">Penerima Wakaf</th>
                  </tr>
                  <tr>
                    <td colspan="2" class="font-weight-bold text-isalam-1 font-size-08">Ahmad Salim</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="program__info">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-6 text-left pt-4 font-weight-bold font-size-08">
                Sudah Terkumpul
              </div>
              <div class="col-lg-6 col-md-6 col-6 text-right pt-4 font-weight-bold font-size-08">
                Dana Dibutuhkan
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-6 col-6 text-left font-weight-bold progress-dana pb-2">
                Rp 150.000,00<br>
              </div>
              <div class="col-lg-4 col-md-6 col-6 text-right font-weight-bold progress-dana pb-2">
                Rp 550.000,00
              </div>
              <div class="col-12">
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-6 text-left pt-4 font-weight-bold font-size-1">
                Durasi Wakaf
              </div>
              <div class="col-lg-6 col-md-6 col-6 text-right pt-4 font-weight-bold font-size-1">
                90 Hari
              </div>
              <div class="col-lg-6 col-md-6 col-6 text-left pt-4 font-weight-bold font-size-1">
                Share Wakaf Melalui Sosial Media
              </div>
              <div class="col-lg-6 col-md-6 col-6 text-right pt-4 font-weight-bold font-size-1 ">
                <div class="share__icons">
                  <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="#" class="btn btn-sm btn-program btn-block" data-toggle="modal" data-target="#mulaiwakaf" style="padding: 10px !important;">Mulai Wakaf</a>
              </div>
            </div>
          </div>
          <!-- End program Info -->
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mulaiwakaf" tabindex="-1" role="dialog" aria-labelledby="mulaiwakaf" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mulaiwakaf">Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-4">
                <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/detail-program.jpeg" width="200px">
              </div>
              <div class="col-8">
                <p class="font-size-08">Anda akan berwakaf untuk project :</p>
                <p class="font-weight-bold">Mari Ikut Wakaf Masjid Di Indonesia</p>
              </div>
              <div class="col-12 pt-3">
                <h3 style="color: #404040;">Nominal Wakaf</h3>
                <p class="font-size-08">Anda akan berwakaf dengan nominal sebesar :</p>
                <div class="row">
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(100000);">Rp. 100.000 ></a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(200000);">Rp. 200.000 ></a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(300000);">Rp. 300.000 ></a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(400000);">Rp. 400.000 ></a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(500000);">Rp. 500.000 ></a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-nilai-wakaf btn-outline-bayar border-r5 mt-2" role="button" aria-pressed="true" onclick="return theFunction(600000);">Rp. 600.000 ></a>
                  </div>
                  <div class="col-12 mt-2">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                        <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Rp</div>
                      </div>
                      <input type="number" class="form-control select-wakaf border-r5" id="nominal" name="nominal" style="border-color: #787878;" placeholder="Minimal Wakaf Rp. 10.000" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-batal" data-dismiss="modal">Batal</button>
            <!-- <button type="button" class="btn btn-sm btn-program" data-toggle="modal" data-target="#exampleModalScrollable" id="bayarkan">Bayar</button> -->
            <button type="button" class="btn btn-sm btn-program" id="bayarkan">Bayar</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      var global = "Global Variable"; //Define global variable outside of function

      function setGlobal() {
        global = "Hello World!";
      };
      setGlobal();
      var data = 0;
      var coba;
      theFunction(data);

      document.querySelector("#bayarkan").addEventListener("click", () => {
        let nominal = document.querySelector("#nominal").getAttribute("value");
        window.location.href = `<?= Url::to(['/home/pembayaran', 'id' => $pendanaan->id]) ?>?nominal=${nominal}`;
      });

      function theFunction(i) {

        var rupiah;
        var php_var = "<?php $php_var; ?>";
        document.querySelector("#nominal").setAttribute("value", i);
        var a = document.getElementById("nominal").value = i;
        let num = 15;
        let n = num.toString();
        coba = i;
        php_var += a;
        var number_string = i.toString(),
          sisa = number_string.length % 3,
          rupiah = number_string.substr(0, sisa),
          ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        // var b = document.getElementById("nom").innerHTML = "Rp. " + rupiah;
        // coba = "Rp. " + rupiah;
        // var p1 = document.getElementById("nom").value;
        // console.log(php_var);
        return i;
        // console.log(a);
        // data = a;
        // return true or false, depending on whether you want to allow the `href` property to follow through or not
      }
      // console.log(data);
    </script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Pembayaran<?php var_dump($php_var); ?></h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php  ?> Apakah Anda Yakin Ingin Wakaf sebesar <h3 id="nom"></h3>
            <script>

            </script>

            <?php
            echo "<script>document.writeln(global);</script>";
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="pay-button" type="button" class="btn btn-primary">Save changes</button>
            <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lrPe45BCGoT9yG2O"></script>
            <script type="text/javascript">
              document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay('<?= $snap_token ?>', {
                  // Optional
                  onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  },
                  // Optional
                  onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  },
                  // Optional
                  onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  }
                });
              };
            </script> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-12 pt-60">
        <div class="header-panel-wrap">
          <ul class="nav nav-tabs pb-0 border-d-program" id="isalam" role="tablist">
            <li class="nav-item text-center">
              <a class="nav-link font-weight-bold font-size-1 font-grey-78 active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Detail</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link font-weight-bold font-size-1 font-grey-78" id="uptade-tab" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false">Update</a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link font-weight-bold font-size-1 font-grey-78" id="donatur-tab" data-toggle="tab" href="#donatur" role="tab" aria-controls="donatur" aria-selected="false">Donatur</a>
            </li>
          </ul>
          <div class="tab-content pt-4" id="myTabContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
              <p class="desc-program">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, ut minima. Dolore fugit labore natus, libero reiciendis quis. Culpa ab cumque atque ipsum qui tempora rem modi repudiandae, quo sapiente, vero minus nobis, a laborum expedita eum laudantium optio facere dolorum fugiat libero nisi.<br>
                Omnis, non iusto quam facilis maiores inventore expedita suscipit officia cupiditate sequi eveniet. Sunt earum magnam ad accusamus ipsam, vel error? Tempora odit ullam ut suscipit! Ipsa quasi saepe quidem ullam voluptates tenetur modi veniam animi eligendi culpa, quisquam atque aperiam aliquam, cum eveniet distinctio temporibus. Recusandae, ad excepturi. Eligendi sit harum ex dolores quisquam. Provident?</p>
            </div>
            <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
              <p class="update-program">
                Belum Ada Informasi untuk Program Wakaf Ini.
              </p>
              <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg">
            </div>
            <div class="tab-pane fade" id="donatur" role="tabpanel" aria-labelledby="donatur-tab">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <td class="border-bottom-3 border-top-0 donatur-program-img" rowspan="2">
                        <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" data-lightbox="update">
                          <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" width="100px">
                        </a>
                      </td>
                      <td class="border-top-0 donatur-program-nama">Hamba Allah</td>
                      <td class="border-top-0">2 januari 2021</td>
                    </tr>
                    <tr>
                      <td class="border-bottom-3 border-top-0 pt-0 text-isalam-1 font-weight-bold donatur-uang">Rp 100.000</td>
                      <td class="border-bottom-3 border-top-0"></td>
                    </tr>

                    <tr>
                      <td class="border-bottom-3 border-top-0 donatur-program-img" rowspan="2">
                        <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" data-lightbox="update">
                          <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" width="100px">
                        </a>
                      </td>
                      <td class="border-top-0 donatur-program-nama">Hamba Allah</td>
                      <td class="border-top-0">2 januari 2021</td>
                    </tr>
                    <tr>
                      <td class="border-bottom-3 border-top-0 pt-0 text-isalam-1 font-weight-bold donatur-uang">Rp 100.000</td>
                      <td class="border-bottom-3 border-top-0"></td>
                    </tr>

                    <tr>
                      <td class="border-bottom-3 border-top-0 donatur-program-img" rowspan="2">
                        <a href="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" data-lightbox="update">
                          <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/azhar.jpg" width="100px">
                        </a>
                      </td>
                      <td class="border-top-0 donatur-program-nama">Hamba Allah</td>
                      <td class="border-top-0">2 januari 2021</td>
                    </tr>
                    <tr>
                      <td class="border-bottom-3 border-top-0 pt-0 text-isalam-1 font-weight-bold donatur-uang">Rp 100.000</td>
                      <td class="border-bottom-3 border-top-0"></td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.col-lg-12 -->
      <div class="col-lg-4 col-md-6 col-sm-12 pt-70">
        <div class="text-left">
          <p class="font-size-1 font-weight-bold">
            Penggalangan Dana Dimulai
          </p>
          <p class="font-size-1 font-weight-bold">
            <span class="text-isalam-1">
              01 Desember 2021
            </span>
            Oleh:
          </p>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/logo.png" width="100px">
              </div>
              <div class="col-8">
                <p class="text-isalam-1 font-weight-bold" style="padding-top: 12%;">Yayasan dan Lembaga Inisiator Salam</p>
              </div>
              <hr>
              <div class="col-4 text-left border-top-2 mt-4 pt-4">
                <p class="font-weight-bold">Total</p>
              </div>
              <div class="col-8 text-right border-top-2 mt-4 pt-4">
                <p class="font-weight-bold text-isalam-1">1 Program Campaign</p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <label for="" style="color:#787892;">Tambahkan Program Ini di Halaman Anda</label>
          <input type="text" style="width: 100%;" class="select-wakaf border-r5 p-2" value="Lorem ipsum dolor sit amet.">
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.blog Single -->