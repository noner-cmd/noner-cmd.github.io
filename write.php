<?php
// 设置正确的发布密码
$correctPassword = 'root';  // 请替换为您希望设置的密码

// 检查是否有 POST 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取标题、内容和密码
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $date = date('Y.m.d');  // 获取当前日期

    // 检查标题、内容和密码是否为空
    if (!empty($title) && !empty($content)) {
        // 检查密码是否正确
        if ($password === $correctPassword) {
            // 格式化博客内容
            $blogEntry = "标题：$title\n内容：\n→$date\n$content\n\n";

            // 将博客内容追加到 blog.txt
            $file = 'blog.txt';
            if (file_exists($file)) {
                // 追加内容
                file_put_contents($file, $blogEntry, FILE_APPEND);
                echo '发布成功！';
            } else {
                // 如果文件不存在，则创建文件并写入内容
                file_put_contents($file, $blogEntry);
                echo '发布成功！';
            }
        } else {
            echo '密码错误！';
        }
    } else {
        echo '标题或内容不能为空！';
    }
} else {
    echo '非法请求！';
}
?>