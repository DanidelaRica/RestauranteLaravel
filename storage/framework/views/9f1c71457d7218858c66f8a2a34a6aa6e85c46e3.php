<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Restaurante | Contacto'); ?>

<?php $__env->startSection('content'); ?>


    </form>
    <div class="container">
        <div class="row mx-0 justify-content-center">
            <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
                <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="<?php echo e(route('welcome.contact')); ?>">
                    <?php echo csrf_field(); ?>
                    <label class="d-block mb-4" for="name">
                        <span class="form-label d-block">Tu nombre</span>
                        <input name="name" id="name" type="text" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" class="form-control" required/>
                    </label>

                    <label class="d-block mb-4" for="email">
                        <span class="form-label d-block">Email</span>
                        <input name="email" id="email" type="email" class="form-control" placeholder="mail@example.com" required />
                    </label>

                    <label class="d-block mb-4" for="phone">
                        <span class="form-label d-block">Telefono</span>
                        <input name="phone" id="phone" type="tel" pattern="[0-9]{9}" class="form-control" required />
                    </label>

                    <label class="d-block mb-4" for="message">
                        <span class="form-label d-block">Mensaje</span>
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="" required></textarea>
                    </label>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary px-3 rounded-3">
                            Enviar
                        </button>
                    </div>


            </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\restauranteee\resources\views/welcome/contact.blade.php ENDPATH**/ ?>