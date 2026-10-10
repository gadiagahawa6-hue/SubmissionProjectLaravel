
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Route simple
Route::get('/halo', function () {
    return 'Halo, selamat datang di Laravel 13!';
});

// 2. Route affichant la date et l'heure
Route::get('/waktu', function () {
    return now()->format('d-m-Y H:i:s');
});

// 3. Route avec un paramètre obligatoire
Route::get('/profil/{nama}', function ($nama) {
    return 'Nama saya ' . $nama;
});

// 4. Route avec un paramètre facultatif
Route::get('/kategori/{nama?}', function ($nama = 'Umum') {
    return 'Kategori: ' . $nama;
});

// 5. Route avec deux paramètres
Route::get('/kelas/{kode}/mahasiswa/{nim}', function ($kode, $nim) {
    return 'Kode kelas: ' . $kode . ' - NIM: ' . $nim;
});

// 6. Route avec un identifiant numérique
Route::get('/artikel/{id}', function ($id) {
    return 'ID artikel: ' . $id;
})->whereNumber('id');

// 7. Route avec un nom composé de lettres
Route::get('/pengguna/{username}', function ($username) {
    return 'Username: ' . $username;
})->whereAlpha('username');

// 8. Route avec un format de code précis
Route::get('/kode/{kode}', function ($kode) {
    return 'Kode: ' . $kode;
})->where('kode', '[A-Z]{3}[0-9]{2}');


 // 9. Halaman Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// 10. Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak', [
        'email' => 'info@kampus.ac.id'
    ]);
})->name('kontak');



 // 11. Groupes de routes Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Halaman Admin Dashboard';
    });

    Route::get('/pengaturan', function () {
        return 'Halaman Pengaturan Admin';
    });
});

// 12. Redirection Beranda
Route::redirect('/beranda', '/');

// 13. Halaman 404 khusus
Route::fallback(function () {
    return response(
        '404 - Halaman tidak ditemukan.',
        404
    );
});
