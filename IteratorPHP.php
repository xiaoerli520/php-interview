<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/30
 * Time: 13:19
 */

class MyIterator implements Iterator {
    private $position = 0;
    private $arr = [
        'first', 'second', 'third',
    ];

    public function __construct() {
        $this->position = 0;
    }

    public function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        var_dump(__METHOD__);
        return $this->arr[$this->position];
    }

    public function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        var_dump(__METHOD__);
        return isset($this->arr[$this->position]);
    }

}

$it = new MyIterator();

foreach($it as $key => $value) {
    echo "\n";
    var_dump($key, $value);
}