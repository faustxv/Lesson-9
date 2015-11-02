<?php 
	class Model_Article  extends Model{
	
		public function get_data(){	
			$conn = db::connect_db();
			if (isset($_GET['id'])){
				$stmt = $conn->prepare('SELECT * FROM content WHERE id = :id');
				// Додаємо плейсхолдер.
				$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);	
				$stmt->execute();
				// Витягуємо статтю з запиту.
				$article = $stmt->fetch(PDO::FETCH_ASSOC);
				return $article;
			}
		}

		public function Create_article(){
			$conn = db::connect_db();
			try {
			    $stmt = $conn->prepare('INSERT INTO content VALUES(NULL, :title, :short_desc, :full_desc, :timestamp)');

			    // Обрізаємо усі теги у загловку.
			    $stmt->bindParam(':title', strip_tags($_POST['title']));

			    // Екрануємо теги у полях короткого та повного опису.
			    $stmt->bindParam(':short_desc', htmlspecialchars($_POST['short_desc']));
			    $stmt->bindParam(':full_desc', htmlspecialchars($_POST['full_desc']));

			    // Беремо дату та час, переводимо у UNIX час.
			    $date = "{$_POST['date']}  {$_POST['time']}";
			    $stmt->bindParam(':timestamp', strtotime($date));
			    // Виконуємо запит, результат запиту знаходиться у змінні $status.
			    // Якщо $status рівне TRUE, тоді запит відбувся успішно.
			    $status = $stmt->execute();

			} catch(PDOException $e) {
			    // Виводимо на екран помилку.
			    print "ERROR: {$e->getMessage()}";
			    // Закриваємо футер.
			    require('base/footer.php');
			    // Зупиняємо роботу скрипта.
			    exit;
			}

			// При успішному запиту перенаправляємо користувача на сторінку перегляду статті.
			if ($status) {
				// За допомогою методу lastInsertId() ми маємо змогу отрмати ІД статті, що була вставлена.
				header("Location: /article/index/?id={$conn->lastInsertId()}");
				exit;
			}
			else {
			    // Вивід повідомлення про невдале додавання матеріалу.
			    print "Запис не був доданий.";
			}
		}

		public function Edit_article(){
			$conn = db::connect_db();
			try {
    			$stmt = $conn->prepare('UPDATE `content` SET `title` = :title, `short_desc` = :short_desc, `full_desc` = :full_desc, `timestamp` = :timestamp WHERE `id`= :id');
			    // Обрізаємо усі теги у загловку. UPDATE content SET title= '$title', body= '$body', date= '$date' WHERE id='$id'
			    $stmt->bindParam(':title', strip_tags($_POST['title']));
			    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			    // Екрануємо теги у полях короткого та повного опису.
			    $stmt->bindParam(':short_desc', htmlspecialchars($_POST['short_desc']));
			    $stmt->bindParam(':full_desc', htmlspecialchars($_POST['full_desc']));

			    // Беремо дату та час, переводимо у UNIX час.
			    $date = "{$_POST['date']}  {$_POST['time']}";
			    $stmt->bindParam(':timestamp', strtotime($date));
			    // Виконуємо запит, результат запиту знаходиться у змінні $status.
			    // Якщо $status рівне TRUE, тоді запит відбувся успішно.
			    $status = $stmt->execute();

			} catch(PDOException $e) {
			    // Виводимо на екран помилку.
			    print "ERROR: {$e->getMessage()}";
			    // Зупиняємо роботу скрипта.
			    exit;
			  }
			// При успішному запиту перенаправляємо користувача на сторінку перегляду статті.
			if ($status) {
				// За допомогою методу lastInsertId() ми маємо змогу отрмати ІД статті, що була вставлена.
				header("Location:/article/index/?id={$_GET['id']}");
				exit;
			}
			else {
			    // Вивід повідомлення про невдале редагування матеріалу.
			    print "Запис не був редагований.";
			}
		}

		public function Delete_article(){
			$conn = db::connect_db();
			try {
				$stmt = $conn->prepare('DELETE FROM content WHERE id = :id');
				// Додаємо плейсхолдер.
				$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);	
				$stmt->execute();
				header('location:/');

			} catch(PDOException $e) {
				// Виводимо на екран помилку.
				print "ERROR: {$e->getMessage()}";
				// Закриваємо футер.
				require('base/footer.php');
				// Зупиняємо роботу скрипта.
				exit;
			}
		}
	}
?>