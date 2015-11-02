<!-- Пишемо та заповнюємо форму даними з БД, метод ПОСТ, форма відправляє данні на цей же скрипт. -->
<div class = "row"><h1><span class="label label-warning ">Редагувати статтю: <?php print $data['title']; ?></span></h1><br></div>

<form action="/article/edit/?id=<?php print $_GET['id'] ?>" method="POST">

  <div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" required maxlength="255" value="<?php print $data['title']; ?>">
  </div>

  <div class="form-group">
    <label for="short_desc">Короткий зміст</label>
    <textarea name="short_desc" class="form-control" rows="5" id="short_desc" required maxlength="600"><?php print $data['short_desc']; ?></textarea>
  </div>

  <div class="form-group">
    <label for="full_desc">Повний зміст</label>
    <textarea name="full_desc" class="form-control" rows="8" id="full_desc" required><?php print $data['full_desc']; ?></textarea>
  </div>

  <div class="form-group">
    <label for="date">День редагування</label>
    <input type="date" class="form-control" name="date" id="date" required value="<?php print date('Y-m-d')?>">
    <label for="time">Час редагування</label>
    <input type="time" class="form-control" name="time" id="time" required value="<?php print date('G:i')?>">
  </div>

  <input type="submit" name="edit" value="Зберегти">
  
</form>