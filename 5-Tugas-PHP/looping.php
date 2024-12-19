<?php


    // Code disini

    echo "<h3>Soal No 1 Data Penduduk </h3>";

    /*

       Soal No 1

       Buatlah Looping dari array multimentinal assositif gunakan looping untuk

       menampilkan data

       nb: gunakan Foreach Looping

        Output:

        id : 001

        Nama : Budi

        Kota Kelahiran: Jakarta

        id : 002

        Nama : Ince

        Kota Kelahiran: NTT

        id : 003

        Nama : Rahman

        Kota Kelahiran: Solo

        id : 004

        Nama : Asep

        Kota Kelahiran: Bandung

        id : 005

        Nama : Made

        Kota Kelahiran: Bali

        id : 006

        Nama : Ari

        Kota Kelahiran: Surabaya

        id : 006

        Nama : Indra

        Kota Kelahiran: Medan

    */

   

    $dataPenduduk = [

        ["id" => "001", "nama" => "Budi", "kota" => "Jakarta"],

        ["id" => "002", "nama" => "Ince", "kota" => "NTT"],

        ["id" => "003", "nama" => "Rahman", "kota" => "Solo"],

        ["id" => "004", "nama" => "Asep", "kota" => "Bandung"],

        ["id" => "005", "nama" => "Made", "kota" => "Bali"],

        ["id" => "006", "nama" => "Ari", "kota" => "Surabaya"],

        ["id" => "006", "nama" => "Indra", "kota" => "Medan"]

    ];

    foreach($dataPenduduk as $data){
        echo "id : " . $data['id'] . "<br>";
        echo "Nama : " . $data['nama'] . "<br>";
        echo "Kota Kelahiran : " . $data['kota'] . "<br>";
    }

?>