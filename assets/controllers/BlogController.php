<?php

class BlogController
{
    public function index()
    {
        require "./assets/views/blog_index.phtml";
    }

    public function show(int $id)
    {
        require "./assets/views/blog_show.phtml";
    }
}