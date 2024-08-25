<?php

namespace Security\Skeleton\Controllers;

class BankController extends Controller
{
    public function __invoke(string $bankAccountId): void
    {
        /*$statement = $this->connection->prepare("SELECT * FROM bankAccounts WHERE id = {$bankAccountId}");
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        dd($results);*/
        $statement = $this->connection->prepare("
                SELECT t1.*, t2.* 
                FROM users as t1 JOIN 
                    (SELECT * FROM bankAccounts WHERE id = ?) as t2
                ON t1.id = t2.user_id
            "
        );
        $statement->execute([$bankAccountId]);
        $results = $statement->fetch(\PDO::FETCH_ASSOC);

        view("bankAccount", [
            "results" => $results
        ]);
    }
}