<?php

    class BlogController extends AbstractController
    {
        public function index()
        {
            $page = "blog_index";
            $pageName = "blog";
            require "./assets/views/layout.phtml";
        }

        public function show(int $id)
        {
            $page = "blog_index";
            $pageName = "blog article";
            require "./assets/views/layout.phtml";
        }
    }