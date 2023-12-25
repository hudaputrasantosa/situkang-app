<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Keahlian;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Auth;

//Jenis Tukang
Breadcrumbs::for('jenis-tukang', function (BreadcrumbTrail $trail) {
    $trail->push('Jenis Tukang', route('jenis-tukang'));
});
// Jenis Tukang > Tukang
Breadcrumbs::for('keahlian', function (BreadcrumbTrail $trail) {
    $trail->parent('jenis-tukang');
    $trail->push('', route('jenis-tukang'));
});

// Home
Breadcrumbs::for('pengalaman', function (BreadcrumbTrail $trail) {
    $trail->push('Pengalaman', route('tukang.pengalaman'));
});

// Home > Blog
Breadcrumbs::for('tambah-pengalaman', function (BreadcrumbTrail $trail) {
    $trail->parent('pengalaman');
    $trail->push('Tambah Pengalaman', route('tukang.pengalaman.tambah'));
});

Breadcrumbs::for('ubah-pengalaman', function (BreadcrumbTrail $trail) {
    $trail->parent('pengalaman');
    $trail->push('Ubah Pengalaman', route('tukang.pengalaman.tampil', Auth::user()->id));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//      $trail->parent('blog');
//      $trail->push($category->title, route('category', $category));
// });
