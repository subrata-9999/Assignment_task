<!DOCTYPE html>
<html lang="en">
<?= view('Components/Header', ['page_title' => "Dashboard"]) ?>
<body>
    <?= view('Components/Navbar') ?>
    <div style="margin-left: 3%;">
    <h2><?= session()->get('user_name') ?>, Welcome to Dashboard</h2>
    </div>
<?php
    
    // echo session()->get('user_name').'<br>';
    // echo session()->get('user_email').'<br>';
    // echo session()->get('user_status').'<br>';
    // echo session()->get('user_type').'<br>';

    
?>

    <?= view('Components/Script'); ?>
    
</body>
</html>