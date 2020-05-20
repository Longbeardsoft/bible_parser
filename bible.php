<?php
// Получает содержимое файла в виде массива. В данном примере мы используем
// обращение по протоколу HTTP для получения HTML-кода с удаленного сервера.
include("spisok.php");
for ($id_book=1;$id_book<=77;$id_book++) {
    $file = $PathName[$id_book];
    $ShortName = $ShortName[$id_book];
    $chapters=$ChapterQty[$id_book];
    $lines = file("Bible/$file");
    if ($id_book!=69) $lines_slavic = file("Bible-slavic/$file");
    $i = 0;
    foreach ($lines as $line_num => $line) {
        $line = iconv('windows-1251', 'UTF-8', $line);
        //$line = mb_convert_encoding($line, "utf-8");
        if (preg_match('/^=== ([0-9#]{1,3}) ===/', $line, $matches))
            $m = $matches[1];//{ var_dump($matches[1]);var_dump($chapter);echo '<br>';}
        for ($j = 1; $j <= $chapters; $j++) {
            if (strcasecmp($m, $j) == 0)
                if (preg_match('/^([0-9#]{1,3})\s(\D+)/', $line, $matches)) {
            $numVerse[$i] = $matches[1];
            $textVerse[$i] = str_replace("_", " ", $matches[2]);
            $result[1][$id_book][$j][$numVerse[$i]]= $textVerse[$i];
            $i++;
            //		echo "<tr><td>$numVerse</td><td>$textVerse</td><td>empty</td></tr>";
        }
    }
    }
    $i = 0;
    foreach ($lines_slavic as $line_num => $line) {
        $line = iconv('windows-1251', 'UTF-8', $line);
        //$line = mb_convert_encoding($line, "utf-8");
        if (preg_match('/^=== ([0-9#]{1,3}) ===/', $line, $matches))
            $m = $matches[1];//{ var_dump($matches[1]);var_dump($chapter);echo '<br>';}
        for ($j = 1; $j <= $chapters; $j++) {
            if (strcasecmp($m, $j) == 0)
                if (preg_match('/^([0-9#]{1,3})\s(\D+)/', $line, $matches)) {
                $numVerse[$i] = $matches[1];
                $textVerse[$i] = str_replace("_", " ", $matches[2]);
                $result[2][$id_book][$j][$numVerse[$i]] = $textVerse[$i];
                $i++;
                //		echo "<tr><td>$numVerse</td><td>$textVerse</td><td>empty</td></tr>";
            }
        }
    }


}
//echo '<pre>';print_r($result);echo '</pre>';
$host = 'localhost'; // адрес сервера
//$database = "bible_test"; // имя базы данных
$database = "host1382121_bible"; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// выполняем операции с базой данных
echo "Connected successfully";
$sql = "truncate table bible";
if (mysqli_query($link, $sql)) {
    echo "truncated table";
}
$translate_name[1]="Синодальный";
$translate_name[2]="Славянский";
foreach ($result as $translate_id => $v1) {
    foreach ($v1 as $book_id => $v2) {
        foreach ($v2 as $chapter_id => $v3) {
            foreach ($v3 as $verse_id => $text) {
                $book_name=$FullName[$book_id];
                $text=str_replace("'", '"', $text);
//echo '<br>$interpretation_id='.$interpretation_id.'$book_id='.$book_id.'$chapter_id='.$chapter_id.'$verse_id'.$verse_id.'$text=('.$text.')';
                $sql = "INSERT INTO bible (translate_id,translate_name,book_id,book_name,chapter_id,verse_id,text) VALUES ('$translate_id','$translate_name[$translate_id]','$book_id','$book_name', '$chapter_id','$verse_id','$text')";
                if (mysqli_query($link, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    $error_arr[$translate_id][$book_id][$chapter_id][$verse_id]="Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
        }
    }
}
// закрываем подключение
mysqli_close($link);

echo '<pre>';print_r($error_arr);echo '</pre>';

?>