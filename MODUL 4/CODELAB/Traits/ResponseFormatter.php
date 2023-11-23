<?php

namespace Traits;


trait ResponseFormatter{
    public function responseFormatter($code, $messsage, $data = null){
        return json_encode([
            "code" => $code,
            "messages" => $messsage,
            "data" => $data
        ]);
    }
}
?>