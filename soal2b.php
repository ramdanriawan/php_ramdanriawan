<form action="soal2c.php">
    <input type="hidden" name="nama" value="<?php echo $_GET['nama']; ?>">

    Umur anda: <input type="number" min="1" max="200" required name="umur"><p></p>

    <button style="display: inline-block; margin-left: 40px;" type="submit">Submit</button>
</form>