<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .button-container {
            margin-bottom: 20px;
        }
        .button-container a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 16px;
            display: inline-block;
        }
        .button-container a.secondary {
            background-color: #28a745;
        }
        .button-container a:hover {
            opacity: 0.9;
        }
        .button-container a.secondary:hover {
            opacity: 0.9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Lokasi</h1>
    <div class="button-container">
        <a href="<?= site_url('lokasi/create') ?>">Tambah Lokasi</a>
        <a href="<?= site_url('proyek') ?>" class="secondary">Data Proyek</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Negara</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lokasi)): ?>
                <?php foreach ($lokasi as $l): ?>
                    <tr>
                        <td><?= htmlspecialchars($l->id) ?></td>
                        <td><?= htmlspecialchars($l->namaLokasi) ?></td>
                        <td><?= htmlspecialchars($l->negara) ?></td>
                        <td><?= htmlspecialchars($l->provinsi) ?></td>
                        <td><?= htmlspecialchars($l->kota) ?></td>
                        <td><?= htmlspecialchars($l->createdAt) ?></td>
                        <td>
                            <a href="<?= site_url('lokasi/edit/'.$l->id) ?>">Edit</a>
                            <a href="<?= site_url('lokasi/delete/'.$l->id) ?>" onclick="return confirm('Hapus lokasi ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Tidak ada lokasi tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
