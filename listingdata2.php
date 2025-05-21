<?php
// Koneksi
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'testdb';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ada input pencarian
$searchNama = isset($_GET['searchNama']) ? $conn->real_escape_string($_GET['searchNama']) : '';
$searchAlamat = isset($_GET['searchAlamat']) ? $conn->real_escape_string($_GET['searchAlamat']) : '';
$searchHobi = isset($_GET['searchHobi']) ? $conn->real_escape_string($_GET['searchHobi']) : '';

// Query pencarian
if ($searchNama !== '' || $searchAlamat !== '' || $searchHobi !== '') {
    $sql = "SELECT pe.nama, pe.alamat, ho.hobi FROM person pe join hobi ho on pe.id = ho.person_id WHERE pe.nama LIKE '%$searchNama%' and pe.alamat LIKE '%$searchAlamat%' and ho.hobi LIKE '%$searchHobi%'";
//    die($sql);
} else {
    $sql = "SELECT pe.nama, pe.alamat, ho.hobi FROM person pe join hobi ho on pe.id = ho.person_id";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Users</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }

        input[type="text"] {
            padding: 6px;
            width: 300px;
        }

        button {
            padding: 6px 10px;
        }
    </style>
</head>
<body>

<h2>Daftar Users</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php $no = 1;
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['hobi']) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Tidak ada data ditemukan.</td>
        </tr>
    <?php endif; ?>
</table>

<p></p>

<form method="GET" action="">
    <input type="text" name="searchNama" placeholder="Cari nama" value="<?= htmlspecialchars($searchNama) ?>"><p>
    <input type="text" name="searchAlamat" placeholder="Cari alamat" value="<?= htmlspecialchars($searchAlamat) ?>"><p>
    <input type="text" name="searchHobi" placeholder="Cari hobi" value="<?= htmlspecialchars($searchHobi) ?>"><p>
    <button type="submit">Cari</button>
</form>

</body>
</html>
