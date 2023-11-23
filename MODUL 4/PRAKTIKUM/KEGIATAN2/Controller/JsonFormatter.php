<?php

namespace Controller;


trait JsonFormatter{
       public function JsonFormatter($code, $messsage, $value = null){
            return json_encode([
                "code" => $code,
                "messages" => $messsage,
                "value" => $value

            ]);
       }  
}
?>