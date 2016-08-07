<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan URL yang valid.',
    'after'                => 'Kolom :attribute harus berisi sebuah tanggal setelah :date.',
    'alpha'                => 'Kolom :attribute hanya dapat berisi karakter abjad.',
    'alpha_dash'           => 'Kolom :attribute hanya dapat berisi huruf, angka, dan tanda hubung.',
    'alpha_num'            => 'Kolom :attribute hanya dapat berisi alpha-numeric.',
    'array'                => 'Kolom :attribute harus berisi sebuah array.',
    'before'               => 'Kolom :attribute harus berisi sebuah tanggal sebelum :date.',
    'between'              => [
        'numeric' => 'Kolom :attribute harus memiliki nilai antara :min dan :max.',
        'file'    => 'Kolom :attribute harus memiliki ukuran antara :min dan :max kilobyte.',
        'string'  => 'Kolom :attribute harus memiliki panjang antara :min dan :max karakter.',
        'array'   => 'Kolom :attribute harus memiliki jumlah index antara :min dan :max item.',
    ],
    'boolean'              => 'Kolom :attribute harus bernilai benar atau salah.',
    'confirmed'            => 'Kolom :attribute konfirmasi tidak cocok.',
    'date'                 => 'Kolom :attribute bukan tanggal yang valid.',
    'date_format'          => 'Kolom :attribute tidak sesuai format :format.',
    'different'            => 'Kolom :attribute dan :other harus berbeda.',
    'digits'               => 'Kolom :attribute harus berisi :digits digit.',
    'digits_between'       => 'Kolom :attribute harus antara :min and :max digit.',
    'dimensions'           => 'Kolom :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'Kolom :attribute memiliki duplikat nilai.',
    'email'                => 'Kolom :attribute harus berisi alamat email yang valid.',
    'exists'               => 'Kolom :attribute yang dipilih tidak valid.',
    'filled'               => 'Kolom :attribute diisi.',
    'image'                => 'Kolom :attribute harus berisi sebuah gambar.',
    'in'                   => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array'             => 'Kolom :attribute tidak ada di :other.',
    'integer'              => 'Kolom :attribute harus berisi sebuah integer.',
    'ip'                   => 'Kolom :attribute harus berisi alamat IP yang valid.',
    'json'                 => 'Kolom :attribute harus berisi JSON string yang valid.',
    'max'                  => [
        'numeric' => 'Kolom :attribute tidak boleh lebih besar dari :max.',
        'file'    => 'Kolom :attribute tidak boleh lebih besar dari :max kilobyte.',
        'string'  => 'Kolom :attribute tidak boleh lebih besar dari :max karakter.',
        'array'   => 'Kolom :attribute tidak boleh lebih dari :max item.',
    ],
    'mimes'                => 'Kolom :attribute harus berisi sebuah file dari tipe: :values.',
    'min'                  => [
        'numeric' => 'Kolom :attribute harus memiliki nilai minimal :min.',
        'file'    => 'Kolom :attribute harus memiliki ukuran minimal :min kilobyte.',
        'string'  => 'Kolom :attribute harus memiliki panjang minimal :min karakter.',
        'array'   => 'Kolom :attribute harus memiliki minimal :min items.',
    ],
    'not_in'               => 'Kolom :attribute yang dipilih tidak valid.',
    'numeric'              => 'Kolom :attribute harus berisi angka.',
    'present'              => 'Kolom :attribute harus ada.',
    'regex'                => 'Kolom :attribute format tidak valid.',
    'required'             => 'Kolom :attribute harus diisi.',
    'required_if'          => 'Kolom :attribute harus diisi bila :other adalah :value.',
    'required_unless'      => 'Kolom :attribute harus diisi kecuali :other adalah in :values.',
    'required_with'        => 'Kolom :attribute harus diisi bila :values is present.',
    'required_with_all'    => 'Kolom :attribute harus diisi bila  :values is present.',
    'required_without'     => 'Kolom :attribute harus diisi bila  :values is not present.',
    'required_without_all' => 'Kolom :attribute harus diisi bila tidak ada :values are present.',
    'same'                 => 'Kolom :attribute dan :other harus sesuai.',
    'size'                 => [
        'numeric' => 'Kolom :attribute harus berisi :size.',
        'file'    => 'Kolom :attribute harus berisi :size kilobyte.',
        'string'  => 'Kolom :attribute harus berisi :size karakter.',
        'array'   => 'Kolom :attribute harus berisi :size items.',
    ],
    'string'               => 'Kolom :attribute harus berisi sebuah string.',
    'timezone'             => 'Kolom :attribute harus berisi zona valid.',
    'unique'               => 'Kolom :attribute sudah diambil.',
    'url'                  => 'Kolom :attribute format tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];