<div class="article-once">
  <h1><?php print $data['title']; ?></h1>
  <div class="info-wrapp">
    <span class="timestamp"><?php print date('d/m/Y G:i', $data['timestamp']); ?></span>
    <?php if ($editor): ?>
      <a href="/article/edit/?id=<?php print $data['id']; ?>">Редагувати</a>
      <a href="/article/delete/?id=<?php print $data['id']; ?>">Видалити</a>
    <?php endif; ?>
  </div>
  <div class="full-desc">
    <?php print $data['full_desc']; ?>
  </div>
</div>