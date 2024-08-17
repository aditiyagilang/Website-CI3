<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek</title>
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
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="datetime-local"], textarea, select {
            display: block;
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Tambah Proyek</h1>
    <form action="<?= site_url('proyek/store') ?>" method="post">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" id="namaProyek" name="namaProyek" required>
        
        <label for="client">Client:</label>
        <input type="text" id="client" name="client">
        
        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="datetime-local" id="tglMulai" name="tglMulai" required>
        
        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="datetime-local" id="tglSelesai" name="tglSelesai" required>
        
        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" id="pimpinanProyek" name="pimpinanProyek">
        
        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan"></textarea>
        
        <label for="lokasiId">Pilih Lokasi:</label>
        <select id="lokasiId" name="lokasiId" required>
            <option value="">--Pilih Lokasi--</option>
            <?php foreach ($lokasi_list as $lokasi): ?>
                <option value="<?= $lokasi->id; ?>"><?= $lokasi->namaLokasi; ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Simpan</button>
    </form>
    <a href="<?= site_url('proyek') ?>">Kembali</a>
</body>
</html>
