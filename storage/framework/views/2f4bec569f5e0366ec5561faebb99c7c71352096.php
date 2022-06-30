

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class='dashboard-content'>
        <div class='container'>
            <div class='card'>
                <br>
                <div class='card-header'>
                    <h1>Bem vindo ao Web Delmira</h1>
                </div>
                <h5 class="card-title" style="display: flex;flex-wrap: nowrap;justify-content: space-around;">Historico de Aquisição e Acervo da biblioteca da UFRN</h5>
                <div class='card-body' style="display: flex;flex-wrap: nowrap;justify-content: space-around;">
                    <iframe title="PI2" width="700" height="400"  src="https://app.powerbi.com/view?r=eyJrIjoiYWU0YWU4NTAtZDJiNS00YzJmLThkNDEtOTA2M2RiZTBjNTU4IiwidCI6ImQ0NDU2M2FhLTIxZTMtNDNkMC1iMDlkLTU0MGNjNjlhMzlkNiIsImMiOjF9" frameborder="0" allowFullScreen="true"></iframe>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/home.blade.php ENDPATH**/ ?>