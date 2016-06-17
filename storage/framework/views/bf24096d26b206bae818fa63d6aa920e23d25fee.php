<?php $__env->startSection('content'); ?>

<?php echo $__env->make('navigation-container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Laravel 5.2 with</div>

                <div class="panel-body">
                    CryptoPayment GoURL.io + Node + Socket.IO + Express + MySQL +
					Events Broadcast Examples
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>