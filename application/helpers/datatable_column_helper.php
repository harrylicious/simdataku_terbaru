<?php

function actionUsaha($id)
{
    $form = form_open().
        '<div class="btn-group" role="group" aria-label="Basic example">
                 <a href="'.base_url('datausaha/detail/'.$id).'" class="btn btn-success btn-sm" title="Show">Detail</a>
                </div>'.
    form_close();

    return $form;
}

function action_profil($id)
{
    $form = form_open().
        '<div class="btn-group" role="group" aria-label="Basic example">
                 <a href="'.base_url('admin/detailusaha/detail/'.$id).'" class="btn btn-success btn-sm" title="Show">Detail</a>
                </div>'.
    form_close();

    return $form;
}


function actionUmkm($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
             <a href="'.base_url('admin/usaha/print/'.$id).'" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i></a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
             <a href="'.base_url('admin/detailusaha/detail/'.$id).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
             <a href="'.base_url('admin/usaha/edit/'.$id).'" class="btn btn-success btn-sm" title="Show">Edit</a>
            
    </div>

    <div class="btn-group" role="group" aria-label="Basic example">
             <a href="'.base_url('admin/usaha/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();

    return $form;

}

function action_usaha_kabupaten($kabupaten)
{
    return '<a href="'.base_url('admin/usaha?kabupaten='.$kabupaten).'" class="btn btn-sm btn-primary">Lihat Daftar</a>';
}

function action_usaha_kecamatan($kecamatan)
{
    return '<a href="'.base_url('admin/usaha?kecamatan='.$kecamatan).'" class="btn btn-sm btn-primary">Lihat Daftar</a>';
}


function action_usaha_desa($desa)
{
    return '<a href="'.base_url('admin/usaha?desa='.$desa).'" class="btn btn-sm btn-primary">Lihat Daftar</a>';
}


function action_produk($id)
{
    $form = form_open(base_url('admin/produk/delete/'.$id), 'onsubmit="return confirm(\'Hapus produk?\')"').
                '<div class="btn-group" role="group" aria-label="Basic example">
                    <a href="'.base_url('admin/produk/edit/'.$id).'" class="btn btn-success btn-sm" title="Show"> Edit</a>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i> Hapus</button>
                </div>'.
            form_close();

return $form;

}

function action_legalitas($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="edit_legalitas('."'".$id."'".')"><i class=" fa fa-pencil"></i>Edit </a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/legalitas/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();

return $form;

}

function action_kategori($id){
    
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="edit_kategori('."'".$id."'".')"><i class=" fa fa-pencil"></i>Edit </a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/kategoriusaha/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();


    return $form;

}


function action_sub_kategori($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="edit_kategori('."'".$id."'".')"><i class=" fa fa-pencil"></i>Edit </a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/kategoriusaha/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();

return $form;

}
function action_bantuan($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="edit_bantuan('."'".$id."'".')"><i class=" fa fa-pencil"></i>Edit </a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/bantuan/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();

return $form;

}

function photo_produk($photo)
{
    $form = '<img src="'.base_url('assets/images/products/thumbnail/'.$photo).'" onerror="this.src=\''.base_url('assets/images/no-image.jpg').'\'" class="img-thumbnail" width="90px"/>';

 return $form;
}

function photo_insight($photo)
{
    $form = '<img src="'.base_url('assets/images/insight/'.$photo).'" onerror="this.src=\''.base_url('assets/images/no-image.jpg').'\'" class="img-thumbnail" width="90px"/>';

 return $form;
}


function format_rupiah($angka)
{
    $harga_rp = "Rp".number_format($angka,0,".",".");

    return $harga_rp;
}
function action_kategori_insight($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="edit_kategori_insight('."'".$id."'".')"><i class="fa fa-pencil"></i>Edit </a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/kategoriinsight/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();


    return $form;
}

function action_insight($id)
{
    $form = form_open().
    '<div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/insight/edit_insight/'.$id).'" class="btn btn-success btn-sm" title="Show"> Edit</a>
            
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="'.base_url('admin/insight/delete/'.$id).'" class="btn btn-danger btn-sm" title="Show"><i class="fa fa-trash"></i>Hapus</a>
            
    </div>'.
    form_close();


    return $form;
}

function tahunBerdiri($tahun)
{
    return $tahun == 0 ? '-' : $tahun;
}