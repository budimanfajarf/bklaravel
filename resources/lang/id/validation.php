<?php

return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */

    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang valid.',
    'after'                => ':attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berupa sebuah array.',
    'before'               => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
    'between'              => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file'    => 'Ukuran :attribute harus antara :min dan :max kilobytes.',
        'string'  => ':attribute harus antara :min dan :max karakter.',
        'array'   => ':attribute harus antara :min dan :max item.',
    ],
    'boolean'              => ':attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang valid.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus berupa angka :digits.',
    'digits_between'       => ':attribute harus antara angka :min dan :max.',
    'dimensions'           => ':attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'             => ':attribute memiliki nilai yang duplikat.',
    'email'                => ':attribute harus berupa alamat email yang valid.',
    'exists'               => ':attribute yang dipilih tidak valid.',
    'file'                 => ':attribute harus berupa sebuah berkas.',
    'filled'               => ':attribute harus memiliki nilai.',
    'gt'                   => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file'    => 'File :attribute harus lebih besar dari :value kilobytes.',
        'string'  => ':attribute harus lebih besar dari :value karakter.',
        'array'   => ':attribute harus lebih dari :value item.',
    ],
    'gte'                  => [
        'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
        'file'    => 'File :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string'  => ':attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array'   => ':attribute harus mempunyai :value item atau lebih.',
    ],
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => 'Bidang :attribute tidak terdapat dalam :other.',
    'integer'              => ':attribute harus merupakan bilangan bulat.',
    'ip'                   => ':attribute harus berupa alamat IP yang valid.',
    'ipv4'                 => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'                 => ':attribute harus berupa alamat IPv6 yang valid.',
    'json'                 => ':attribute harus berupa JSON string yang valid.',
    'lt'                   => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file'    => 'File :attribute harus kurang dari :value kilobytes.',
        'string'  => ':attribute harus kurang dari :value karakter.',
        'array'   => ':attribute harus kurang dari :value item.',
    ],
    'lte'                  => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file'    => 'File :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string'  => ':attribute harus kurang dari atau sama dengan :value karakter.',
        'array'   => ':attribute harus tidak lebih dari :value item.',
    ],
    'max'                  => [
        'numeric' => ':attribute seharusnya tidak lebih dari :max.',
        'file'    => 'File :attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => ':attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => ':attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => ':attribute harus dokumen berjenis : :values.',
    'mimetypes'            => ':attribute harus dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => ':attribute harus minimal :min.',
        'file'    => 'File :attribute harus minimal :min kilobytes.',
        'string'  => ':attribute harus minimal :min karakter.',
        'array'   => ':attribute harus minimal :min item.',
    ],
    'not_in'               => ':attribute yang dipilih tidak valid.',
    'not_regex'            => 'Format :attribute tidak valid.',
    'numeric'              => ':attribute harus berupa angka.',
    'present'              => 'Bidang :attribute harus ada.',
    'regex'                => 'Format :attribute tidak valid.',
    'required'             => ':attribute harus diisi.',
    'required_if'          => 'Bidang :attribute harus diisi bila :other adalah :value.',
    'required_unless'      => 'Bidang :attribute harus diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Bidang :attribute harus diisi bila terdapat :values.',
    'required_with_all'    => 'Bidang :attribute harus diisi bila terdapat :values.',
    'required_without'     => 'Bidang :attribute harus diisi bila tidak terdapat :values.',
    'required_without_all' => 'Bidang :attribute harus diisi bila tidak terdapat ada :values.',
    'same'                 => ':attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':attribute harus berukuran :size.',
        'file'    => 'File :attribute harus berukuran :size kilobyte.',
        'string'  => ':attribute harus berukuran :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus berupa zona waktu yang valid.',
    'unique'               => ':attribute sudah digunakan.',
    'uploaded'             => ':attribute gagal diupload.',
    'url'                  => 'Format  :attribute tidak valid.',

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
    | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
    | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'subservice_id' => [
            'required' => 'Kegiatan harus dipilih'
        ],       
        'service_id' => [
            'required' => 'Layanan harus dipilih'
        ],    
        'students.id.0' => [
            'required' => 'Minimal harus ada 1 Siswa'
        ]   
    ],

    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
    | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
    | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
    |
    */

    'attributes' => [
        'date' => 'Tanggal',
        'place' => 'Tempat',
        'desc' => 'Uraian',
        'info' => 'Keterangan',

        'name' => 'Nama',
        'code' => 'NIS',

        'level' => 'Tingkat',
        'program' => 'Jurusan',
        'room' => 'Ruangan',
    ],
];
