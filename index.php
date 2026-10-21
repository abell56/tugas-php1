<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Ujian - Struktur Kendali & Form Processing</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #4a5568;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.2s;
        }

        input:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 6px;
        }

        button:hover {
            background-color: #2b6cb0;
        }

        .result-box {
            margin-top: 25px;
            padding: 20px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .result-box h3 {
            margin-bottom: 12px;
            color: #2d3748;
            font-size: 18px;
            border-bottom: 1px solid #edf2f7;
            padding-bottom: 8px;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .result-row .label {
            color: #718096;
            font-weight: 500;
        }

        .result-row .value {
            font-weight: 600;
            color: #2d3748;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-lulus {
            background-color: #c6f6d5;
            color: #22543d;
        }

        .badge-remedial {
            background-color: #fed7d7;
            color: #742a2a;
        }

        .alert-error {
            background-color: #fff5f5;
            color: #c53030;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #feb2b2;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Penilaian Ujian</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="nilai">Nilai Ujian (0 - 100)</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" step="any" required value="<?php echo isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : ''; ?>">
        </div>

        <button type="submit" name="submit">Proses Nilai</button>
    </form>

    <?php
    // Form processing: Mengecek apakah form sudah dikirimkan via metode POST
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        // Mengambil dan membersihkan input form
        $nama = htmlspecialchars(trim($_POST['nama']));
        $email = htmlspecialchars(trim($_POST['email']));
        $nilai = filter_input(INPUT_POST, 'nilai', FILTER_VALIDATE_FLOAT);

        if ($nilai === false || $nilai === null) {
            echo '<div class="alert-error">Nilai ujian tidak valid. Masukkan angka yang sesuai.</div>';
        } else {
            // Struktur kendali sesuai ketentuan:
            // Jika nilai ujian > 70, maka Lulus.
            // Jika nilai ujian < 70, maka Remedial (atau <= 70).
            if ($nilai > 70) {
                $status = "Lulus";
                $badgeClass = "badge-lulus";
            } else {
                $status = "Remedial";
                $badgeClass = "badge-remedial";
            }
            ?>
            <div class="result-box">
                <h3>Hasil Penilaian</h3>
                <div class="result-row">
                    <span class="label">Nama:</span>
                    <span class="value"><?php echo $nama; ?></span>
                </div>
                <div class="result-row">
                    <span class="label">Email:</span>
                    <span class="value"><?php echo $email; ?></span>
                </div>
                <div class="result-row">
                    <span class="label">Nilai Ujian:</span>
                    <span class="value"><?php echo $nilai; ?></span>
                </div>
                <div class="result-row">
                    <span class="label">Status:</span>
                    <span class="value"><span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span></span>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

</body>
</html>
