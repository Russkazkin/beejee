<?php


namespace app\models\entities;


class Task extends DataEntity
{
    protected $user_id;
    protected $author;
    protected $email;
    protected $text;
    protected $status;

    public function __construct($user_id = null,
                                $author = null,
                                $email = null,
                                $text = null,
                                $status = 0)
    {
        $this->user_id = $user_id;
        $this->author = $author;
        $this->email = $email;
        $this->text = $text;
        $this->status = $status;

        parent::__construct();
    }
}