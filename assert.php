
<?php
// 激活断言，并设置它为 quiet
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 1);
assert_options(ASSERT_BAIL, 1); // 断言有错时停止执行
assert_options(ASSERT_QUIET_EVAL, 1);

//创建处理函数
function my_assert_handler($file, $line, $code, $desc = null)
{
    echo "Assertion failed at $file:$line: $code";
    if ($desc) {
        echo ": $desc";
    }
    echo "\n";
}

// 设置回调函数
assert_options(ASSERT_CALLBACK, 'my_assert_handler');

// Make an assertion that should fail
assert('2 < 1');
assert('2 < 1', 'Two is less than one');
?>