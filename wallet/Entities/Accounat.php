<?php
class Account
{
    public $id;
    public  $balance;
    public  $isActive;


    public function getAccount($id, $balance, $initialBalance)
    {

        if ($balance < 0) {
            throw new Exception("Initial balance cannot be negative");
        }
        if($initialBalance < 0){
            throw new Exception("Initial balance cannot be negative");
        }

    }
  public function withDraw($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be greater than zero");
        }
        if ($this->balance < $amount) {
            throw new Exception("Insufficient funds in account");
        }

        $this->balance -= $amount;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be greater than zero");
        }

        $this->balance += $amount;
    }
}
