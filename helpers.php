<?php
function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp);

    if ($selisih < 60) return 'Baru saja';

    $kondisi = array(
        12 * 30 * 24 * 60 * 60  =>  'tahun',
        30 * 24 * 60 * 60       =>  'bulan',
        7 * 24 * 60 * 60        =>  'minggu',
        24 * 60 * 60            =>  'hari',
        60 * 60                 =>  'jam',
        60                      =>  'menit'
    );

    $hasil = array();
    foreach ($kondisi as $secs => $str) {
        $d = floor($selisih / $secs);
        if ($d >= 1) {
            $hasil[] = $d . ' ' . $str;
            $selisih -= $d * $secs;
        }
        // Berhenti jika sudah mendapatkan 2 satuan waktu (misal: bulan dan minggu)
        if (count($hasil) == 2) break; 
    }

    return implode(', ', $hasil) . ' yang lalu';
}
?>