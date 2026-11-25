<?php

class TransferMoneyController
{

    public function getAccountById($accountId)
    {
        // Fetch the account from the database based on the account ID
        // For demonstration purposes, we'll create a dummy account
        $account = new Account();
        $account->id = $accountId;
        $account->balance = 1000; // Example balance
        $account->isActive = true; // Example status

        return $account;
    }
    public function transferMoney($sourceAccountId, $destinationAccountId, $amount)
    {
        // Fetch source and destination accounts from the database
        $sourceAccount = $this->getAccountById($sourceAccountId);
        $destinationAccount = $this->getAccountById($destinationAccountId);

        // Create a TransferMoney use case instance
        $transferMoney = new TransferMoney($sourceAccount, $destinationAccount);

        // Perform the transfer
        try {
            $transferMoney->transfer($amount);
            echo "Transfer successful!";
        } catch (Exception $e) {
            echo "Transfer failed: " . $e->getMessage();
        }
    }
}
