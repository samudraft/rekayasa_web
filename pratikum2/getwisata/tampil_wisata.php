<?php
function curl($url){
  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output=curl_exec($ch);
  curl_close($ch);
  return $output;
}

// alamat localhost
$send=curl("http://localhost/rekayasa_web/pratikum2/getwisata/json.php");

// mengubah JSON menjadi array
$data=json_decode($send, TRUE);

echo "<table width='500' border='1'>"; // Membuat tabel dengan lebar 300px dan border 1

// Membuat header tabel (ambil dari kunci pertama array)
echo "<thead>";
echo "<tr>";
if (!empty($data) && is_array($data)) {
    foreach (array_keys($data[0]) as $header) {
        echo "<th>" . $header . "</th>";
    }
} else {
    echo "<th>Data Tidak Tersedia</th>"; // Jika data kosong atau bukan array
}
echo "</tr>";
echo "</thead>";

// Mengisi data tabel
echo "<tbody>";
if (!empty($data) && is_array($data)) {
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row["id_wisata"] . "</td>";
        echo "<td>" . $row["kota"] . "</td>";
        echo "<td>" . $row["landmark"] . "</td>";
        echo "<td>" . $row["tarif"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='" . (count(array_keys($data[0])) ?: 1) . "'>Tidak ada data untuk ditampilkan.</td></tr>";
}
echo "</tbody>";

echo "</table>";
?>