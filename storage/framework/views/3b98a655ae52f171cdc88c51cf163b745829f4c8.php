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

                <div class="row">
                    <div class="col">
                        <h4>Tus tarjetas</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            Nueva tarjeta
                        </button>
                        <?php $creditCards = Auth::user()->creditCards()->get(); ?>
                        <?php if(count($creditCards) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr class="tr-header">
                                            <th class="dt-head-center">Tarjeta</th>
                                            <th class="dt-head-center">Mes expiración</th>
                                            <th class="dt-head-center">Año expiración</th>
                                            <th class="dt-head-center">CVV</th>
                                            <th class="dt-head-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $creditCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-row">
                                                <td class="dt-body-left">
                                                    <?php echo e($card->num_card); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($card->expire_month); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($card->expire_year); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($card->cvv); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <form action="<?php echo e(route('cards.destroy', $card->num_card)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger">
                                                            Eliminar tarjeta
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><b>No hay datos</b></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade modal-core" id="createModal" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text" id="trainerModalLabel">Nueva reserva</h5>
            </div>
            <div class="modal-body">
                <div id="booking-response"></div>
                <form class="form-core" method="post" action="<?php echo e(route('cards.create')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="num_card">Tarjeta crédito</label>
                            <input type="text" pattern="\d{16}$" id="num_card" name="num_card" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="expire_month">Mes expiración</label>
                            <input type="number" min="1" max="12" id="expire_month" name="expire_month" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="expire_year">Año expiración</label>
                            <input type="number" min="23" max="99" id="expire_year" name="expire_year" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" required="required" pattern="\d{3}$" title="Por favor ingrese un número de 3 cifras entre 000 y 999." />
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-1">
                        <button type="submit" class="btn btn-action">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restauranteee\resources\views/profile.blade.php ENDPATH**/ ?>