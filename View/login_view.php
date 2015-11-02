<?php
$page_title = 'Login page';
// Якщо запис у користувача про сесію вже є, тоді пропонуємо йому розлогінитися.
// Тобто вийти з сайту.
if (!empty($_SESSION['login'])) {
  print 'Ви вже залоговані на сайті.';
  print '<a href="/user/logout">Вийти</a>';
  }
?>

<!-- Якщо користувач немає запису у сесії, тоді виводимо йому форму. -->
<?php if(empty($_SESSION['login'])): ?>
  <h1 class="login"><span class="label label-warning ">Авторизація</span></h1>
  <h3 class="err">Пароль або логін неправельні</h3>
  <form action="/user/valid" method="POST" class="form">
    <div class="form-group">
      <label for="name">Логін </label>
      <input type="text" name="name" class="form-control" id="name" required>
    </div>

    <div class="form-group">
      <label for="name">Пароль </label>
      <input type="password" name="pass" class="form-control">
    </div>
    <input type="submit" class="btn btn-success" name="submit" value="Відправити">
    <!-- перевірки на підтримку js -->
    <script type="text/javascript">
      document.write('<button type="submit" id="back" class="btn btn-danger">Back</button>');
    </script>
    <noscript><a href="/" class="btn btn-danger">Back</a></noscript>
  </form>
    
<?php endif; ?>

