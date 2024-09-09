<?php view("templates/headers") ?>
<div class="flex w-full justify-center">
    <div class="flex flex-col container bg-gray-100">
        <h1 class="flex items-center justify-center">Dados da conta</h1>
        <div class="flex flex-col">
            <span>Total armazenado: <?php echo $results["total_money"]; ?></span>
            <span>Data de criação: <?php echo $results["created_at"]; ?></span>
            <span>Email do dono: <?php echo $results["email"]; ?></span>
        </div>
    </div>
</div>

<div>
    <h1>Importar suas notas fiscais</h1>
    <form action="/bankAccount/importFromWeb" method="POST">
        <input type="text" name="url" placeholder="URL">
        <button type="submit">Importar</button>
    </form>
</div>
