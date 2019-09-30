<?php
    $Holiday = array('2019-1-1' => "New Year's Day",
                '2019-2-5' => "Chinesse Lunar New Year's Daya",
                '2019-3-7' => "Bali's Day of Silence and Hindu New Year",
                '2019-4-3' => "Isra' Mi'raj",
                '2019-4-19' => "Good Friday",
                '2019-5-1' => "Labour Day",
                '2019-5-19' => "Waisak Day",
                '2019-5-30' => "Ascension Day of Jesus Christ",
                '2019-6-1' => "Pancasila Day",
                '2019-6-3' => "First Joint Holiday Before Idul FItri",
                '2019-6-4' => "Second Joint Holiday before Idul Fitri",
                '2019-6-5' => "Idul Fitri Day 1",
                '2019-6-6' => "Idul Fitri Day 2",
                '2019-6-7' => "Joint Holiday after Idul Fitri",
                '2019-8-11' => "Idul Adha", 
                '2019-8-17' => "Independence Day",
                '2019-9-1' => "Islamic New Year",
                '2019-11-9' => "The Prophet Muhammad's Birthday",
                '2019-12-24' => "Christmas Holiday",
                '2019-12-25' => "Christmas Day");
	//fungsi untuk cek hari libur dengan setiap tanggal dalam kalender
    function iscek ($data, $list)
    {
        $cek = false;
        foreach ($list as $key => $value) {
            // echo "$data ";
            if ($data == strtotime($key)) {
                $cek = true;
            }
        }
        return $cek;
    }
	//fungsi untuk menampilkan kalender pada tahun 2019
    function display_month($bulan,$tahun){
        global $Holiday;
        $Haripertamadalamsatubulan = mktime(0,0,0,$bulan,1,$tahun); 
        $Haripertamadalamsatuminggu = date('w',$Haripertamadalamsatubulan); //hari dalam kalender
        $Haridalambulan = date('t',$Haripertamadalamsatubulan); //berapa jumlah hari didalam 1 bulan
        $Namabulan = date('F',$Haripertamadalamsatubulan); //nama bulan
        $Hariini= date("d"); //default hari
        $Bulanini = date("m"); //default bulan
        $Tahunini = date("Y"); //default tahun
        $hari = 1; //variabel untuk hari

        echo "<h1>".date('F Y',$Haripertamadalamsatubulan)."</h1>"; //untuk menampilkan nama bulan dan tahun
        echo "<table>
            <tr>
                <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
            </tr>
            ";
            for ($i=0; $i < 6; $i++) { //baris
                if ($i==0 && $Haripertamadalamsatuminggu!=0) { //cek tanggal 1 dihariminggu atau tidak
                    echo "<tr><td colspan='$Haripertamadalamsatuminggu'>&nbsp;</td>";
                }else {
                    echo "<tr>";
                }
                for ($j=0; $j <= 6; $j++) { //kolom
                    $a = iscek(strtotime("$tahun-$bulan-$hari"),$Holiday); //cek hari libur
                    if ($i == 0 && $j< $Haripertamadalamsatuminggu) { //cek tanggal 1 dihariminggu atau tidak
                        echo "";
                    }elseif ($hari-1==$Haridalambulan) { //break, apakah jumlah hari dalam satu bulan sama dengan default kalender
                        break;
                    }elseif ($j==5) { // warna hari minggu
                        echo "<td style='background-color: red'>$hari</td>";
                        $hari++;
                    }elseif ($hari==$Hariini && $bulan==$Bulanini && $tahun==$Tahunini) { //warna hari ini
                        echo "<td style='background-color: yellow'>$hari</td>";
                        $hari++;
                    }elseif ($a) { //warna hari libur
                        echo "<td style='background-color: red'>$hari</td>";
                        $hari++;
                    }
                    else { //tampil tanggal
                        echo "<td>$hari</td>";
                        $hari++;
                    }
                }
                if ($hari-1==$Haridalambulan) { //break, apakah jumlah hari dalam satu bulan sama dengan default kalender
                    if ($j!=7) { 
                        $sisa = 7-$j; //untuk colspan sisa hari dalam 1 bulan
                        echo "<td colspan='$sisa'>&nbsp;</td>";
                    }
                    break;

                }
                echo "</tr>";
            }
        echo"</table>";
    }
 ?>
