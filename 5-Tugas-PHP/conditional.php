<?php

    echo "<h3>Soal No 1 Conditional if else</h3>";

    /*

        If-else

        Petunjuk : Kita akan memasuki dunia game werewolf. Pada saat akan bermain

        kamu diminta memasukkan nama dan peran . Untuk memulai game pemain harus

        memasukkan variable nama dan peran. Jika pemain tidak memasukkan nama maka

        game akan mengeluarkan warning "Nama harus diisi!". Jika pemain memasukkan

        nama tapi tidak memasukkan peran maka game akan mengeluarkan warning "Pilih

        Peranmu untuk memulai game". Terdapat tiga peran yaitu penyihir, guard, dan

        werewolf. Tugas kamu adalah membuat program untuk mengecek input dari pemain

        dan hasil response dari game sesuai input yang dikirimkan.

        Aturan Main

        Output untuk Input nama = '' dan peran = ''

        "Nama harus diisi!"

       

        Output untuk Input nama = 'John' dan peran = ''

        "Halo John, Pilih peranmu untuk memulai game!"

       

        //Output untuk Input nama = 'Jane' dan peran 'penyihir'

        "Selamat datang di Dunia Werewolf, Jane"

        "Halo Penyihir Jane, kamu dapat melihat siapa yang menjadi werewolf!"

       

        //Output untuk Input nama = 'Jenita' dan peran 'guard'

        "Selamat datang di Dunia Werewolf, Jenita"

        "Halo Guard Jenita, kamu akan membantu melindungi temanmu dari serangan werewolf."

       

        //Output untuk Input nama = 'Junaedi' dan peran 'werewolf'

        "Selamat datang di Dunia Werewolf, Junaedi"

        "Halo Werewolf Junaedi, Kamu akan memakan mangsa setiap malam!"

    */


    function warewolfGame($name, $role){
        if($name != ""){
            if($role != ""){
                echo "Selamat datang di Dunia Werewolf, $name <br>";
                "Halo $role $name, kamu dapat melihat siapa yang menjadi werewolf! <br>";
            }else{
                echo "Halo $name, Pilih peranmu untuk memulai game! <br>";
            }
        }else{
            echo "Nama harus diisi! <br>";
        }
    }

    // Hapus komentar untuk menjalankan code!

    echo warewolfGame("", "");

    // Output : Nama harus diisi!

    echo warewolfGame("John", "");

    // Output : Halo John, Pilih peranmu untuk memulai game!

    echo warewolfGame("Jane", "penyihir");

    // Output :

    // "Selamat datang di Dunia Werewolf, Jane"

    // "Halo penyihir Jane, kamu dapat melihat siapa yang menjadi werewolf!"

    echo warewolfGame("Jenita", "guard");

    // Output :

    // "Selamat datang di Dunia Werewolf, Jenita"

    // "Halo guard Jenita, kamu akan membantu melindungi temanmu dari serangan werewolf."

    echo warewolfGame("junaedi", "warewolf");

    // Output :

    // "Selamat datang di Dunia Werewolf, Junaedi"

    // "Halo werewolf Junaedi, Kamu akan memakan mangsa setiap malam!"


    echo "<h3>Soal No 2 Switch Case </h3>";

    /*

       Soal No 2

       Kamu akan diberikan sebuah tanggal dalam tiga variabel,

       yaitu hari, bulan, dan tahun. Disini kamu diminta untuk membuat format tanggal.

       Misal tanggal yang diberikan adalah hari 1, bulan 5, dan tahun 1945. Maka,

       output yang harus kamu proses adalah menjadi 1 Mei 1945.

       Gunakan switch case untuk kasus ini!

    */

    function tanggal_lahir($hari, $bulan, $tahun){

        
            switch($bulan){
                case '1':
                    echo "$hari Januari $tahun <br>";
                    break;
                case '2':
                    echo "$hari Februari $tahun <br>";
                    break;
                case '3':
                    echo "$hari Maret $tahun <br>";
                    break;
                case '4':
                    echo "$hari April $tahun <br>";
                    break;
                case '5':
                    echo "$hari Mei $tahun <br>";
                    break;
                case '6':
                    echo "$hari Juni $tahun <br>";
                    break;
                case '7':
                    echo "$hari Juli $tahun <br>";
                    break;
                case '8':
                    echo "$hari Agustus $tahun <br>";
                    break;
                case '9':
                    echo "$hari September $tahun <br>";
                    break;
                case '10':
                    echo "$hari Oktober $tahun <br>";
                    break;
                case '11':
                    echo "$hari November $tahun <br>";
                    break;
                case '12':
                    echo "$hari Desember $tahun <br>";
                    break;
            }
    }

    echo tanggal_lahir(25,1,1996); // 25 Januari 1996

    echo tanggal_lahir(7,2,2000); // 7 Februari 2000

    echo tanggal_lahir(3,3,2003); // 3 Maret 2003

    echo tanggal_lahir(8,4,1956); // 8 April 1956

    echo tanggal_lahir(15,5,1978); // 15 Mai 1978

    echo tanggal_lahir(22,6,2013); // 22 Juni 2013

    echo tanggal_lahir(28,7,2004); // 28 Juli 2004

    echo tanggal_lahir(17,8,1945); // 17 Agustus 1945

    echo tanggal_lahir(1,9,2022); // 1 September 2022

    echo tanggal_lahir(12,10,2002); // 12 Oktober 2002

    echo tanggal_lahir(18,11,2018); // 18 November 2018

    echo tanggal_lahir(9,12,1994); // 9 Desember 1996

?>