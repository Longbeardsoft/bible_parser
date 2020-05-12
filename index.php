<?php
$interpretation_id = 1;
$interpretation[$interpretation_id] = 'Feof_Bolgar';
$htm_files[0] = '1Co.htm';
$htm_files[1] = '1Jn.htm';
$htm_files[2] = '1Pe.htm';
$htm_files[3] = '1The.htm';
$htm_files[4] = '1Ti.htm';
$htm_files[5] = '2Co.htm';
$htm_files[6] = '2Jn.htm';
$htm_files[7] = '2Pe.htm';
$htm_files[8] = '2The.htm';
$htm_files[9] = '2Ti.htm';
$htm_files[10] = '3Jn.htm';
$htm_files[11] = 'Ac.htm';
$htm_files[12] = 'Col.htm';
$htm_files[13] = 'Eph.htm';
$htm_files[14] = 'Ga.htm';
$htm_files[15] = 'Ja.htm';
$htm_files[16] = 'Jn.htm';
$htm_files[17] = 'Jud.htm';
$htm_files[18] = 'Lk.htm';
$htm_files[19] = 'Mk.htm';
$htm_files[20] = 'Mt.htm';
$htm_files[21] = 'Phl.htm';
$htm_files[22] = 'Ro.htm';
$htm_files[23] = 'Tit.htm';
$arr = Array();
$continue = false;
foreach ($htm_files as $book => $htm_file) {
    $filename = "Feof_Bolgar/$htm_file";
    $lines = file($filename);
    $chapter = 0;
    foreach ($lines as $idx => $line) {
        $line = iconv('Windows-1251', 'UTF-8', $line);
        if (preg_match('/<H2>([А-Яа-я\s]*)/', $line, $matches)) {
//trim($matches[1]);
//echo "<br>$book=$chapter=".$matches[1];
            $chapter++;
            $continue = true;
            $verse = 0;
            continue;
        }
        if ($continue && $chapter > 0) {
            if (preg_match('/<P>(\d+)-(\d+) (.*)/', $line, $matches)) {
                $verse1 = $matches[1];
                $verse2 = $matches[2];
                $text = $matches[3];
                foreach (range($verse1, $verse2) as $number) {
                    $arr[$interpretation_id][$book][$chapter - 1][$number] = $text;
                }
//echo 'verse12='.$verse1.'-'.$verse2.'('.$text.')';
            } else if (preg_match('/<P>(\d+) (.*)/', $line, $matches)) {
                $verse = $matches[1];
                $text = $matches[2];
                $arr[$interpretation_id][$book][$chapter - 1][$verse] = $text;
//echo 'verse='.$verse.'('.$text.')';
            }
        }
    }
}
//echo '<pre>';print_r($arr);echo '</pre>';
$htm_files = [];
$interpretation_id = 2;
$interpretation[$interpretation_id] = 'Tolkovanie_A_P_Lopukhina';
$htm_files[0] = '1Co.htm';
$htm_files[1] = '1Jn.htm';
$htm_files[2] = '1Ki.htm';
$htm_files[3] = '1Ma.htm';
$htm_files[4] = '1Par.htm';
$htm_files[5] = '1Pe.htm';
$htm_files[6] = '1Sa.htm';
$htm_files[7] = '1The.htm';
$htm_files[8] = '1Ti.htm';
$htm_files[9] = '2Co.htm';
$htm_files[10] = '2Jn.htm';
$htm_files[11] = '2Ki.htm';
$htm_files[12] = '2Ma.htm';
$htm_files[13] = '2Par.htm';
$htm_files[14] = '2Pe.htm';
$htm_files[15] = '2Sa.htm';
$htm_files[16] = '2The.htm';
$htm_files[17] = '2Ti.htm';
$htm_files[18] = '3Jn.htm';
$htm_files[19] = '3Ma.htm';
$htm_files[20] = 'Act.htm';
$htm_files[21] = 'Amo.htm';
$htm_files[22] = 'Dan.htm';
$htm_files[23] = 'Deut.htm';
$htm_files[24] = 'Ecc.htm';
$htm_files[25] = 'Eccl.htm';
$htm_files[26] = 'Eph.htm';
$htm_files[27] = 'Est.htm';
$htm_files[28] = 'Exod.htm';
$htm_files[29] = 'Eze.htm';
$htm_files[30] = 'Ezr.htm';
$htm_files[31] = 'Ga.htm';
$htm_files[32] = 'Gen.htm';
$htm_files[14] = 'Hab.htm';
$htm_files[33] = 'Heb.htm';
$htm_files[34] = 'Hos.htm';
$htm_files[35] = 'Is.htm';
$htm_files[36] = 'Ja.htm';
$htm_files[37] = 'Jd.htm';
$htm_files[38] = 'Jdg.htm';
$htm_files[39] = 'Jer.htm';
$htm_files[40] = 'Jn.htm';
$htm_files[41] = 'Job.htm';
$htm_files[42] = 'Joel.htm';
$htm_files[43] = 'Jonah.htm';
$htm_files[44] = 'Josh.htm';
$htm_files[45] = 'Lam.htm';
$htm_files[46] = 'Lev.htm';
$htm_files[47] = 'Lk.htm';
$htm_files[48] = 'Mal.htm';
$htm_files[49] = 'Mic.htm';
$htm_files[50] = 'Mk.htm';
$htm_files[51] = 'Mt.htm';
$htm_files[52] = 'Nah.htm';
$htm_files[53] = 'Neh.htm';
$htm_files[54] = 'Num.htm';
$htm_files[55] = 'Obad.htm';
$htm_files[56] = 'Phm.htm';
$htm_files[57] = 'Php.htm';
$htm_files[58] = 'Prov.htm';
$htm_files[59] = 'Ps.htm';
$htm_files[60] = 'Re.htm';
$htm_files[61] = 'Ro.htm';
$htm_files[62] = 'Ruth.htm';
$htm_files[63] = 'Son.htm';
$htm_files[64] = 'Tit.htm';
$htm_files[65] = 'Zec.htm';
$htm_files[66] = 'Zep.htm';

$continue = false;
foreach ($htm_files as $book => $htm_file) {
    $filename = "Tolkovanie_A_P_Lopukhina/$htm_file";
//$filename = "Tolkovanie_A_P_Lopukhina/Ruth.htm";
    $lines = file($filename);
    $chapter = 0;
    foreach ($lines as $idx => $line) {
        $line = iconv('Windows-1251', 'UTF-8', $line);
        if (preg_match('/<h2>([\d]+)/', $line, $matches)||preg_match('/<h2>([А-Яа-я\s]*)/', $line, $matches)) {

//trim($matches[1]);
//echo "<br>$book=$chapter=".$matches[1];
            $chapter++;
            $continue = true;
            $verse = 0;
            continue;
        }
        if ($continue && $chapter > 0) {
            if (preg_match('/<p>(\d+)-(\d+)(.\s+)(.*)/', $line, $matches)) {
                $verse1 = $matches[1];
                $verse2 = $matches[2];
                $text = $matches[4];
                foreach (range($verse1, $verse2) as $number) {
                    $arr[$interpretation_id][$book][$chapter - 1][$number] = $text;
                }
//echo 'verse12='.$verse1.'-'.$verse2.'('.$text.')';
            } else if (preg_match('/<p>(\d+)(.\s+)(.*)/', $line, $matches)) {
                $verse = $matches[1];
                $text = $matches[3];
                $arr[$interpretation_id][$book][$chapter - 1][$verse] = $text;
//echo 'verse='.$verse.'('.$text.')';
            }
            else if (preg_match('/<p>(\d+)–(\d+) (.*)/', $line, $matches)) {
                $verse1 = $matches[1];
                $verse2 = $matches[2];
                $text = $matches[3];
                foreach (range($verse1, $verse2) as $number) {
                    $arr[$interpretation_id][$book][$chapter - 1][$number] = $text;
                }
//echo 'verse12='.$verse1.'-'.$verse2.'('.$text.')';
            } else if (preg_match('/<p>(\d+)-(\d+) (.*)/', $line, $matches)) {
                $verse1 = $matches[1];
                $verse2 = $matches[2];
                $text = $matches[3];
                foreach (range($verse1, $verse2) as $number) {
                    $arr[$interpretation_id][$book][$chapter - 1][$number] = $text;
                }
//echo 'verse12='.$verse1.'-'.$verse2.'('.$text.')';
            } else if (preg_match('/<p>(\d+) (.*)/', $line, $matches)) {
                $verse = $matches[1];
                $text = $matches[2];
                $arr[$interpretation_id][$book][$chapter - 1][$verse] = $text;
//echo 'verse='.$verse.'('.$text.')';
            }
        }
    }
}

//echo '<pre>';print_r($arr);echo '</pre>';
$htm_files = [];
$interpretation_id = 3;
$interpretation[$interpretation_id] = 'Efrem_Sirin';
$htm_files[0] = '1Co.htm';
$htm_files[1] = '1The.htm';
$htm_files[2] = '1Ti.htm';
$htm_files[3] = '2Co.htm';
$htm_files[4] = '2The.htm';
$htm_files[5] = '2Ti.htm';
$htm_files[6] = 'Am.htm';
$htm_files[7] = 'Col.htm';
$htm_files[8] = 'Dan.htm';
$htm_files[9] = 'De.htm';
$htm_files[10] = 'Eph.htm';
$htm_files[11] = 'Ex.htm';
$htm_files[12] = 'Ezek.htm';
$htm_files[13] = 'Ga.htm';
$htm_files[14] = 'Ge.htm';
$htm_files[15] = 'He.htm';
$htm_files[16] = 'Hos.htm';
$htm_files[17] = 'Is.htm';
$htm_files[18] = 'Jer.htm';
$htm_files[19] = 'Jl.htm';
$htm_files[20] = 'Lam.htm';
$htm_files[21] = 'Le.htm';
$htm_files[22] = 'Ma.htm';
$htm_files[23] = 'Mic.htm';
$htm_files[24] = 'Nu.htm';
$htm_files[25] = 'Ob.htm';
$htm_files[26] = 'Php.htm';
$htm_files[27] = 'Ro.htm';
$htm_files[28] = 'Tit.htm';
$htm_files[29] = 'Za.htm';

$continue = false;
foreach ($htm_files as $book => $htm_file) {
    $filename = "Efrem_Sirin/$htm_file";
    $lines = file($filename);
    $chapter = 1;
    foreach ($lines as $idx => $line) {
        $line = iconv('Windows-1251', 'UTF-8', $line);
        if (preg_match('/<h2>([А-Яа-я\s]*)/', $line, $matches)) {
//trim($matches[1]);
//echo "<br>$book=$chapter=".$matches[1];
            $chapter++;
            $continue = true;
            $verse = 0;
            continue;
        }
        if ($continue && $chapter > 1) {
                if (preg_match('/<p>(\d+)-(\d+) (.*)/', $line, $matches)) {
                $verse1 = $matches[1];
                $verse2 = $matches[2];
                $text = $matches[3];
                foreach (range($verse1, $verse2) as $number) {
                    $arr[$interpretation_id][$book][$chapter - 1][$number] = $text;
                }
//echo 'verse12='.$verse1.'-'.$verse2.'('.$text.')';
            } else if (preg_match('/<p>(\d+) (.*)/', $line, $matches)) {
                $verse = $matches[1];
                $text = $matches[2];
                $arr[$interpretation_id][$book][$chapter - 1][$verse] = $text;
//echo 'verse='.$verse.'('.$text.')';
            }
        }
    }
}
//echo '<pre>';print_r($arr);echo '</pre>';
$host = 'localhost'; // адрес сервера
//$database = "bible_test"; // имя базы данных
$database = "host1382121_bible"; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// выполняем операции с базой данных
echo "Connected successfully";
$sql = "truncate table interpretations";
if (mysqli_query($link, $sql)) {
    echo "truncated table";
}

foreach ($arr as $interpretation => $v1) {
    foreach ($v1 as $book => $v2) {
        foreach ($v2 as $chapter_id => $v3) {
            foreach ($v3 as $verse_id => $text) {
                $book_id = $book + 1;
                $text=str_replace("'", '"', $text);
//echo '<br>$interpretation_id='.$interpretation_id.'$book_id='.$book_id.'$chapter_id='.$chapter_id.'$verse_id'.$verse_id.'$text=('.$text.')';
                $sql = "INSERT INTO interpretations (avtor_id,book_id,chapter_id,verse_id,text) VALUES ('$interpretation', '$book_id', '$chapter_id','$verse_id','$text')";
                if (mysqli_query($link, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    $error_arr[$interpretation][$book][$chapter_id][$verse_id]="Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
        }
    }
}
// закрываем подключение
mysqli_close($link);

echo '<pre>';print_r($error_arr);echo '</pre>';

?>
