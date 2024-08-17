<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
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
            background-color: #fff;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="date"], textarea, select {
            display: block;
            width: 100%;
            padding: 10px;
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
    <h1>Edit Proyek</h1>
    <form action="<?= site_url('proyek/update') ?>" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($proyek->id, ENT_QUOTES, 'UTF-8') ?>">
        
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" id="namaProyek" name="namaProyek" value="<?= set_value('namaProyek', $proyek->namaProyek) ?>" required>
        
        <label for="client">Client:</label>
        <input type="text" id="client" name="client" value="<?= set_value('client', $proyek->client) ?>">
        
        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" id="tglMulai" name="tglMulai" value="<?= set_value('tglMulai', date('Y-m-d', strtotime($proyek->tglMulai))) ?>" required>
        
        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" id="tglSelesai" name="tglSelesai" value="<?= set_value('tglSelesai', date('Y-m-d', strtotime($proyek->tglSelesai))) ?>" required>
        
        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" id="pimpinanProyek" name="pimpinanProyek" value="<?= set_value('pimpinanProyek', $proyek->pimpinanProyek) ?>">
        
        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan"><?= set_value('keterangan', $proyek->keterangan) ?></textarea>
        
        <label for="locationId">Lokasi:</label>
        <select id="locationId" name="locationId" required>
            <option value="">--Pilih Lokasi--</option>
            <?php foreach ($lokasi_list as $lokasi_item): ?>
                <option value="<?= $lokasi_item->id ?>" <?= $lokasi_item->id == $lokasi->id ? 'selected' : '' ?>>
                    <?= $lokasi_item->namaLokasi ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Simpan</button>
    </form>
    <a href="<?= site_url('proyek') ?>">Kembali</a>
</body>
</html>
