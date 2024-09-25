<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Restaurante | Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <main role="main" id="contenido">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row pt-3">
                    <div class="col">
                        <h1 class="h2 mb-0">Bienvenid@ <?php echo e(Auth::user()->name); ?></h1>
                        <hr class="hr-title" align="left">
                    </div>
                </div>
                <?php if(session()->has('result')): ?>
                <div class="row">
                    <div class="col" id="result-div">
                        <p><?php echo e(session()->get('result')); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col">
                        <h4>Tus reservas</h4>
                        <?php if(count($bookings) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr class="tr-header">
                                            <th class="dt-head-center">Fecha</th>
                                            <th class="dt-head-center">Menú</th>
                                            <th class="dt-head-center">Precio</th>
                                            <th class="dt-head-center">Asientos mesa</th>
                                            <th class="dt-head-center">Tarjeta crédito</th>
                                            <th class="dt-head-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr-row">
                                                <td class="dt-body-left">
                                                    <?php echo e(\Carbon\Carbon::parse($booking->date)->format('d-m-Y')); ?>

                                                    <br />
                                                    <?php echo e(\Carbon\Carbon::parse($booking->time)->format('H:i')); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($booking->menu->name); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($booking->menu->prize); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($booking->table->seats); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <?php echo e($booking->creditCard->num_card); ?>

                                                </td>
                                                <td class="dt-body-left">
                                                    <form action="<?php echo e(route('booking.destroy', $booking)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger">
                                                            Cancelar reserva
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
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\restauranteee\resources\views/dashboard/index.blade.php ENDPATH**/ ?>