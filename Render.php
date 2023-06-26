<?php

class Render {
    public static function renderView($viewName) {
        if (file_exists('./view/'.$viewName.'.php')) {
            include_once './view/'.$viewName.'.php';
            return;
        }
        echo 'Error: View not found';
    }
}