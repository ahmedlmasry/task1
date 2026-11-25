<?php
class TransferMoney
{
    private $sourceAccount;
    private $destinationAccount;

    public function __construct(Account $sourceAccount, Account $destinationAccount)
    {
        $this->sourceAccount = $sourceAccount;
        $this->destinationAccount = $destinationAccount;
    }

    public function transfer($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Transfer amount must be greater than zero");
        }
        if ($this->sourceAccount->balance < $amount) {
            throw new Exception("Insufficient funds in source account");
        }

        // Perform the transfer
        $this->sourceAccount->balance -= $amount;
        $this->destinationAccount->deposit($amount);
    }
}