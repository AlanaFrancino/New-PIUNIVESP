
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="text-left ">
                        <a href="<?php echo e(route('livros.create')); ?>" class="btn btn-lg bg-success text-white" title="Criar Novo Usuario">
                            <i class="fa fa-plus-circle"></i> Criar Novo Livro
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <form action="<?php echo e(route('livros.search')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Insira o Titulo">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat btn-lg text-white">Buscar</button>
                            </span>
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
                    </form>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="text-right">               
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-lg dropdown-toggle dropdown-icon" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false">
                                Filtro Livros
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="<?php echo e(route('livros.filter', ['parameter' => 'desactivated'])); ?>">Livros Desativados</a>
                                <a class="dropdown-item" href="<?php echo e(route('livros.filter', ['parameter' => 'activated'])); ?>">Livros Ativo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $livros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                               <?php echo e($livro->titulo); ?>

                            </div>
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted text-sm"><b>Autor: </b><?php echo e($livro->autor); ?></p>
                                        <?php if($livro->patrimonio <> ''): ?>
                                            <p class="text-muted text-sm"><b>Patrimonio: </b><?php echo e($livro->patrimonio); ?></p>
                                        <?php endif; ?>
                                        <?php if($livro->doacao <> ''): ?>
                                            <p class="text-muted text-sm"><b>Doação: </b><?php echo e($livro->doacao); ?></p>
                                        <?php endif; ?>
                                        <p class="text-muted text-sm"><b>Genero: </b><?php echo e($livro->genero()->first()->descricao); ?></p>
                                        <p class="text-muted"><?php if($livro->ativo): ?><span class="badge badge-success"> Ativo </span> <?php else: ?><span class="badge badge-danger right"> Desativado </span> <?php endif; ?> </p>
                                        <p class="text-muted text-sm"><b>Localização: </b><?php echo e($livro->prateleira()->first()->descricao); ?> </p>
                                        <p class="text-muted text-sm"><b>Endereço: </b><?php echo e($livro->prat_local); ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="<?php echo e(route('livros.delete', ['id' => $livro->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <a href="<?php echo e(route("livros.edit", ['id' => $livro->id])); ?>" class="btn bg-teal" title="Edit Category">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" title="Excluir Usuario"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>Usuario não encontrado. <?php if(isset($parameter)): ?> na busca pelo filtro: <?php echo e($parameter); ?> <?php endif; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center ">
                <?php echo e($livros->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>$('#flash-overlay-modal').modal();</script> 
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/livros/livros.blade.php ENDPATH**/ ?>