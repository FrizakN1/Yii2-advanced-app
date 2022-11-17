<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = 'Страница не найдена';
?>
<div class="site-error">

    <div class="row">
        <h1 class="text-primary border-right border-primary d-flex justify-content-center align-items-center px-2">Ошибка 404</h1>
        <h2 class="text-primary d-flex justify-content-center align-items-center w-50 px-2"><?=Html::encode($message)?></h2>
    </div>
</div>
