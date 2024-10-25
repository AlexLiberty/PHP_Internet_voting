<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>Вибори вибори, кандидати...</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Оберіть улюблену мову програмування</h2>
<form action="vote.php" method="post">
    <div class="radio">
    <label><input type="radio" name="language" value="C++" required> C++</label><br>
    <label><input type="radio" name="language" value="C#"> C#</label><br>
    <label><input type="radio" name="language" value="JavaScript"> JavaScript</label><br>
    <label><input type="radio" name="language" value="PHP"> PHP</label><br>
    <label><input type="radio" name="language" value="Java"> Java</label><br>
    </div>
    <button class="button" type="submit">Віддати голос</button>
</form>
<h3>Результати</h3>
<div id="results">
    <?php include 'results.php'; ?>
</div>
</body>
</html>
