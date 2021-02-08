<?php foreach ($questions as $question): ?>

<h2><a href="/questions/lire/<?= $question['slug'] ?>"><?= $question['wording'] ?></a></h2>

<p><?= $question['id'] ?></p>

<?php endforeach; ?>

