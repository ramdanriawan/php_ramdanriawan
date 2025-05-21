<form action="soal2d.php">
    <input type="hidden" name="nama" value="<?php echo $_GET['nama']; ?>">
    <input type="hidden" name="umur" value="<?php echo $_GET['umur']; ?>">

    Hobi anda: <input type="text" required name="hobi" minlength="3" max="30"> <p></p>

    <button style="display: inline-block; margin-left: 40px;" type="submit">Submit</button>
</form>