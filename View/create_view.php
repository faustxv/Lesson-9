<!-- Пишемо та заповнюємо форму даними з БД, метод ПОСТ, форма відправляє данні на цей же скрипт. -->
<div class = "row"><h1><span class="label label-warning ">Створити статтю</span></h1><br></div>

<form action="/article/create/" method="POST">

  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" required maxlength="255">
  </div>

  <div class="form-group">
    <label for="short_desc">Короткий зміст</label>
    <textarea name="short_desc" class="form-control" rows="5" id="short_desc" required maxlength="600"></textarea>
  </div>

  <div class="form-group">
    <label for="full_desc">Повний зміст</label>
    <textarea name="full_desc" class="form-control" rows="8" id="full_desc" required></textarea>
  </div>

  <div class="form-group">
    <label for="date">День створення</label>
    <input type="date" class="form-control" name="date" id="date" required value="<?php print date('Y-m-d')?>">
    <label for="time">Час створення</label>
    <input type="time" class="form-control" name="time" id="time" required value="<?php print date('G:i')?>">
  </div>

  <input type="submit" name="create" value="Зберегти">
  
</form>