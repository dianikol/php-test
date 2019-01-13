<?php

namespace App;

class Article
{
    public $title;

    public function getSlug() : string
    {
        $title = strtolower($this->title);

        return str_replace(' ', '_', $title);
    }
}