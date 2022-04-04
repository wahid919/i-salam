<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\controllers\base;

use app\components\Angka;
use app\components\Tanggal;
use Yii;
use app\models\Pendanaan;
use app\models\Notifikasi;
use app\models\Pembayaran;
use app\models\Pencairan;
use app\models\Setting;
use app\models\search\PendanaanSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\Action;
use app\models\Penyaluran;
use app\models\User;
use kartik\mpdf\Pdf;
use yii\db\Query;
use yii\web\UploadedFile;

/**
 * PendanaanController implements the CRUD actions for Pendanaan model.
 */
class PendanaanController extends Controller
{


   /**
    * @var boolean whether to enable CSRF validation for the actions in this controller.
    * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
    */
   public $enableCsrfValidation = false;
   public function behaviors()
   {
      //NodeLogger::sendLog(Action::getAccess($this->id));
      //apply role_action table for privilege (doesn't apply to super admin)
      return Action::getAccess($this->id);
   }

   /**
    * Lists all Pendanaan models.
    * @return mixed
    */
   public function actionIndex()
   {
      $searchModel  = new PendanaanSearch;
      $dataProvider = $searchModel->search($_GET);


      Tabs::clearLocalStorage();

      Url::remember();
      \Yii::$app->session['__crudReturnUrl'] = null;

      return $this->render('index', [

         'dataProvider' => $dataProvider,
         'searchModel' => $searchModel,
      ]);
   }

   /**
    * Displays a single Pendanaan model.
    * @param integer $id
    *
    * @return mixed
    */
   public function actionView($id)
   {
      \Yii::$app->session['__crudReturnUrl'] = Url::previous();
      Url::remember();
      Tabs::rememberActiveState();

      return $this->render('view', [
         'model' => $this->findModel($id),
      ]);
   }

   /**
    * Creates a new Pendanaan model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new Pendanaan;

      try {
         if ($model->load($_POST)) {
            $model->status_id = 1;
            $model->user_id = \Yii::$app->user->identity->id;
         
         $nom = str_replace(",","",$model->nominal);
         // var_dump($nom);die;
         $model->nominal = $nom;
         if($model->status_lembaran != 0){
            $nom_lembaran = str_replace(",","",$model->nominal_lembaran);
            $model->nominal_lembaran = $nom_lembaran;
            $jml = (int)$nom / (int)$nom_lembaran;
            $model->jumlah_lembaran = round($jml);
         }else{
            $model->nominal_lembaran = "0";
            $model->jumlah_lembaran = 0;
         }
            $fotos = UploadedFile::getInstance($model, 'foto');
            if ($fotos != NULL) {
               # store the source fotos name
               $model->foto = $fotos->name;
               $arr = explode(".", $fotos->name);
               $extension = end($arr);

               # generate a unique fotos name
               $model->foto = "pendanaan/".Yii::$app->security->generateRandomString() . ".{$extension}";

               # the path to save fotos
               // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
               if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
                  mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
               }
               $path = Yii::getAlias("@app/web/uploads/") . $model->foto;
               $fotos->saveAs($path);
            }
            $fotos_ktp = UploadedFile::getInstance($model, 'foto_ktp');
            if ($fotos_ktp != NULL) {
               # store the source fotos_ktp name
               $model->foto_ktp = $fotos_ktp->name;
               $arr = explode(".", $fotos_ktp->name);
               $extension = end($arr);

               # generate a unique fotos_ktp name
               $model->foto_ktp = "pendanaan/foto_ktp/".Yii::$app->security->generateRandomString() . ".{$extension}";

               # the path to save fotos_ktp
               // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
               if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
                  mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
               }
               $path = Yii::getAlias("@app/web/uploads/") . $model->foto_ktp;
               $fotos_ktp->saveAs($path);
            }
            $fotos_kk = UploadedFile::getInstance($model, 'foto_kk');
            if ($fotos_kk != NULL) {
               # store the source fotos_kk name
               $model->foto_kk = $fotos_kk->name;
               $arr = explode(".", $fotos_kk->name);
               $extension = end($arr);

               # generate a unique fotos_kk name
               $model->foto_kk = "pendanaan/foto_kk/".Yii::$app->security->generateRandomString() . ".{$extension}";

               # the path to save fotos_kk
               // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
               if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
                  mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
               }
               $path = Yii::getAlias("@app/web/uploads/") . $model->foto_kk;
               $fotos_kk->saveAs($path);
            }
            // $fotos_kk = UploadedFile::getInstance($model, 'foto_kk');
            // if ($fotos_kk != NULL) {
            //    # store the source fotos_kk name
            //    $model->foto_kk = $fotos_kk->name;
            //    $arr = explode(".", $fotos_kk->name);
            //    $extension = end($arr);

            //    # generate a unique fotos_kk name
            //    $model->foto_kk = "pendanaan/foto_kk/".Yii::$app->security->generateRandomString() . ".{$extension}";

            //    # the path to save fotos_kk
            //    // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
            //    if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
            //       mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            //    }
            //    $path = Yii::getAlias("@app/web/uploads/") . $model->foto_kk;
            //    $fotos_kk->saveAs($path);
            // }
            $uraians = UploadedFile::getInstance($model, 'file_uraian');
            if ($uraians != NULL) {
               # store the source uraians name
               $model->file_uraian = $uraians->name;
               $arr = explode(".", $uraians->name);
               $extension = end($arr);

               # generate a unique uraians name
               $model->file_uraian = "uraian/".Yii::$app->security->generateRandomString() . ".{$extension}";

               # the path to save uraians
               // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
               if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
                  mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
               }
               $path = Yii::getAlias("@app/web/uploads/") . $model->file_uraian;
               $uraians->saveAs($path);
            }

            $posters = UploadedFile::getInstance($model, 'poster');
            if ($posters != NULL) {
               # store the source posters name
               $model->poster = $posters->name;
               $arr = explode(".", $posters->name);
               $extension = end($arr);

               # generate a unique posters name
               $model->poster = "poster/".Yii::$app->security->generateRandomString() . ".{$extension}";

               # the path to save posters
               // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
               if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
                  mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
               }
               $path = Yii::getAlias("@app/web/uploads/") . $model->poster;
               $posters->saveAs($path);
            }
            $model->created_at = date('Y-m-d H:i:s');
            if ($model->save()) {
               return $this->redirect(['view', 'id' => $model->id]);
            }
         } elseif (!\Yii::$app->request->isPost) {
            $model->load($_GET);
         }
      } catch (\Exception $e) {
         $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
         $model->addError('_exception', $msg);
      }

      $setting = Setting::find()->one();
      $bg = $setting->bg_pin;
      $user = Yii::$app->user->id;
      $pin = User::find()->where(['id' => $user])->one();
      $bg = $setting->bg_pin;


      // if (yii::$app->request->post('display') == $pin->pin) {
      //    return $this->render('create', ['model' => $model]);
      // } else {
      //    Yii::$app->session->setFlash('Pin Salah');
      // }
      // $this->layout = 'front';
      // return $this->render('security', ['bg' => $bg,]);

      return $this->render('create', ['model' => $model]);
   }

   public function actionApprovePendanaan($id)
   {
      $model = $this->findModel($_GET['id']);
      //return print_r($model);
      if ($model) {
         $model->status_id = 2;
         if ($model->save()) {
            $notifikasi = new Notifikasi;
            $notifikasi->message = "Pendanaan ".$model->nama_pendanaan." Telah di Setujui";
            $notifikasi->user_id = $model->user_id;
            $notifikasi->flag = 1;
            $notifikasi->date=date('Y-m-d H:i:s');
            $notifikasi->save();
            \Yii::$app->getSession()->setFlash(
               'success',
               'Pendanaan Telah Disetujui!'
            );
         } else {
            \Yii::$app->getSession()->setFlash(
               'danger',
               'Pendanaan Gagal Disetujui!'
            );
         }
         return $this->redirect(['index']);
      }
   }

   public function actionPendanaanCair($id)
   {
      $model = $this->findModel($id);
      $cair = new Pencairan;
      // $model->tanggal_received=date('Y-m-d H:i:s');
      if ($model->load($_POST)) {
         $model->status_id = 3;
         $cair->pendanaan_id = $model->id;
         if ($model->nominal < $model->noms) {
            \Yii::$app->getSession()->setFlash(
               'danger',
               'Nominal Pencairan Melebihi Nominal Pendanaan !'
            );
            
            return $this->render('pendanaan-cair', [
               'model' => $model,
               'cair' => $cair,
            ]);
         } else {
            $cair->nominal = $model->noms;
            $cair->tanggal = date('Y-m-d');
            $cair->save();
            if ($model->save()) {
               $pembayar = Pembayaran::find()->where(['pendanaan_id'=>$model->id,'status_id'=>6])->all();
            foreach($pembayar as $value){
               $notifikasi = new Notifikasi;
               $notifikasi->message = "Pendanaan ".$model->nama_pendanaan." Telah di cairkan";
               $notifikasi->user_id = $value->user_id;
               $notifikasi->flag = 1;
               $notifikasi->date=date('Y-m-d H:i:s');
               $notifikasi->save();
            }
               $notifikasi2 = new Notifikasi;
            $notifikasi2->message = "Pendanaan ".$model->nama_pendanaan." Telah Anda Cairkan";
            $notifikasi2->user_id = $model->user_id;
            $notifikasi2->flag = 1;
            $notifikasi2->date=date('Y-m-d H:i:s');
            $notifikasi2->save();
               \Yii::$app->getSession()->setFlash(
                  'success',
                  'Pendanaan Telah Dicairkan!'
               );

               return $this->redirect(['view', 'id' => $model->id]);
            }
         }

         // return $this->redirect(Url::previous());
      } else {
         return $this->render('pendanaan-cair', [
            'model' => $model,
            'cair' => $cair,
         ]);
      }
   }

   public function actionPendanaanPenyaluran($id)
   {
      $model = $this->findModel($id);
      $cair = new Penyaluran;
      // $model->tanggal_received=date('Y-m-d H:i:s');
      $model->status_id = 11;
         
         if ($model->save()) {
            $pencair = Pencairan::findOne(['pendanaan_id'=>$model->id]);
               $cair->id_pendanaan = $model->id;
               $cair->nominal = $pencair->nominal;
               $cair->tanggal_penyaluran = date('Y-m-d H:i:s');
               $cair->save();
               $pembayar = Pembayaran::find()->where(['pendanaan_id'=>$model->id,'status_id'=>6])->all();
            foreach($pembayar as $value){
               $notifikasi = new Notifikasi;
               $notifikasi->message = "Uang Pendanaan ".$model->nama_pendanaan." Telah di Disalurkan";
               $notifikasi->user_id = $value->user_id;
               $notifikasi->flag = 1;
               $notifikasi->date=date('Y-m-d H:i:s');
               $notifikasi->save();
            }
               $notifikasi2 = new Notifikasi;
            $notifikasi2->message = "Uang Pendanaan ".$model->nama_pendanaan." Telah Anda Salurkan";
            $notifikasi2->user_id = $model->user_id;
            $notifikasi2->flag = 1;
            $notifikasi2->date=date('Y-m-d H:i:s');
            $notifikasi2->save();
               \Yii::$app->getSession()->setFlash(
                  'success',
                  'Pendanaan Telah Disalurkan!'
               );

               return $this->redirect(['index']);
            
         }else {
            \Yii::$app->getSession()->setFlash(
               'danger',
               'Pendanaan gagal Disalurkan!'
            );
            return $this->redirect(['index']);
         }

         // return $this->redirect(Url::previous());
      
   }

   public function actionPendanaanSelesai($id)
   {
      $model = $this->findModel($_GET['id']);
      //return print_r($model);
      if ($model) {
         $model->status_id = 4;
         $pembayar = Pembayaran::find()->where(['pendanaan_id'=>$model->id,'status_id'=>6])->all();
         foreach($pembayar as $value){
            $notifikasi = new Notifikasi;
            $notifikasi->message = "Pendanaan ".$model->nama_pendanaan." Telah selesai";
            $notifikasi->user_id = $value->user_id;
            $notifikasi->flag = 1;
            $notifikasi->date=date('Y-m-d H:i:s');
            $notifikasi->save();
         }
         
         if ($model->save()) {
            $notifikasi2 = new Notifikasi;
            $notifikasi2->message = "Pendanaan ".$model->nama_pendanaan." Telah selesai";
            $notifikasi2->user_id = $model->user_id;
            $notifikasi2->flag = 1;
            $notifikasi2->date=date('Y-m-d H:i:s');
            $notifikasi2->save(); 
            
            \Yii::$app->getSession()->setFlash(
               'success',
               'Pendanaan Telah Selesai!'
            );
         } else {
            \Yii::$app->getSession()->setFlash(
               'danger',
               'Pendanaan Gagal Selesai!'
            );
         }
         return $this->redirect(['index']);
      }
   }

   public function actionPendanaanTolak($id)
   {
      $model = $this->findModel($_GET['id']);
      //return print_r($model);
      if ($model) {
         $model->status_id = 7;
         if ($model->save()) {
            $notifikasi = new Notifikasi;
            $notifikasi->message = "Pendanaan ".$model->nama_pendanaan." Telah Ditolak Oleh pihak Admin";
            $notifikasi->user_id = $model->user_id;
            $notifikasi->flag = 1;
            $notifikasi->date=date('Y-m-d H:i:s');
            $notifikasi->save();
            \Yii::$app->getSession()->setFlash(
               'success',
               'Pendanaan Telah Ditolak!'
            );
         } else {
            \Yii::$app->getSession()->setFlash(
               'danger',
               'Pendanaan Gagal Ditolak!'
            );
         }
         return $this->redirect(['index']);
      }
   }

   /**
    * Updates an existing Pendanaan model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);
      $oldBuktiFts = $model->foto;
      $oldBukti = $model->foto_ktp;
      $oldUraian = $model->file_uraian;
      $oldPoster = $model->poster;
      $oldBuktiKk = $model->foto_kk;
      if ($model->load($_POST)) {
         $nom = str_replace(",","",$model->nominal);
         // var_dump($nom);die;
         $model->nominal = $nom;
         if($model->status_lembaran != 0){
            $nom_lembaran = str_replace(",","",$model->nominal_lembaran);
            $model->nominal_lembaran = $nom_lembaran;
            $jml = (int)$nom / (int)$nom_lembaran;
            $model->jumlah_lembaran = round($jml);
         }else{
            $model->nominal_lembaran = "0";
            $model->jumlah_lembaran = "0";
         }
         $fts = UploadedFile::getInstance($model, 'foto');
         if ($fts != NULL) {
            # store the source file name
            $model->foto = $fts->name;
            $arr = explode(".", $fts->name);
            $extension = end($arr);

            # generate a unique file name
            $model->foto = "pendanaan/".Yii::$app->security->generateRandomString() . ".{$extension}";

            # the path to save file
            if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
               mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            }
            $path = Yii::getAlias("@app/web/uploads/") . $model->foto;
            if ($oldBukti != NULL) {

               $fts->saveAs($path);
               // unlink(Yii::$app->basePath . '/web/uploads/' . $oldBuktiFts);
            } else {
               $fts->saveAs($path);
            }
         } else {
            $model->foto = $oldBuktiFts;
         }

         $fotos = UploadedFile::getInstance($model, 'foto_ktp');
         if ($fotos != NULL) {
            # store the source file name
            $model->foto_ktp = $fotos->name;
            $arr = explode(".", $fotos->name);
            $extension = end($arr);

            # generate a unique file name
            $model->foto_ktp = "pendanaan/foto_ktp/".Yii::$app->security->generateRandomString() . ".{$extension}";

            # the path to save file
            if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
               mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            }
            $path = Yii::getAlias("@app/web/uploads/") . $model->foto_ktp;
            if ($oldBukti != NULL) {

               $fotos->saveAs($path);
               // unlink(Yii::$app->basePath . '/web/uploads/pendanaan/foto_ktp/' . $oldBukti);
            } else {
               $fotos->saveAs($path);
            }
         } else {
            $model->foto_ktp = $oldBukti;
         }

         $fotos_kk = UploadedFile::getInstance($model, 'foto_kk');
         if ($fotos_kk != NULL) {
            # store the source file name
            $model->foto_kk = $fotos_kk->name;
            $arr = explode(".", $fotos_kk->name);
            $extension = end($arr);

            # generate a unique file name
            $model->foto_kk = "pendanaan/foto_kk/".Yii::$app->security->generateRandomString() . ".{$extension}";

            # the path to save file
            if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
               mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            }
            $path = Yii::getAlias("@app/web/uploads/") . $model->foto_kk;
            if ($oldBuktiKk != NULL) {

               $fotos_kk->saveAs($path);
               // unlink(Yii::$app->basePath . '/web/uploads/pendanaan/foto_kk/' . $oldBukti);
            } else {
               $fotos_kk->saveAs($path);
            }
         } else {
            $model->foto_kk = $oldBuktiKk;
         }

         $uraians = UploadedFile::getInstance($model, 'file_uraian');
         if ($uraians != NULL) {
            # store the source file name
            $model->file_uraian = $uraians->name;
            $arr = explode(".", $uraians->name);
            $extension = end($arr);

            # generate a unique file name
            $model->file_uraian = "uraian/".Yii::$app->security->generateRandomString() . ".{$extension}";

            # the path to save file
            if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
               mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            }
            $path = Yii::getAlias("@app/web/uploads/") . $model->file_uraian;
            if ($oldUraian != NULL) {

               $uraians->saveAs($path);
               // unlink(Yii::$app->basePath . '/web/uploads/uraian/' . $oldUraian);
            } else {
               $uraians->saveAs($path);
            }
         } else {
            $model->file_uraian = $oldUraian;
         }


         $posters = UploadedFile::getInstance($model, 'poster');
         if ($posters != NULL) {
            # store the source file name
            $model->poster = $posters->name;
            $arr = explode(".", $posters->name);
            $extension = end($arr);

            # generate a unique file name
            $model->poster = "poster/".Yii::$app->security->generateRandomString() . ".{$extension}";

            # the path to save file
            if (file_exists(Yii::getAlias("@app/web/uploads/")) == false) {
               mkdir(Yii::getAlias("@app/web/uploads/"), 0777, true);
            }
            $path = Yii::getAlias("@app/web/uploads/") . $model->poster;
            if ($oldPoster != NULL) {

               $posters->saveAs($path);
               unlink(Yii::$app->basePath . '/web/uploads/' . $oldPoster);
            } else {
               $posters->saveAs($path);
            }
         } else {
            $model->poster = $oldPoster;
         }

         if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
         }
      } else {
         return $this->render('update', [
            'model' => $model,
         ]);
      }
   }



   public function actionUnduhFileUraian($id)
   {
   $model = $this->findModel($id);
   $file = $model->file_uraian;
   // $model->tanggal_received=date('Y-m-d H:i:s');
   $path = Yii::getAlias("@app/web/uploads/") . $file;
   $arr = explode(".", $file);
   $extension = end($arr);
   $nama_file= "File Uraian  ".$model->nama_pendanaan.".".$extension;
   
       if (file_exists($path)) {
           return Yii::$app->response->sendFile($path, $nama_file);
       } else {
           throw new \yii\web\NotFoundHttpException("{$path} is not found!");
       }
   }

   public function actionCetak() {
      $formatter = \Yii::$app->formatter;
      
      $content = $this->renderPartial('view-print',[
          
  ]);
      
      // setup kartik\mpdf\Pdf component
      $pdf = new Pdf([
          // set to use core fonts only
          'mode' => Pdf::MODE_CORE, 
          //Name file
          'filename' => 'Akad Wakaf'."pdf",
          // LEGAL paper format
          'format' => Pdf::FORMAT_LEGAL, 
          // portrait orientation
          'orientation' => Pdf::ORIENT_PORTRAIT, 
          // stream to browser inline
          'destination' => Pdf::DEST_BROWSER, 
          // your html content input
          'content' => $content,  
          'marginHeader' => 0,
          'marginFooter' => 1,
          'marginTop' => 1,
          'marginBottom' => 5,
          'marginLeft' => 0,
          'marginRight' => 0,
          // format content from your own css file if needed or use the
          // enhanced bootstrap css built by Krajee for mPDF formatting 
          'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
          // any css to be embedded if required
          // 'cssInline' => '.kv-heading-1{font-size:25px}', 
          'cssInline' => 'body { font-family: irannastaliq; font-size: 17px; }.page-break {display: none;};
          .kv-heading-1{font-size:17px}table{width: 100%;line-height: inherit;text-align: left; border-collapse: collapse;}table, td, th {margin-left:50px;margin-right:50px;},fa { font-family: fontawesome;} @media print{
              .page-break{display: block;page-break-before: always;}
          }',
           // set mPDF properties on the fly
           'options' => [               
              'defaultheaderline' => 0,  //for header
               'defaultfooterline' => 0,  //for footer
          ],
           // call mPDF methods on the fly
          'methods' => [
              'SetTitle'=>'Print', 
              'SetHeader' => $this->renderPartial('header_gambar'),
            //   // 'SetHeader'=>['AMONG TANI FOUNDATION'],
            //   'SetFooter'=>$this->renderPartial('footer_gambar'),
              
          ]
      ]);
      return $pdf->render(); 
  }
   


   /**
    * Deletes an existing Pendanaan model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    */
   public function actionDelete($id)
   {
      try {
         $model = $this->findModel($id);
         $oldFtss = $model->foto;
         $oldBukti = $model->foto_ktp;
         $oldBuktiKk = $model->foto_kk;
         $oldUraian = $model->file_uraian;
         // unlink(Yii::$app->basePath . '/web/uploads/pendanaan/foto/' . $oldFtss);
         // unlink(Yii::$app->basePath . '/web/uploads/pendanaan/foto_ktp/' . $oldBukti);
         // unlink(Yii::$app->basePath . '/web/uploads/pendanaan/foto_kk/' . $oldBuktiKk);
         // unlink(Yii::$app->basePath . '/web/uploads/uraian/' . $oldUraian);
         $model->delete();
      } catch (\Exception $e) {
         $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
         \Yii::$app->getSession()->addFlash('error', $msg);
         return $this->redirect(Url::previous());
      }

      // TODO: improve detection
      $isPivot = strstr('$id', ',');
      if ($isPivot == true) {
         return $this->redirect(Url::previous());
      } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
         Url::remember(null);
         $url = \Yii::$app->session['__crudReturnUrl'];
         \Yii::$app->session['__crudReturnUrl'] = null;

         return $this->redirect($url);
      } else {
         return $this->redirect(['index']);
      }
   }

   public function actionExport($id)
    {
       
       
        
            $mdl = \app\models\Pendanaan::find()
                ->where(['id'=>$id])
                ->one();
            $mdl1 = \app\models\AgendaPendanaan::find()
                ->where(['pendanaan_id'=>$mdl->id])
                ->all();
            $mdl2 = \app\models\Pembayaran::find()
               ->where(['pendanaan_id'=>$mdl->id])->andWhere(['status_id'=>6])->all();
            

            $bayar = \app\models\Pembayaran::find()
            ->where(['pendanaan_id'=>$mdl->id])->andWhere(['status_id'=>6])->sum('nominal');

            $cair = \app\models\Pencairan::find()
                   ->where(['pendanaan_id' => $mdl->id])
                   ->sum('nominal');
        $objPHPExcel = new \PHPExcel();

        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Laporan Wakaf '.$mdl->id)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'Kode Transaksi')
            ->setCellValue('C1', 'Wakif')
            ->setCellValue('D1', 'Jumlah Masuk')
            ->setCellValue('E1', '')
            ->setCellValue('F1', 'NO')
            ->setCellValue('G1', 'Agenda')
            ->setCellValue('H1', 'Tanggal Agenda');
        $count = 1;
        $row = 2;
        
        // var_dump($mdl1);die;
        foreach ($mdl2 as $m) {
            // $detail = \app\models\DetailTransaksi::find()
            //     ->where(['id_transaksi' => $m->id])
            //     ->sum('total_harga_item');
            // $cek = Outlet::find()->where(['id' => $m->id_outlet])->one();
            // $usr = User::find()->where(['id' => $m->id_user])->one();
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $count);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $m->kode_transaksi);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $m->nama);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, 'Rp ' . Angka::toReadableAngka($m->nominal, FALSE));
            // $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, Tanggal::toReadableDate($m->tgl_transaksi, FALSE));
            foreach ($mdl1 as $m) {
               $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $count);
               $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $m->nama_agenda);
               $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, Tanggal::toReadableDate($m->tanggal, FALSE));
           }
            // $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, 'Rp ' . Angka::toReadableAngka($subtotal, FALSE));
            // $objPHPExcel->getActiveSheet()->setCellValue('G' . $row,  Angka::toReadableAngka($m->tax, FALSE).'%');
            // $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, 'Rp ' . Angka::toReadableAngka($m->total_harga, FALSE));
            $row++;
            $count++;
            
            if ($m === end($mdl)) {
               
                
               //  foreach ($mdl1 as $key => $bayar) {
            # code...

            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, "Total Masuk");
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, 'Rp ' . Angka::toReadableAngka($bayar, FALSE));
            $row++;
      //   }
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row++, 'Total Pencairan');
            $objPHPExcel->getActiveSheet()->setCellValue('D' . --$row, 'Rp ' . Angka::toReadableAngka($cair, FALSE));
                
                // $leftStr = $bayar['nama_pembayaran'];
                //     $value = Angka::toReadableAngka($bayar['ttl_harga'], false);
                //     $jumlahcharharga = "Rp. " . tampilanHarga($value) . $value;
            }
            
        }

        

        $filename = "Laporan Wakaf " . $mdl->id . ".xls";
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header("Pragma: no-cache");
        header("Expires: 0");
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        ob_end_clean();
    }

   /**
    * Finds the Pendanaan model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Pendanaan the loaded model
    * @throws HttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = Pendanaan::findOne($id)) !== null) {
         return $model;
      } else {
         throw new HttpException(404, 'The requested page does not exist.');
      }
   }
}