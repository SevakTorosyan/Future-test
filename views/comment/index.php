<?php

/* @var $comments \app\models\Comment[]|null */
/* @var $pages \yii\data\Pagination */

/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
$this->title = 'Тестовое задание';
?>
<div class="container-fluid header-container">
  <div class="container header">
    <div class="row">
      <div class="col-sm-4">
        <div class="info col-sm-12"><p>Телефон: (499) 340-94-71</p></div>
        <div class="info col-sm-12"><p>Email: <a class="email" href="mailto: info@future-group.ru">info@future-group.ru</a></p></div>
        <h1 class="col-sm-12">Комментарии</h1>
      </div>
      <div class="col-sm-2 col-sm-offset-6">
        <img src="images/logo.png" alt="logo" class="float-right">
      </div>
    </div>
  </div>
</div>

<div class="container main">
  <div class="row">
      <?php
      if (!$comments) {
          echo '<h2>Комментарий еще нет, будьте первым!</h2>';
      } else {
          foreach ($comments as $comment) {
              echo "<div class='comment'>";
              echo "<div class='col-sm-2 username'><p>{$comment->getUsername()}</p></div>";
              echo "<div class='col-sm-8 time'><p>{$comment->getCreatedAt()}</p></div>";
              echo "<div class='col-sm-12'><p>{$comment->getText()}</p></div>";
              echo "</div>";
          }
      }
      ?>
      <?= LinkPager::widget(['pagination' => $pages]); ?>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <h2>Оставить комментарий</h2>
    </div>
      <?php $form = ActiveForm::begin([
          'id'          => 'create',
          'layout'      => 'horizontal',
          'action'      => 'comment/create',
          'fieldConfig' => [
              'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
              'labelOptions' => ['class' => 'col-lg-1 control-label'],
          ],
      ]); ?>
    <div class="col-sm-12">
      <label for="username">Ваше имя</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control forms" aria-label="Default" maxlength="60" type="text" name="username" id="username" required>
    </div>

    <div class="col-sm-12">
      <label for="text">Ваш комментарий</label>
    </div>
    <div class="col-sm-6">
      <textarea class="form-control forms" name="text" id="text" rows="7" required></textarea>
    </div>
    <div class="col-sm-12"></div>
    <div class="col-sm-2 col-sm-offset-4">
      <input class="form-control forms" type=submit>
    </div>
      <?php ActiveForm::end(); ?>
  </div>
</div>
<div class="container-fluid footer-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-1">
        <img src="images/logo.png">
      </div>
      <div class="contacts">
        <div class="info col-sm-8 col-sm-offset-2"><p>Телефон: (499) 340-94-71</p></div>
        <div class="info col-sm-8 col-sm-offset-2"><p>Email: <a class="email" href="mailto: info@future-group.ru">info@future-group.ru</a></p></div>
        <div class="info col-sm-8 col-sm-offset-2"><p>Адрес: <a class="email" href="mailto: info@future-group.ru">115088 Москва, ул. 2-я
              Машиностроения д.7 стр.1</a></p></div>
        <div class="info col-sm-8 col-sm-offset-2 copyright"><p>&copy2010-2014 Future. Все права защищены.</p></div>
      </div>
    </div>
  </div>
</div>

