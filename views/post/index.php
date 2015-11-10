<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostForm */
/* @var $form ActiveForm */

?>
<div class="post-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'text') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- post-index -->

<div class="container">
    <? foreach ($posts as $post){?>
        <div class="row">
            <b><?= $post->user->username ?>:</b>
            <p>
                <?= $post->text ?>
            </p>
            <?
                $time = date('d-m-Y',$post->date);
                echo $time;
            ?>
            <hr>
        </div>
    <? }?>
</div>