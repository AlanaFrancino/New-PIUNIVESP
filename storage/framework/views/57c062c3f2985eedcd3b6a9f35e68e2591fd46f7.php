<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissible alert-dismissible fade show mb-0" role="alert">

	<strong><?php echo e($message); ?></strong>
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
	</button>
</div>
<?php endif; ?>


<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-dismissible alert-dismissible fade show mb-0">

	<strong><?php echo e($message); ?></strong>
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        
	</button>	
</div>
<?php endif; ?>


<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissible alert-dismissible fade show mb-0">

	<strong><?php echo e($message); ?></strong>
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
	</button>
</div>
<?php endif; ?>


<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-dismissible alert-dismissible fade show mb-0">

	<strong><?php echo e($message); ?></strong>
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
	</button>
</div>
<?php endif; ?>


<?php if($errors->any()): ?>
<div class="alert alert-danger alert-dismissible alert-dismissible fade show mb-0">

	<strong>Please check the form below for errors</strong>
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
	</button>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/flash-message.blade.php ENDPATH**/ ?>