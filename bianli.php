<?php
/**
 * Created by PhpStorm.
 * User: guo
 * Date: 17/10/19
 * Time: 上午9:29
 */

$dir = './mulubianli';

// 如果文件名称是目录 则进行继续打开

// 是递归的操作

function LoopDir($dir)
{
    $handle = opendir($dir);
    // 这样写是为了防止短路情况
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            echo $file."\n";
            if (filetype($dir.'/'.$file ) == 'dir') {
                LoopDir($dir.'/'.$file);
            }
        }
    }
}


LoopDir($dir);
