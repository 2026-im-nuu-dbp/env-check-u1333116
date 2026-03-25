<?php
// 直條圖繪製程序

// 1. 設定標頭
header("Content-Type: image/png");

// 2. 建立畫布 500x300
$width = 500;
$height = 300;
$im = imagecreatetruecolor($width, $height);

// 3. 配置顏色
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$black = imagecolorallocate($im, 0, 0, 0);
$gray = imagecolorallocate($im, 200, 200, 200);

// 4. 填滿背景
imagefill($im, 0, 0, $white);

// 5. 從 data.csv 檔案讀取資料
$csv_file = 'data.csv';
if (file_exists($csv_file)) {
    $csv_data = file_get_contents($csv_file);
    $data = array_map('intval', explode(',', trim($csv_data)));
} else {
    $data = array(300, 200, 700, 50, 125);
}

// 6. 繪製直條圖
// 計算：
// 5 條直條，左右各留空間，每條間隔 90
// 長條的位置為 (45 + 90*$i, 280 - $h[$i] + 10), 右下角 (90 + 90*$i, 290)
for($i = 0; $i < 5; $i++) {
    $h[$i] = $data[$i] * 2.0 / 5.0;
    imagefilledrectangle($im, 45 + 90 * $i, 280 - $h[$i] + 10, 90 + 90 * $i, 290, $red);
}

// 7. 繪製坐標軸
// X 軸
imageline($im, 40, 290, 490, 290, $black);
// Y 軸
imageline($im, 40, 10, 40, 290, $black);

// 8. 輸出並銷毀
imagepng($im);
imagedestroy($im);
?>
