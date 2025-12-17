<?php


namespace Core;

abstract class Controller{
    protected function view(string $view): void{
        require __DIR__."/../app/Views/layouts/header.php";
        require __DIR__."/../app/Views/'.$view.'.php";
        require __DIR__."/../app/Views/layouts/footer.php";
    }
}