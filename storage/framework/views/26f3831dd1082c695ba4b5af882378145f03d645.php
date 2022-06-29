

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 pt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Novo Emprestimo</h3>
                </div>
                <form action="<?php echo e(route('emprestimos.store')); ?>" method="POST">
                    <div class="card-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nome">Usuario</label>
                            <input type="hidden" name="iduser" id="iduser">
                            <input class="form-control form-control-lg <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> typeahead "
                                id="search" type="text" placeholder="Insira o Nome" value="<?php echo e(old('search')); ?>">
                            <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="Livro">Livro</label>
                            <input type="hidden" name="idlivro" id="idlivro">

                            <input class="typeahead form-control form-control-lg <?php $__errorArgs = ['sobrenome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="search2" type="text" placeholder="Insira o nome do livro"
                                value="<?php echo e(old('search2')); ?>">

                            <?php $__errorArgs = ['search2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="error invalid-feedback"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Qtd">Quantidade Retirada</label>
                                    <input type="text" class="form-control" name="Qtd" id="Qtd">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="data_dev">Data De Devolução</label>
                                    <input type="date" class="form-control" name="data_dev" id="data_dev">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <script type="text/javascript">
                        var path = "<?php echo e(route('emprestimos.autocomplete')); ?>";
                
                        $("#search").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: path,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        search: request.term
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#search').val(ui.item.label);
                                $('#iduser').val(ui.item.id);
                                console.log(ui.item);
                                console.log(ui.item.id);
                                return false;
                            }
                        });
                
                        var path2 = "<?php echo e(route('emprestimos.autocompletelivros')); ?>";
                
                        $("#search2").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: path2,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        search2: request.term
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#search2').val(ui.item.label);
                                $('#idlivro').val(ui.item.id);
                                console.log(ui.item);
                                console.log(ui.item.id);
                                return false;
                            }
                        });
                    </script>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn brn-lager btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/emprestimos/cadastro.blade.php ENDPATH**/ ?>