<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Send message</div>
                    <form action="sendmessage" method="POST">
                    	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="text" name="message" >
                        <input type="submit" value="send">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>