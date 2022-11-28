<?php

/** @var yii\web\View $this */

$this->title = 'FreshNews';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Добпро пожаловать</h1>

        <p class="lead">в панель администратора сайта FreshNews</p>

        <p><a class="btn btn-lg btn-success" href="/settings">Перейти к настройкам</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Параметры страниц</h2>

                <p><a class="btn btn-lg btn-success" href="/page">Перейти к параметрам страницы</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Управление новостями</h2>

                <p><a class="btn btn-lg btn-success" href="/news">Перейти к управлению новостями</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Управление пользователями</h2>

                <p><a class="btn btn-lg btn-success" href="/user/admin">Перейти к управлению пользователями</a></p>
            </div>
        </div>

    </div>
</div>
