<?php

// Ngatur Jam
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i");

session_start();
//kondisi kegiatan Andi
$isPulang = false;
$isBumbu = true;
$isChat = false;
$isNgobrol = false;
$isBobok = false;

if ($jam >= "15:30" && $jam < "15:45") {
    if ($isPulang) {
        $kegiatan = "Pulang ke rumah";
    } else {
        $kegiatan = "Kecelakaan";
    }
} elseif ($jam >= "15:45" && $jam < "16:00") {
    $kegiatan = "Mandi";
} elseif ($jam >= "16:00" && $jam < "16:30") {
    $kegiatan = "Mengaji";
} elseif ($jam >= "16:30" && $jam < "16:45") {
    if ($isBumbu) {
        $kegiatan = "Membeli Bumbu Masakan";
    } else {
        $kegiatan = "Mabar Sama Temen";
    }
} elseif ($jam >= "16:45" && $jam < "17:15") {
    $kegiatan = "Menghafalkan Dialog";
} elseif ($jam >= "17:15" && $jam < "17:45") {
    $kegiatan = "Waktu Luang";
} elseif ($jam >= "17:45" && $jam < "18:00") {
    $kegiatan = "Sholat Maghrib";
} elseif ($jam >= "18:00" && $jam < "18:20") {
    $kegiatan = "Makan Malam";
} elseif ($jam >= "18:20" && $jam < "18:30") {
    $kegiatan = "Sholat Isya";
} elseif ($jam >= "18:30" && $jam < "19:00") {
    if ($isChat) {
        $kegiatan = "Chatting Persiapan Festival";
    } else {
        $kegiatan = "Festival Udah Lewat";
    }
} elseif ($jam >= "19:00" && $jam < "21:00") {
    $kegiatan = "Mengerjakan Tugas Sekolah";
} elseif ($jam >= "21:00" && $jam < "21:30") {
    if ($isNgobrol) {
        $kegiatan = "Mengobrol Bersama Keluarga";
    } else {
        $kegiatan = "Lagi Ndak Mau Ngobrol";
    }
} elseif ($jam >= "21:30" && $jam < "22:00") {
    $kegiatan = "Waktu Luang";
} elseif ($jam >= "22:00" || $jam < "04:00") {
    if ($isBobok) {
        $kegiatan = "Tidur Nyenyak";
    } else {
        $kegiatan = "Begadang";
    }
} else {
    $kegiatan = "Masih Sekolah";
}

$startTime = strtotime("15:30");
$tasks = [
    ["name" => "Pulang ke rumah", "start" => "15:30", "duration" => 15],
    ["name" => "Mandi", "start" => "15:45", "duration" => 15],
    ["name" => "Mengaji", "start" => "16:00", "duration" => 30],
    ["name" => "Membeli bumbu masakan", "start" => "16:30", "duration" => 15],
    ["name" => "Menghafalkan Dialog", "start" => "16:45", "duration" => 30],
    ["name" => "Waktu Luang", "start" => "17:15", "duration" => 30],
    ["name" => "Sholat Maghrib", "start" => "17:45", "duration" => 15],
    ["name" => "Makan Malam", "start" => "18:00", "duration" => 20],
    ["name" => "Sholat Isya", "start" => "18:20", "duration" => 10],
    ["name" => "Chatting Persiapan Festival", "start" => "18:30", "duration" => 30],
    ["name" => "Mengerjakan Tugas Sekolah", "start" => "19:00", "duration" => 120],
    ["name" => "Mengobrol Bersama Keluarga", "start" => "21:00", "duration" => 30],
    ["name" => "Waktu Luang", "start" => "21:30", "duration" => 30],
    ["name" => "Tidur", "start" => "22:00", "duration" => 360]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Harian Andi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Jadwal Harian Andi</h2>
<h3>Pada jam <?= $jam; ?>, kegiatan Andi adalah: <?= $kegiatan; ?></h3>
<table>
    <tr>
        <th>Waktu</th>
        <th>Kegiatan</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <?php $endTime = $startTime + ($task['duration'] * 60); ?>
        <tr>
            <td><?= date("H:i", $startTime) ?> - <?= date("H:i", $endTime) ?> (<?= $task['duration'] ?> menit)</td>
            <td><?= $task['name'] ?></td>
        </tr>
        <?php $startTime = $endTime; ?>
    <?php endforeach; ?>
</table>
</body>
</html>