<?php

    namespace App\Service;

    interface Newspaper
    {
        public function subscribe(string $email,$list=null);
    
    }
