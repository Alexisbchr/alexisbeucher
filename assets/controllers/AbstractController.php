<?php

abstract class AbstractController
{
	protected function clean_input($data)
	{
        $data = trim($data); //enleve les espaces avant et après une string
        $data = stripslashes($data); // enlève les '' d'une string
        $data = htmlspecialchars($data); //remplace certains caractères par une entité html (ex: > par &gt;)

        return $data;
    }
}