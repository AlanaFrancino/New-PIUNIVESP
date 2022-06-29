

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class='row' style="max-width: 100%;">
        <div class='col-md-12'>
            <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
                <h5 class="card-header h5">Emprestimos</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Livro</th>
                            <th scope="col">Data Retirada</th>
                            <th scope="col">Data Prev Devolução</th>
                            <th scope="col">Devolvido?</th>
                            <th scope="col">Devolver</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $emprestimos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emprestimo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th scope="row"><?php echo e($emprestimo->id); ?></th>
                                <?php if(!empty($emprestimo->funcionario)): ?>
                                    <td><?php echo e($emprestimo->funcionario->nome); ?></td>
                                <?php else: ?>
                                    <td><?php echo e($emprestimo->aluno->nome); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($emprestimo->livro->titulo); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($emprestimo->created_at))); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($emprestimo->dt_prevdev))); ?></td>

                                <?php if($emprestimo->status == 'Delvolvido'): ?>
                                    <td>
                                        <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('emprestimos.update', ['id' => $emprestimo->id])); ?>"  class="btn btn-xs btn-info pull-center" style="pointer-events: none;">Devolver</a> 
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('emprestimos.update', ['id' => $emprestimo->id])); ?>"  class="btn btn-xs btn-info pull-center">Devolver</a> 
                                    </td>
                                <?php endif; ?>



                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>Emprestimos não encontrado. <?php if(isset($parameter)): ?>
                                    na busca pelo filtro: <?php echo e($parameter); ?>

                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </tbody>

                </table>
                <div class="card-footer">
                    <div class="row d-flex justify-content-center ">
                        <?php echo e($emprestimos->links()); ?>

                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/emprestimos/emprestimos.blade.php ENDPATH**/ ?>