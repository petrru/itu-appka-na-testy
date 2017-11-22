<?php
/**
 * Created by PhpStorm.
 * User: peta
 * Date: 21.11.17
 * Time: 20:51
 */

class Test
{
    public $test_id, $name, $user_id;

    /**
     * @return PDOStatement
     */
    public function prepare($sql) {
        $q = DB::prepare($sql);
        $q->setFetchMode(PDO::FETCH_INTO, $this);
        return $q;
    }
}