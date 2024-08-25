<?php

namespace Security\Skeleton\Controllers;

class BankController extends Controller
{
    public function __invoke(string $bankAccountId): void
    {
        /**
         * To make a depency injection here, the user only need to pass OR 1=1 in the url
         * like: http://localhost:8080/bankAccount?id=5 OR 1=1
         */
        $statement = $this->connection->prepare("
                SELECT t1.*, t2.* 
                FROM users as t1 JOIN 
                    (SELECT * FROM bankAccounts WHERE id = $bankAccountId) as t2
                ON t1.id = t2.user_id
            "
        );
        $statement->execute();
        $results = $statement->fetch(\PDO::FETCH_ASSOC);
        view("bankAccount", [
            "results" => $results
        ]);
    }
}