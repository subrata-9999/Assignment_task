<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palindrome and Array Functions</title>
</head>
<body>
    <h1>Palindrome Check</h1>
    <p>Is "Madam" a palindrome? <?= $isStringPalindrome ? 'Yes' : 'No' ?></p>
    <p>Is "12321" a palindrome? <?= $isNumberPalindrome ? 'Yes' : 'No' ?></p>

    <h1>Unique Values</h1>
    <p>Unique values: <?= implode(', ', $uniqueValues) ?></p>

    <h1>Duplicate Counts</h1>
    <p>Duplicate counts:</p>
    <ul>
        <?php foreach ($duplicateCounts as $value => $count): ?>
            <li>Value: <?= $value ?>, Count: <?= $count ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
