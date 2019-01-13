<?php

class User
{
    public $first_name;

    public $last_name;

    public $email;

    private $mailer;

    /**
     * User constructor.
     * @param $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName()
    {
        return trim("$this->first_name $this->last_name");
    }

    public function notify($messsage)
    {
        return $this->mailer->sendMessage($this->email, $messsage);
    }
}