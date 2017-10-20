<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 14:22
 * 时间相关函数
 */
//echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975));
//echo "Oct 3, 1975 was on a ". mktime(0,0,0,10,3,1975);  // mktime是将各种时间参数转换为时间戳 秒为单位
// date 函数 格式化显示时间
/**
 * date的第一个参数释义
 * Y:m:d H:i:s
 * 年月日 时分秒
 * l 为日期所在是周几
 * z 今天是这一年的第几天 注意 这是从第0天开始的
 * W 这是一年的第几周，从周一开始的计算方法
 * F 这是第几月
 * M 月份单词的简写
 * m 两位的数字月份
 * L 是否为闰年
 * Y 四位的年份
 * y 两位的年份
 */
echo date('z W F M m L y', mktime(0,0,0,1,2,1999));