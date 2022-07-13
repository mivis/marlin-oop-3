<?php

namespace App\Controllers;

use App\QueryBuilder;
use League\Plates\Engine;

class Home {
    private $posts, $templates;

    public function __construct() {
        $this->posts = new QueryBuilder;
        $this->templates = new Engine('../app/views');
    }

    public function getAll($table, $template, $title, $status) {
        echo $this->templates->render($template, [
            'title' => $title,
            'status' => $status
            ]);
            
       foreach (($this->posts->getAll($table)) as $array) {
            foreach ($array as $key=>$value) {
                echo $key.' = '.$value.'; ';
            }
            echo '<br>';
        };    
    }

    public function getOne($table, $id, $template, $title, $status) {
        echo $this->templates->render($template, [
            'title' => $title,
            'status' => $status
            ]);
        if (!$this->posts->getOne($table, $id)) {
            echo 'ID isn`t exist';
            exit;
        }
        foreach (($this->posts->getOne($table, $id)) as $key=>$value) {
            echo $key.' = '.$value.'; ';
        }
    }

    public function insert($table, $data, $template, $title, $status) {
        echo $this->templates->render($template, [
            'title' => $title,
            'status' => $status
            ]);      
        $this->posts->insert($table, $data);
    }

    public function update($table, $id, $data, $template, $title, $status) {
        echo $this->templates->render($template, [
            'title' => $title,
            'status' => $status
            ]);      
        $this->posts->update($table, $id, $data);
    }

    public function delete($table, $id, $template, $title, $status) {
        echo $this->templates->render($template, [
            'title' => $title,
            'status' => $status
            ]);    
        $this->posts->delete($table, $id);
    }

    public function inputData($data) {
        
    }
    
}
?>