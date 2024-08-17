<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
        }
        form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Tambah Lokasi</h1>
    <form action="<?= site_url('lokasi/store') ?>" method="post">
        <label for="namaLokasi">Nama Lokasi:</label>
        <input type="text" id="namaLokasi" name="namaLokasi" required>
        
        <label for="negara">Negara:</label>
        <input type="text" id="negara" name="negara" required>
        
        <label for="provinsi">Provinsi:</label>
        <input type="text" id="provinsi" name="provinsi" required>
        
        <label for="kota">Kota:</label>
        <input type="text" id="kota" name="kota" required>
        
        <button type="submit">Simpan</button>
    </form>
    <a href="<?= site_url('lokasi') ?>">Kembali</a>
</body>
</html>
