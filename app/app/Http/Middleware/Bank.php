<?php

class Bank implements BankInterface
{
    public function BookViaSepa($member)
    {
        dd("Geld wurde von {$member} abgebucht ;)");
    }
}

?>