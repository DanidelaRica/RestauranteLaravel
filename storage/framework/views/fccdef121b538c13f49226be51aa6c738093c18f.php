<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', "Restaurante | Perfil"); ?>

<?php $__env->startSection('content'); ?>

    <div class="row pt-3">
        <div class="col">
            <h1 class="h2 mb-0">Perfil</h1>
            <hr class="hr-title" align="left">
        </div>
    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if(session()->has('result')): ?>
        <script type="text/javascript">
            swal({
                title: '<?php echo e(session()->get('result')->title); ?>',
                text: '<?php echo e(session()->get('result')->message); ?>',
                type: '<?php echo e(session()->get('result')->type); ?>',
                showCancelButton: false,
                confirmButtonColor: '#3EB1C8'
            });
        </script>
    <?php endif; ?>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row form-row">
                    <div class="form-group col-6">
                        <label for="exampleInputName">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Nombre" value="<?php echo e(Auth::user()->name); ?>" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Dirección de correo</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo e(Auth::user()->email); ?>" disabled>
                    </div>
                </div>
                <form action="<?php echo e(route('profile.edit')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row form-row">
                        <div class="form-group col">
                            <label for="passwordNew">Contraseña</label>
                            <input type="password" class="form-control" id="passwordNew" name="passwordNew" placeholder="Nueva Contraseña">
                        </div>
                        <div class="form-group col">
                            <label for="passwordNewConfirm">Contraseña</label>
                            <input type="password" class="form-control" id="passwordNewConfirm" name="passwordNewConfirm" placeholder="Confirmar Contraseña">
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-1">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\restaurantee\resources\views/profile.blade.php ENDPATH**/ ?>