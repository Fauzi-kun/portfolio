<?php

    echo "<h3>Soal No 1 Function Greating</h3>";

    /*

        Soal No 1

        Greetings

        Buatlah sebuah function greetings() yang menerima satu parameter berupa string.

        contoh: greetings("abduh");

        Output: "Halo Abduh, Selamat Datang di Sanbercode!"

    */

    // Code function di sini

    function greetings($string){
        echo "Halo $string, Selamat Datang di Sanbercode! <br>";
}

    // Hapus komentar untuk menjalankan code!

    echo greetings("Bagas"); // Halo Bagas, Selamat Datang di Sanbercode!

    echo greetings("Wahyu"); // Halo Wahyu, Selamat Datang di Sanbercode!

    echo greetings("budi"); // Halo budi, Selamat Datang di Sanbercode!

    echo greetings("ayu"); // Halo ayu, Selamat Datang di Sanbercode!


    echo "<h3>Soal No 2 Function Kalikan </h3>";

    /*

        Soal No 2

        Kalikan Nilai

        Buatlah sebuah function Kalikan() yang menerima 2 parameter berupa integer untuk nilai 1 dan nilai 2.

        contoh: kalikan(2, 3);

        Output: 6

    */

    function kalikan($num1, $num2){

        echo $num1 * $num2 . "<br>";

    }

    echo kalikan(2,3); // 9

    echo kalikan(5,5); // 25

    echo kalikan(7, 8); // 56

    echo kalikan(11, 56); // 616

?>