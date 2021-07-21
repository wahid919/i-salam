<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Pencairan $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'Pencairan',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
        
			<?= $form->field($model, 'id')->textInput() ?>
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'pendanaan_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(app\models\Pendanaan::find()->all(), 'id', 'id'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['pendanaan_id'])),
    ]
); ?>
			<?= $form->field($model, 'nominal')->textInput() ?>
			<?= $form->field($model, 'tanggal')->textInput() ?>
			<?= $form->field($model, 'created_at')->textInput() ?>        <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?=  Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?=  Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>