<?php
class Pagination{
    // phuong thuc tim start
    // cho $limit = 8
    public function findStart($limit){
        //kiem tra current_page trên url có tồn tại hay không
        if (!isset($_GET['page']) || $_GET['page']==1) {
            $start = 0;
            $_GET['page'] = 1;
        }else{
            $start = ($_GET['page'] - 1)*$limit;
        }
        return $start;
    }
    // phuong thuc tim so page
    public function findPage($count, $limit){
        $page = ($count%$limit==0)?($count/$limit):(floor($count/$limit)+1);
        return $page;
    }
}