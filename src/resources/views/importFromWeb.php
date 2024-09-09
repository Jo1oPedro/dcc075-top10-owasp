<!-- Simulate a SSRF vulnerability -->
<?php view("templates/headers") ?>
<div class="flex w-full justify-center">
    <div class="flex flex-col container bg-gray-100">
        <h1 class="flex items-center justify-center">Dados importados</h1>
        <div class="flex flex-col">
            <span><?php echo $data; ?></span>
        </div>
    </div>
</div>