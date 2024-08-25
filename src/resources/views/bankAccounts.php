<?php view("templates/headers") ?>
<div class="flex w-full justify-center">
    <div class="flex flex-col container bg-gray-100">
        <h1 class="flex items-center justify-center">Contas bancarias</h1>
        <div class="flex flex-col">
            <?php foreach($results as $bankAccount): ?>
                <a href="/bankAccount?id=<?php echo $bankAccount["id"]; ?>">Conta bancaria <?php echo $bankAccount["id"] ;?></a>
            <? endforeach; ?>
        </div>
    </div>
</div>
