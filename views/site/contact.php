<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'О системе';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>

        <p class="lead"><strong>Наименование: </strong><em>Система управления номерным фондом отеля / гостиницы</em></p>
        <p class="lead"><strong>Разработчик: </strong><em>Марина Евгеньевна Яптева</em></p>

        <p><a class="btn btn-lg btn-success" href="/"><span class="glyphicon glyphicon-home btn-padding-left-right"></span></a></p>
    </div>
</div>