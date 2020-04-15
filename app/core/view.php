<?php
class View {

    function generate($view_name, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */
        #var_dump('app/views/'.$view_name.'.php');
        include_once 'app/views/'.$view_name.'.php';
    }
}
