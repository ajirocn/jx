<?php
// 获取视频链接
function get_video_url($url) {
    // 发送请求获取页面内容
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // 解析页面获取视频链接
    preg_match('/"url":"(.*?)"/', $response, $matches);
    $video_url = $matches[1];

    return $video_url;
}

// 处理请求
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $video_url = get_video_url($url);
    echo json_encode(array('url' => $video_url));
}
?>
