<?php
// variabel json
$data = '{"nama":"Samudra","usia":22,"kota":"Semarang"}';

$obj = json_decode($data);

$arr = json_decode($data, true);

// nilai dari object
echo "Nama (objek): " . $obj->nama . "<br>";
echo "Usia (objek): " . $obj->usia . "<br>";
echo "Kota (objek): " . $obj->kota . "<br><br>";

// nilai dari array
echo "Nama (array): " . $arr["nama"] . "<br>";
echo "Usia (array): " . $arr["usia"] . "<br>";
echo "Kota (array): " . $arr["kota"] . "<br>";
?>