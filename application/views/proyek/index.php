<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
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
    <h1>Daftar Proyek</h1>
    <div class="button-container">
        <a href="<?= site_url('proyek/create') ?>">Tambah Proyek</a>
        <a href="<?= site_url('lokasi') ?>" class="secondary">Data Lokasi</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Client</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Pimpinan Proyek</th>
                <th>Keterangan</th>
                <th>Nama Lokasi</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Negara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($proyek)): ?>
                <?php foreach ($proyek as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item->proyek->id) ?></td>
                        <td><?= htmlspecialchars($item->proyek->namaProyek) ?></td>
                        <td><?= htmlspecialchars($item->proyek->client) ?></td>
                        <td><?= htmlspecialchars($item->proyek->tglMulai) ?></td>
                        <td><?= htmlspecialchars($item->proyek->tglSelesai) ?></td>
                        <td><?= htmlspecialchars($item->proyek->pimpinanProyek) ?></td>
                        <td><?= htmlspecialchars($item->proyek->keterangan) ?></td>
                        <td><?= htmlspecialchars($item->lokasi->namaLokasi) ?></td>
                        <td><?= htmlspecialchars($item->lokasi->kota) ?></td>
                        <td><?= htmlspecialchars($item->lokasi->provinsi) ?></td>
                        <td><?= htmlspecialchars($item->lokasi->negara) ?></td>
                        <td>
                            <a href="<?= site_url('proyek/edit/'.$item->proyek->id . '/'.$item->lokasi->id ) ?>">Edit</a>
                            <a href="<?= site_url('proyek/delete/'.$item->proyek->id) ?>" onclick="return confirm('Hapus proyek ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="12">Tidak ada proyek tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
