<!DOCTYPE html>
<html>

<head>
    <title>Form Handling dan Form Validation</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    $nim = "22090135";
    $nama = "Dhiaz Raya Nugoroho";

    $nimErr = $namaErr = $emailErr = $alamatErr = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nim"])) {
            $nimErr = "* NIM wajib diisi";
        } else {
            $nim = test_input($_POST["nim"]);
        }

        if (empty($_POST["nama"])) {
            $namaErr = "* Nama wajib diisi";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "* Email wajib diisi";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST["alamat"])) {
            $alamatErr = "* Alamat wajib diisi";
        } else {
            $alamat = test_input($_POST["alamat"]);
        }
    }
    ?>

    <h2>Form Handling dan Form Validation</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error"><?php echo $nimErr; ?></span>
        <br><br>

        Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error"><?php echo $namaErr; ?></span>
        <br><br>

        Email: <input type="text" name="email">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        Alamat: <textarea name="alamat" rows="5" cols="40"></textarea>
        <span class="error"><?php echo $alamatErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Hasil:</h2>
    <?php
    echo "NIM: " . $nim . "<br>";
    echo "Nama: " . $nama . "<br>";
    echo "Email: " . $_POST["email"] . "<br>";
    echo "Alamat: " . $_POST["alamat"] . "<br>";
    ?>

</body>

</html>