<?php $__env->startSection('title', "Restaurante | Login"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center text-center">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <h6>Por favor corrige los siguiente errores:</h6>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="col-6 offset-3">
                    <form
                        class="w-100 rounded-1 p-4 border bg-white"
                        id="loginform"
                        method="post"
                        action="<?php echo e(route('user.docreate')); ?>"
                    >
                        <?php echo e(csrf_field()); ?>

                        <input
                        type="email"
                        class="form-control mb-2"
                        name="email"
                        placeholder="Email"
                        aria-label="Email"
                        aria-describedby="basic-addon1"
                        required autofocus
                    />
                    <input
                                        type="password"
                                        name="password"
                                        class="form-control mb-2"
                                        placeholder="Contraseña"
                                        aria-label="Contraseña"
                                        aria-describedby="basic-addon1"
                                        required
                                    />
                    <input
                                    type="text"
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                    class="form-control mb-2"
                                    name="name"
                                    placeholder="Nombre"
                                    aria-label="Name"
                                    aria-describedby="basic-addon1"
                                    required autofocus
                                />
                    <input
                                    type="text"
                                    pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                                    class="form-control mb-2"
                                    name="surname"
                                    placeholder="Apellido"
                                    aria-label="Surname"
                                    aria-describedby="basic-addon1"
                                    required autofocus
                                />
                    <input
                                    type="text"
                                    class="form-control mb-2"
                                    name="phone"
                                    pattern="[0-9]{9}"
                                    placeholder="Telefono"
                                    aria-label="Phone"
                                    aria-describedby="basic-addon1"
                                    required autofocus
                                />
                                    <button
                                            class="btn btn-success"
                                            type="submit"
                                        >
                                            Registrar
                                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\restauranteee\resources\views/welcome/register.blade.php ENDPATH**/ ?>