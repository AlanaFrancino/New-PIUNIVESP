

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<?php $__env->startSection('content'); ?>
<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents(resource_path('views/UIDContainer.blade.php'),$Write) 
?>
<script>
    $(document).ready(function(){
         $("#getUID").load("<?php echo e(route('UIDContainer')); ?>");
        setInterval(function() {
            $("#getUID").load("<?php echo e(route('UIDContainer')); ?>");	
        }, 500);
    });
</script>

<p id="getUID" hidden></p>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h3 align="center" class="pt-5" id="blink">Favor Ler Tag ou Digite o Nome do Usuario para Buscar os Dados</h3>
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
                            <label for="tag">Tag</label>
                            <input class="form-control form-control-lg <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> typeahead "
                                id="searchtag" type="text" placeholder="Insira a Tag" value="<?php echo e(old('searchtag')); ?>">
                            <?php $__errorArgs = ['searchtag'];
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
                                $('#searchtag').val(ui.item.tag);
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

                        var path3 = "<?php echo e(route('emprestimos.autocompletetag')); ?>";
                
                        $("#searchtag").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: path3,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        searchtag: request.term
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#search').val(ui.item.label);
                                $('#iduser').val(ui.item.id);
                                $('#searchtag').val(ui.item.tag);
                                console.log(ui.item);
                                console.log(ui.item.id);
                                return false;
                            }
                        });

                    </script>

                    <script>
                        var myVar = setInterval(myTimer, 1000);
                        var myVar1 = setInterval(myTimer1, 1000);
                        var oldID="";
                        clearInterval(myVar1);
                    
                        function myTimer() {
                            var getID=document.getElementById("getUID").innerHTML;
                            oldID=getID;
                            if(getID!="") {
                                document.querySelector("#searchtag").value = getID;
                                // myVar1 = setInterval(myTimer1, 500);
                                showUser(getID);
                                clearInterval(myVar);
                            }
                        }
                        
                        function myTimer1() {
                            var getID=document.getElementById("getUID").innerHTML;
                            if(oldID!=getID) {
                                document.querySelector("#searchtag").value = getID;
                                // myVar = setInterval(myTimer, 500);
                                clearInterval(myVar1);
                            }
                        }
                        
                        function showUser(str) {
                            if (str == "") {
                                document.getElementById("show_user_data").innerHTML = "";
                                return;
                            } else {
                                if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    // code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("show_user_data").innerHTML = this.responseText;
                                    }
                                };
                                xmlhttp.open("GET","read tag user data.php?id="+str,true);
                                xmlhttp.send();
                            }
                        }
                        
                        var blink = document.getElementById('blink');
                        setInterval(function() {
                            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
                        }, 750); 
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