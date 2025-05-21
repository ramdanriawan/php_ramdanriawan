<style>
    table {
        border-collapse: collapse;
        /*width: 100%;*/
    }

    td {
        border-bottom: 1px solid #ccc; /* garis bawah */
        padding: 8px;
    }

    tr:last-child td {
        border-bottom: none; /* hilangkan garis di baris terakhir */
    }

</style>

<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";

for ($a = $jml; $a > 0; $a--) {

    $total1 = 0;
    for ($i = $a; $i > 0; $i--) {
        $total1 += $i;
    }

    echo "<tr>\n";

    echo "<td colspan='$jml'> Total: " . $total1 . "</td>\n";

    echo "</tr>\n";


    echo "<tr>\n";

    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}
echo "</table>";

?>