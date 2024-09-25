<!-- Modal -->
<div class="modal fade modal-core" id="createModal" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text" id="trainerModalLabel">Nueva reserva</h5>
                <button type="button" class="close" id="close-modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="booking-response"></div>
                <form class="form-core" id="create-booking-form" method="post">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="date">Fecha</label>
                            <input type="date" id="date" name="date" class="form-control" required="required" readonly="readonly" />
                        </div>
                        <div class="form-group col">
                            <label for="time">Hora</label>
                            <input type="text" id="time" name="time" class="form-control" required="required" readonly="readonly" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="table">Mesa</label>
                            <select name="table" id="table" class="form-control">
                                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($table->id); ?>">Mesa de <?php echo e($table->seats); ?> asientos</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="num_people">Comensales</label>
                            <input type="number" min="5" max="5" id="num_people" name="num_people" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="menu">Menu</label>
                            <select name="menu" id="menu" class="form-control">
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?> - <?php echo e($menu->prize); ?>€</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php if($user): ?>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="num_card">Tarjeta crédito</label>
                                <select name="num_card" id="num_card" class="form-control">
                                    <?php $__currentLoopData = $credit_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($card->num_card); ?>"><?php echo e($card->num_card); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="credit_card">Tarjeta crédito</label>
                                <input type="text" pattern="\d{16}$" id="credit_card" name="credit_card" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="expire_month">Mes expiración</label>
                                <input min="1" max="12" type="number" id="expire_month" name="expire_month" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="expire_year">Año expiración</label>
                                <input min="23" max="99" type="number" id="expire_year" name="expire_year" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" required="required" pattern="\d{3}$"
                                title="Por favor ingrese un número de 3 cifras entre 000 y 999." />
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!$user): ?>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="surname">Apellido</label>
                                <input type="text" id="surname" name="surname" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="email">Email</label>
                                <input type="email"
                                id="email" name="email" class="form-control" required="required" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="phone">Teléfono</label>
                                <input type="text" pattern="[0-9]{9}" id="phone" name="phone" class="form-control" required="required" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="text-center mt-4 mb-1">
                        <button type="submit" class="btn btn-action">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\wamp64\www\restauranteee\resources\views/welcome/modal.blade.php ENDPATH**/ ?>