<?php $__env->startSection('title'); ?>
<title>Pay-Per-Product Cryptocoin (payments in multiple cryptocurrencies) Payment Example</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div align='center'>

<h1>Invoice (Example)</h1>
<br>
<img style='position:absolute;margin-left:auto;margin-right:auto;left:0;right:0;' alt='status'  
    src='https://gourl.io/images/<?= ($box->is_paid()?"paid":"unpaid")  ?>.png'>
<img alt='Invoice' border='0' height='500' src='https://gourl.io/images/invoice.png'>
<br><br>
<? if (!$box->is_paid()) echo "<br><br><h2>Pay Invoice Now - </h2>";  ?>
<br><br>

<?= $box->display_cryptobox() ?>
<br><br><br>
<h3>Message :</h3>
<h2 style='color:#999'><?= $message ?></h2>
<br><br><br><br><br><br>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.crypto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>