<?php

function send_mail($penerima = '', $produk, $waktuambil, $pesan, $nama_donatur, $pemesan, $no_hp)
{
    $ch = curl_init();
    $post = [
        'penerima' => $penerima,
        'produk'    => $produk,
        'waktuambil' => $waktuambil,
        'pesan' => $pesan,
        'nama_donatur' => $nama_donatur,
        'pemesan' => $pemesan,
        'no_hp' => $no_hp
    ];

    curl_setopt($ch, CURLOPT_URL, "http://localhost/PelikPekat/service/PHPMailer/send.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        $post
    );

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);
}
