<?php $__env->startSection('title'); ?>
<title>Insert title here</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?= $payment_box ?>
<?= $message ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.crypto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>