<?php

namespace Database\Seeders;
use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create( [
            'id'=>1,
            'nama_desa'=>'SEMELAGI BESAR',
            'kode_desa'=>6101072001,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>20.6,
            'luas_persen'=>15.9,
            'kepadatan_penduduk'=>249.32
            ] );
                        
            Desa::create( [
            'id'=>2,
            'nama_desa'=>'SUNGAI DAUN',
            'kode_desa'=>6101072002,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>20.9,
            'luas_persen'=>16.13,
            'kepadatan_penduduk'=>170.19
            ] );
                        
            Desa::create( [
            'id'=>3,
            'nama_desa'=>'SUNGAI RUSA',
            'kode_desa'=>6101072003,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12,
            'luas_persen'=>9.26,
            'kepadatan_penduduk'=>203.5
            ] );
                        
            Desa::create( [
            'id'=>4,
            'nama_desa'=>'PANGKALAN BEMBAN',
            'kode_desa'=>6101072013,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>6.4,
            'luas_persen'=>4.94,
            'kepadatan_penduduk'=>141.75
            ] );
                        
            Desa::create( [
            'id'=>5,
            'nama_desa'=>'SUNGAI NYIRIH',
            'kode_desa'=>6101072004,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>6,
            'luas_persen'=>4.63,
            'kepadatan_penduduk'=>598.17
            ] );
                        
            Desa::create( [
            'id'=>6,
            'nama_desa'=>'SUNGAI NYIRIH',
            'kode_desa'=>6101032009,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>6,
            'luas_persen'=>4.63,
            'kepadatan_penduduk'=>598.17
            ] );
                        
            Desa::create( [
            'id'=>7,
            'nama_desa'=>'KUALA',
            'kode_desa'=>6101072005,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>8.8,
            'luas_persen'=>6.79,
            'kepadatan_penduduk'=>241.36
            ] );
                        
            Desa::create( [
            'id'=>8,
            'nama_desa'=>'TWI MENTIBAR',
            'kode_desa'=>6101072007,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>17.8,
            'luas_persen'=>13.74,
            'kepadatan_penduduk'=>145.56
            ] );
                        
            Desa::create( [
            'id'=>9,
            'nama_desa'=>'BENTUNAI',
            'kode_desa'=>6101072008,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>16,
            'luas_persen'=>12.35,
            'kepadatan_penduduk'=>263.12
            ] );
                        
            Desa::create( [
            'id'=>10,
            'nama_desa'=>'PARIT KONGSI',
            'kode_desa'=>6101072014,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.29,
            'luas_persen'=>7.17,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>11,
            'nama_desa'=>'GAYUNG BERSAMBUT',
            'kode_desa'=>6101072015,
            'kecamatan'=>'SELAKAU',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0,
            'luas_persen'=>0,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>12,
            'nama_desa'=>'GELIK',
            'kode_desa'=>6101192001,
            'kecamatan'=>'SELAKAU TIMUR',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.79,
            'luas_persen'=>6.01,
            'kepadatan_penduduk'=>199
            ] );
                        
            Desa::create( [
            'id'=>13,
            'nama_desa'=>'SERANGGAM',
            'kode_desa'=>6101192002,
            'kecamatan'=>'SELAKAU TIMUR',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>32.6,
            'luas_persen'=>20.01,
            'kepadatan_penduduk'=>85
            ] );
                        
            Desa::create( [
            'id'=>14,
            'nama_desa'=>'SELAKAU TUA',
            'kode_desa'=>6101192003,
            'kecamatan'=>'SELAKAU TIMUR',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>43.41,
            'luas_persen'=>26.63,
            'kepadatan_penduduk'=>123
            ] );
                        
            Desa::create( [
            'id'=>15,
            'nama_desa'=>'BUDUK SEMPADANG',
            'kode_desa'=>6101192004,
            'kecamatan'=>'SELAKAU TIMUR',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>77.19,
            'luas_persen'=>47.35,
            'kepadatan_penduduk'=>15
            ] );
                        
            Desa::create( [
            'id'=>16,
            'nama_desa'=>'PERAPAKAN',
            'kode_desa'=>6101052013,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>17.5,
            'luas_persen'=>15.77,
            'kepadatan_penduduk'=>244
            ] );
                        
            Desa::create( [
            'id'=>17,
            'nama_desa'=>'JELUTUNG',
            'kode_desa'=>6101052005,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>20,
            'luas_persen'=>18.02,
            'kepadatan_penduduk'=>222
            ] );
                        
            Desa::create( [
            'id'=>18,
            'nama_desa'=>'HARAPAN',
            'kode_desa'=>6101052002,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>20,
            'luas_persen'=>18.02,
            'kepadatan_penduduk'=>670
            ] );
                        
            Desa::create( [
            'id'=>19,
            'nama_desa'=>'PENJAJAP',
            'kode_desa'=>6101052003,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4.5,
            'luas_persen'=>4.05,
            'kepadatan_penduduk'=>2692
            ] );
                        
            Desa::create( [
            'id'=>20,
            'nama_desa'=>'PEMANGKAT KOTA',
            'kode_desa'=>6101052001,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>49,
            'luas_persen'=>44.14,
            'kepadatan_penduduk'=>252
            ] );
                        
            Desa::create( [
            'id'=>21,
            'nama_desa'=>'SEBATUAN',
            'kode_desa'=>6101052016,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0,
            'luas_persen'=>0,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>22,
            'nama_desa'=>'GUGAH SEJAHTERA',
            'kode_desa'=>6101052017,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0,
            'luas_persen'=>0,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>23,
            'nama_desa'=>'LONAM',
            'kode_desa'=>6101052018,
            'kecamatan'=>'PEMANGKAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0,
            'luas_persen'=>0,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>24,
            'nama_desa'=>'SEBURING',
            'kode_desa'=>6101132005,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>20,
            'luas_persen'=>22.19,
            'kepadatan_penduduk'=>162
            ] );
                        
            Desa::create( [
            'id'=>25,
            'nama_desa'=>'SEPADU',
            'kode_desa'=>6101022011,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>12,
            'luas_persen'=>13.31,
            'kepadatan_penduduk'=>268
            ] );
                        
            Desa::create( [
            'id'=>26,
            'nama_desa'=>'SEPADU',
            'kode_desa'=>6101132004,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>12,
            'luas_persen'=>13.31,
            'kepadatan_penduduk'=>268
            ] );
                        
            Desa::create( [
            'id'=>27,
            'nama_desa'=>'SEPINGGAN',
            'kode_desa'=>6101132003,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>17.65,
            'luas_persen'=>19.58,
            'kepadatan_penduduk'=>268
            ] );
                        
            Desa::create( [
            'id'=>28,
            'nama_desa'=>'SEMPARUK',
            'kode_desa'=>6101132002,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>13,
            'luas_persen'=>14.42,
            'kepadatan_penduduk'=>533
            ] );
                        
            Desa::create( [
            'id'=>29,
            'nama_desa'=>'SINGARAYA',
            'kode_desa'=>6101132001,
            'kecamatan'=>'SEMPARUK',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>27.5,
            'luas_persen'=>30.5,
            'kepadatan_penduduk'=>244
            ] );
                        
            Desa::create( [
            'id'=>30,
            'nama_desa'=>'PARIT BARU',
            'kode_desa'=>6101072006,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>25,
            'luas_persen'=>30,
            'kepadatan_penduduk'=>187
            ] );
                        
            Desa::create( [
            'id'=>31,
            'nama_desa'=>'PARIT BARU',
            'kode_desa'=>6101182001,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>25,
            'luas_persen'=>30,
            'kepadatan_penduduk'=>187
            ] );
                        
            Desa::create( [
            'id'=>32,
            'nama_desa'=>'SALATIGA',
            'kode_desa'=>6101182005,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>29,
            'luas_persen'=>35,
            'kepadatan_penduduk'=>94
            ] );
                        
            Desa::create( [
            'id'=>33,
            'nama_desa'=>'SUNGAI TOMAN',
            'kode_desa'=>6101182002,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12,
            'luas_persen'=>15,
            'kepadatan_penduduk'=>219
            ] );
                        
            Desa::create( [
            'id'=>34,
            'nama_desa'=>'SERUMPUN',
            'kode_desa'=>6101182004,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>8.25,
            'luas_persen'=>10,
            'kepadatan_penduduk'=>320
            ] );
                        
            Desa::create( [
            'id'=>35,
            'nama_desa'=>'SERUNAI',
            'kode_desa'=>6101182003,
            'kecamatan'=>'SALATIGA',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>8.5,
            'luas_persen'=>10,
            'kepadatan_penduduk'=>316
            ] );
                        
            Desa::create( [
            'id'=>36,
            'nama_desa'=>'SERET AYON',
            'kode_desa'=>6101042023,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>66.64,
            'luas_persen'=>26.84,
            'kepadatan_penduduk'=>23
            ] );
                        
            Desa::create( [
            'id'=>37,
            'nama_desa'=>'MARIBAS',
            'kode_desa'=>6101042022,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>87.5,
            'luas_persen'=>22.12,
            'kepadatan_penduduk'=>11
            ] );
                        
            Desa::create( [
            'id'=>38,
            'nama_desa'=>'BATU MAKJAGE',
            'kode_desa'=>6101042016,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>21.34,
            'luas_persen'=>5.39,
            'kepadatan_penduduk'=>132
            ] );
                        
            Desa::create( [
            'id'=>39,
            'nama_desa'=>'BUKIT SEGOLER',
            'kode_desa'=>6101042018,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13,
            'luas_persen'=>3.29,
            'kepadatan_penduduk'=>193
            ] );
                        
            Desa::create( [
            'id'=>40,
            'nama_desa'=>'SERINDANG',
            'kode_desa'=>6101042017,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>10.02,
            'luas_persen'=>2.53,
            'kepadatan_penduduk'=>289
            ] );
                        
            Desa::create( [
            'id'=>41,
            'nama_desa'=>'MATANG LABUNG',
            'kode_desa'=>6101042019,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>15.2,
            'luas_persen'=>3.84,
            'kepadatan_penduduk'=>224
            ] );
                        
            Desa::create( [
            'id'=>42,
            'nama_desa'=>'MAK TANGGUK',
            'kode_desa'=>6101042020,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>6.27,
            'luas_persen'=>1.58,
            'kepadatan_penduduk'=>311
            ] );
                        
            Desa::create( [
            'id'=>43,
            'nama_desa'=>'SEGEDONG',
            'kode_desa'=>6101042011,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>6.3,
            'luas_persen'=>1.59,
            'kepadatan_penduduk'=>318
            ] );
                        
            Desa::create( [
            'id'=>44,
            'nama_desa'=>'PUSAKA',
            'kode_desa'=>6101042010,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>8.75,
            'luas_persen'=>2.21,
            'kepadatan_penduduk'=>267
            ] );
                        
            Desa::create( [
            'id'=>45,
            'nama_desa'=>'MENSERE',
            'kode_desa'=>6101042009,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>4.5,
            'luas_persen'=>1.14,
            'kepadatan_penduduk'=>709
            ] );
                        
            Desa::create( [
            'id'=>46,
            'nama_desa'=>'SUNGAI KELAMBU',
            'kode_desa'=>6101042012,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>5.1,
            'luas_persen'=>1.29,
            'kepadatan_penduduk'=>365
            ] );
                        
            Desa::create( [
            'id'=>47,
            'nama_desa'=>'SERUMPUN BULUH',
            'kode_desa'=>6101042013,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>5.6,
            'luas_persen'=>1.42,
            'kepadatan_penduduk'=>360
            ] );
                        
            Desa::create( [
            'id'=>48,
            'nama_desa'=>'PANGKALAN KONGSI',
            'kode_desa'=>6101042014,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>10.5,
            'luas_persen'=>2.65,
            'kepadatan_penduduk'=>366
            ] );
                        
            Desa::create( [
            'id'=>49,
            'nama_desa'=>'DUNGUN PERAPAKAN',
            'kode_desa'=>6101042015,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>6,
            'luas_persen'=>1.52,
            'kepadatan_penduduk'=>320
            ] );
                        
            Desa::create( [
            'id'=>50,
            'nama_desa'=>'TEBAS SUNGAI',
            'kode_desa'=>6101042002,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>20.3,
            'luas_persen'=>5.13,
            'kepadatan_penduduk'=>426
            ] );
                        
            Desa::create( [
            'id'=>51,
            'nama_desa'=>'SEJIRAM',
            'kode_desa'=>6101042006,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4.5,
            'luas_persen'=>1.14,
            'kepadatan_penduduk'=>363
            ] );
                        
            Desa::create( [
            'id'=>52,
            'nama_desa'=>'SEBERKAT',
            'kode_desa'=>6101042005,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>59.28,
            'luas_persen'=>14.98,
            'kepadatan_penduduk'=>34
            ] );
                        
            Desa::create( [
            'id'=>53,
            'nama_desa'=>'SEMPALAI',
            'kode_desa'=>6101042003,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>5.73,
            'luas_persen'=>1.45,
            'kepadatan_penduduk'=>373
            ] );
                        
            Desa::create( [
            'id'=>54,
            'nama_desa'=>'BEKUT',
            'kode_desa'=>6101042004,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>5.43,
            'luas_persen'=>1.37,
            'kepadatan_penduduk'=>560
            ] );
                        
            Desa::create( [
            'id'=>55,
            'nama_desa'=>'MAK RAMPAI',
            'kode_desa'=>6101042007,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>4.25,
            'luas_persen'=>1.07,
            'kepadatan_penduduk'=>832
            ] );
                        
            Desa::create( [
            'id'=>56,
            'nama_desa'=>'TEBAS KUALA',
            'kode_desa'=>6101042001,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>3.83,
            'luas_persen'=>0.97,
            'kepadatan_penduduk'=>1501
            ] );
                        
            Desa::create( [
            'id'=>57,
            'nama_desa'=>'MEKAR SEKUNTUM',
            'kode_desa'=>6101042008,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>7.88,
            'luas_persen'=>1.99,
            'kepadatan_penduduk'=>309
            ] );
                        
            Desa::create( [
            'id'=>58,
            'nama_desa'=>'MEKAR SEKUNTUM',
            'kode_desa'=>6101022030,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>7.88,
            'luas_persen'=>1.99,
            'kepadatan_penduduk'=>309
            ] );
                        
            Desa::create( [
            'id'=>59,
            'nama_desa'=>'SEGARAU PARIT',
            'kode_desa'=>6101042021,
            'kecamatan'=>'TEBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>17.74,
            'luas_persen'=>4.48,
            'kepadatan_penduduk'=>214
            ] );
                        
            Desa::create( [
            'id'=>60,
            'nama_desa'=>'SABING',
            'kode_desa'=>6101022032,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>16.5,
            'luas_persen'=>3.14,
            'kepadatan_penduduk'=>111
            ] );
                        
            Desa::create( [
            'id'=>61,
            'nama_desa'=>'MATANG SEGARAU',
            'kode_desa'=>6101122007,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>9.54,
            'luas_persen'=>11.47,
            'kepadatan_penduduk'=>121
            ] );
                        
            Desa::create( [
            'id'=>62,
            'nama_desa'=>'RAMBAYAN',
            'kode_desa'=>6101122005,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>10.94,
            'luas_persen'=>13.16,
            'kepadatan_penduduk'=>152
            ] );
                        
            Desa::create( [
            'id'=>63,
            'nama_desa'=>'SARI MAKMUR',
            'kode_desa'=>6101122004,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13.49,
            'luas_persen'=>16.22,
            'kepadatan_penduduk'=>82
            ] );
                        
            Desa::create( [
            'id'=>64,
            'nama_desa'=>'TEKARANG',
            'kode_desa'=>6101122001,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.25,
            'luas_persen'=>11.12,
            'kepadatan_penduduk'=>246
            ] );
                        
            Desa::create( [
            'id'=>65,
            'nama_desa'=>'SEMPADIAN',
            'kode_desa'=>6101122006,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>14.25,
            'luas_persen'=>17.14,
            'kepadatan_penduduk'=>228
            ] );
                        
            Desa::create( [
            'id'=>66,
            'nama_desa'=>'CEPALA',
            'kode_desa'=>6101122003,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>9,
            'luas_persen'=>10.82,
            'kepadatan_penduduk'=>265
            ] );
                        
            Desa::create( [
            'id'=>67,
            'nama_desa'=>'MERUBONG',
            'kode_desa'=>6101122002,
            'kecamatan'=>'TEKARANG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>16.69,
            'luas_persen'=>20.07,
            'kepadatan_penduduk'=>152
            ] );
                        
            Desa::create( [
            'id'=>68,
            'nama_desa'=>'SEI RAMBAH',
            'kode_desa'=>6101012015,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>23.2,
            'luas_persen'=>9.41,
            'kepadatan_penduduk'=>131
            ] );
                        
            Desa::create( [
            'id'=>69,
            'nama_desa'=>'GAPURA',
            'kode_desa'=>6101012023,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>27.26,
            'luas_persen'=>11.02,
            'kepadatan_penduduk'=>128
            ] );
                        
            Desa::create( [
            'id'=>70,
            'nama_desa'=>'KARTIASA',
            'kode_desa'=>6101012012,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>25,
            'luas_persen'=>10.14,
            'kepadatan_penduduk'=>196
            ] );
                        
            Desa::create( [
            'id'=>71,
            'nama_desa'=>'SAING RAMBI',
            'kode_desa'=>6101012013,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>8.1,
            'luas_persen'=>3.29,
            'kepadatan_penduduk'=>451
            ] );
                        
            Desa::create( [
            'id'=>72,
            'nama_desa'=>'LUMBANG',
            'kode_desa'=>6101012014,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>40,
            'luas_persen'=>16.22,
            'kepadatan_penduduk'=>110
            ] );
                        
            Desa::create( [
            'id'=>73,
            'nama_desa'=>'DURIAN',
            'kode_desa'=>6101012006,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>1.35,
            'luas_persen'=>0.55,
            'kepadatan_penduduk'=>1735
            ] );
                        
            Desa::create( [
            'id'=>74,
            'nama_desa'=>'PASAR MELAYU',
            'kode_desa'=>6101012005,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0.43,
            'luas_persen'=>0.17,
            'kepadatan_penduduk'=>3442
            ] );
                        
            Desa::create( [
            'id'=>75,
            'nama_desa'=>'PENDAWAN',
            'kode_desa'=>6101012004,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0.8,
            'luas_persen'=>0.32,
            'kepadatan_penduduk'=>3348
            ] );
                        
            Desa::create( [
            'id'=>76,
            'nama_desa'=>'TANJUNG BUGIS',
            'kode_desa'=>6101012003,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>0.48,
            'luas_persen'=>0.19,
            'kepadatan_penduduk'=>4042
            ] );
                        
            Desa::create( [
            'id'=>77,
            'nama_desa'=>'LUBUK DAGANG',
            'kode_desa'=>6101012002,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>28.75,
            'luas_persen'=>11.66,
            'kepadatan_penduduk'=>111
            ] );
                        
            Desa::create( [
            'id'=>78,
            'nama_desa'=>'DALAM KAUM',
            'kode_desa'=>6101012001,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>32,
            'luas_persen'=>12.98,
            'kepadatan_penduduk'=>114
            ] );
                        
            Desa::create( [
            'id'=>79,
            'nama_desa'=>'TANJUNG MEKAR',
            'kode_desa'=>6101012010,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>3.62,
            'luas_persen'=>1.47,
            'kepadatan_penduduk'=>452
            ] );
                        
            Desa::create( [
            'id'=>80,
            'nama_desa'=>'TUMUK MANGGIS',
            'kode_desa'=>6101012009,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>0.89,
            'luas_persen'=>0.36,
            'kepadatan_penduduk'=>2061
            ] );
                        
            Desa::create( [
            'id'=>81,
            'nama_desa'=>'JAGUR',
            'kode_desa'=>6101012008,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>2.2,
            'luas_persen'=>0.89,
            'kepadatan_penduduk'=>662
            ] );
                        
            Desa::create( [
            'id'=>82,
            'nama_desa'=>'LORONG',
            'kode_desa'=>6101012007,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>7.92,
            'luas_persen'=>3.21,
            'kepadatan_penduduk'=>404
            ] );
                        
            Desa::create( [
            'id'=>83,
            'nama_desa'=>'SEBAYAN',
            'kode_desa'=>6101012011,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>12.1,
            'luas_persen'=>4.91,
            'kepadatan_penduduk'=>198
            ] );
                        
            Desa::create( [
            'id'=>84,
            'nama_desa'=>'SUMBER HARAPAN',
            'kode_desa'=>6101012024,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>22.56,
            'luas_persen'=>9.15,
            'kepadatan_penduduk'=>117
            ] );
                        
            Desa::create( [
            'id'=>85,
            'nama_desa'=>'SEMANGAU',
            'kode_desa'=>6101012029,
            'kecamatan'=>'SAMBAS',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>10,
            'luas_persen'=>4.06,
            'kepadatan_penduduk'=>150
            ] );
                        
            Desa::create( [
            'id'=>86,
            'nama_desa'=>'TEBUAH ELOK',
            'kode_desa'=>6101102005,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>94.35,
            'luas_persen'=>14.64,
            'kepadatan_penduduk'=>14
            ] );
                        
            Desa::create( [
            'id'=>87,
            'nama_desa'=>'MENSADE',
            'kode_desa'=>6101102010,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13.99,
            'luas_persen'=>2.17,
            'kepadatan_penduduk'=>50
            ] );
                        
            Desa::create( [
            'id'=>88,
            'nama_desa'=>'SEI SAPAK',
            'kode_desa'=>6101102002,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>110.64,
            'luas_persen'=>17.17,
            'kepadatan_penduduk'=>17
            ] );
                        
            Desa::create( [
            'id'=>89,
            'nama_desa'=>'SEMPURNA',
            'kode_desa'=>6101102009,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>19.87,
            'luas_persen'=>3.08,
            'kepadatan_penduduk'=>133
            ] );
                        
            Desa::create( [
            'id'=>90,
            'nama_desa'=>'BUKIT MULYA',
            'kode_desa'=>6101102007,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>19.25,
            'luas_persen'=>2.99,
            'kepadatan_penduduk'=>135
            ] );
                        
            Desa::create( [
            'id'=>91,
            'nama_desa'=>'SEI DEDEN',
            'kode_desa'=>6101102006,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>20.25,
            'luas_persen'=>3.14,
            'kepadatan_penduduk'=>118
            ] );
                        
            Desa::create( [
            'id'=>92,
            'nama_desa'=>'SABUNG',
            'kode_desa'=>6101102004,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>102.76,
            'luas_persen'=>15.94,
            'kepadatan_penduduk'=>10
            ] );
                        
            Desa::create( [
            'id'=>93,
            'nama_desa'=>'MUKTI RAHARJA',
            'kode_desa'=>6101102008,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13.25,
            'luas_persen'=>2.06,
            'kepadatan_penduduk'=>105
            ] );
                        
            Desa::create( [
            'id'=>94,
            'nama_desa'=>'BALAI GEMURUH',
            'kode_desa'=>6101102001,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>124.8,
            'luas_persen'=>19.36,
            'kepadatan_penduduk'=>15
            ] );
                        
            Desa::create( [
            'id'=>95,
            'nama_desa'=>'MADAK',
            'kode_desa'=>6101102003,
            'kecamatan'=>'SUBAH',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>113.86,
            'luas_persen'=>17.67,
            'kepadatan_penduduk'=>13
            ] );
                        
            Desa::create( [
            'id'=>96,
            'nama_desa'=>'KARABAN JAYA',
            'kode_desa'=>6101102011,
            'kecamatan'=>'SUBAH',
            'status_desa'=>0,
            'prioritas_desa'=>0,
            'luas_desa'=>0,
            'luas_persen'=>0,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>97,
            'nama_desa'=>'SEBAWI',
            'kode_desa'=>6101152003,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>45,
            'luas_persen'=>27.86,
            'kepadatan_penduduk'=>64
            ] );
                        
            Desa::create( [
            'id'=>98,
            'nama_desa'=>'SEMPELAI SEBEDANG',
            'kode_desa'=>6101152006,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>32,
            'luas_persen'=>19.81,
            'kepadatan_penduduk'=>96
            ] );
                        
            Desa::create( [
            'id'=>99,
            'nama_desa'=>'SEPUK TANJUNG',
            'kode_desa'=>6101152004,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>17.15,
            'luas_persen'=>10.61,
            'kepadatan_penduduk'=>159
            ] );
                        
            Desa::create( [
            'id'=>100,
            'nama_desa'=>'SEBANGUN',
            'kode_desa'=>6101152005,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12.87,
            'luas_persen'=>7.97,
            'kepadatan_penduduk'=>142
            ] );
                        
            Desa::create( [
            'id'=>101,
            'nama_desa'=>'TEMPATAN',
            'kode_desa'=>6101152007,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.93,
            'luas_persen'=>6.15,
            'kepadatan_penduduk'=>230
            ] );
                        
            Desa::create( [
            'id'=>102,
            'nama_desa'=>'TEBING BATU',
            'kode_desa'=>6101152002,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>24.6,
            'luas_persen'=>15.23,
            'kepadatan_penduduk'=>87
            ] );
                        
            Desa::create( [
            'id'=>103,
            'nama_desa'=>'SEMANJANG',
            'kode_desa'=>6101152001,
            'kecamatan'=>'SEBAWI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>20,
            'luas_persen'=>12.38,
            'kepadatan_penduduk'=>91
            ] );
                        
            Desa::create( [
            'id'=>104,
            'nama_desa'=>'JIRAK',
            'kode_desa'=>6101142001,
            'kecamatan'=>'SAJAD',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>9,
            'luas_persen'=>9.48,
            'kepadatan_penduduk'=>266
            ] );
                        
            Desa::create( [
            'id'=>105,
            'nama_desa'=>'TENGGULI',
            'kode_desa'=>6101142002,
            'kecamatan'=>'SAJAD',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>9.6,
            'luas_persen'=>10.11,
            'kepadatan_penduduk'=>385
            ] );
                        
            Desa::create( [
            'id'=>106,
            'nama_desa'=>'MEKAR JAYA',
            'kode_desa'=>6101142003,
            'kecamatan'=>'SAJAD',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>36.31,
            'luas_persen'=>38.25,
            'kepadatan_penduduk'=>64
            ] );
                        
            Desa::create( [
            'id'=>107,
            'nama_desa'=>'BERINGIN',
            'kode_desa'=>6101142004,
            'kecamatan'=>'SAJAD',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>40.03,
            'luas_persen'=>42.16,
            'kepadatan_penduduk'=>49
            ] );
                        
            Desa::create( [
            'id'=>108,
            'nama_desa'=>'LAMBAU',
            'kode_desa'=>6101032021,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>7.25,
            'luas_persen'=>3.73,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>109,
            'nama_desa'=>'MUTUS DARUSSALAM',
            'kode_desa'=>6101032022,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12,
            'luas_persen'=>6.17,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>110,
            'nama_desa'=>'DUNGUN LAUT',
            'kode_desa'=>6101032011,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>8.5,
            'luas_persen'=>4.37,
            'kepadatan_penduduk'=>319
            ] );
                        
            Desa::create( [
            'id'=>111,
            'nama_desa'=>'SENTEBANG',
            'kode_desa'=>6101032010,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12.75,
            'luas_persen'=>6.56,
            'kepadatan_penduduk'=>434
            ] );
                        
            Desa::create( [
            'id'=>112,
            'nama_desa'=>'BAKAU',
            'kode_desa'=>6101032008,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>10,
            'luas_persen'=>5.14,
            'kepadatan_penduduk'=>300
            ] );
                        
            Desa::create( [
            'id'=>113,
            'nama_desa'=>'PARIT SETIA',
            'kode_desa'=>6101032007,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>10.8,
            'luas_persen'=>5.55,
            'kepadatan_penduduk'=>246
            ] );
                        
            Desa::create( [
            'id'=>114,
            'nama_desa'=>'PELIMPAAN',
            'kode_desa'=>6101032006,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>17.75,
            'luas_persen'=>9.13,
            'kepadatan_penduduk'=>158
            ] );
                        
            Desa::create( [
            'id'=>115,
            'nama_desa'=>'SARANG BURUNG KUALA',
            'kode_desa'=>6101032005,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>10.85,
            'luas_persen'=>5.58,
            'kepadatan_penduduk'=>238
            ] );
                        
            Desa::create( [
            'id'=>116,
            'nama_desa'=>'SARANG BURUNG USRAT',
            'kode_desa'=>6101032004,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>14.35,
            'luas_persen'=>7.38,
            'kepadatan_penduduk'=>204
            ] );
                        
            Desa::create( [
            'id'=>117,
            'nama_desa'=>'SARANG BURUNG KOLAM',
            'kode_desa'=>6101032003,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13.25,
            'luas_persen'=>6.81,
            'kepadatan_penduduk'=>156
            ] );
                        
            Desa::create( [
            'id'=>118,
            'nama_desa'=>'SEI NILAM',
            'kode_desa'=>6101032002,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>18.05,
            'luas_persen'=>9.28,
            'kepadatan_penduduk'=>105
            ] );
                        
            Desa::create( [
            'id'=>119,
            'nama_desa'=>'SARANG BURUNG DANAU',
            'kode_desa'=>6101032001,
            'kecamatan'=>'JAWAI',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>48.2,
            'luas_persen'=>24.78,
            'kepadatan_penduduk'=>90
            ] );
                        
            Desa::create( [
            'id'=>120,
            'nama_desa'=>'JAWAI LAUT',
            'kode_desa'=>6101162001,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>22.47,
            'luas_persen'=>24.03,
            'kepadatan_penduduk'=>103
            ] );
                        
            Desa::create( [
            'id'=>121,
            'nama_desa'=>'JELU AIR',
            'kode_desa'=>6101162002,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>18.51,
            'luas_persen'=>19.79,
            'kepadatan_penduduk'=>97
            ] );
                        
            Desa::create( [
            'id'=>122,
            'nama_desa'=>'SARILABA B',
            'kode_desa'=>6101162006,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4.47,
            'luas_persen'=>4.78,
            'kepadatan_penduduk'=>260
            ] );
                        
            Desa::create( [
            'id'=>123,
            'nama_desa'=>'SEMPERIUK B',
            'kode_desa'=>6101162008,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>6.42,
            'luas_persen'=>6.87,
            'kepadatan_penduduk'=>300
            ] );
                        
            Desa::create( [
            'id'=>124,
            'nama_desa'=>'SABARAN',
            'kode_desa'=>6101162009,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>22.2,
            'luas_persen'=>23.74,
            'kepadatan_penduduk'=>113
            ] );
                        
            Desa::create( [
            'id'=>125,
            'nama_desa'=>'SEMPERIUK A',
            'kode_desa'=>6101162007,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4.27,
            'luas_persen'=>4.57,
            'kepadatan_penduduk'=>369
            ] );
                        
            Desa::create( [
            'id'=>126,
            'nama_desa'=>'SARILABA A',
            'kode_desa'=>6101162005,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>5.52,
            'luas_persen'=>5.9,
            'kepadatan_penduduk'=>230
            ] );
                        
            Desa::create( [
            'id'=>127,
            'nama_desa'=>'MATANG TERAP',
            'kode_desa'=>6101162003,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>5.4,
            'luas_persen'=>5.77,
            'kepadatan_penduduk'=>789
            ] );
                        
            Desa::create( [
            'id'=>128,
            'nama_desa'=>'SUAH API',
            'kode_desa'=>6101162004,
            'kecamatan'=>'JAWAI SELATAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4.25,
            'luas_persen'=>4.54,
            'kepadatan_penduduk'=>284
            ] );
                        
            Desa::create( [
            'id'=>129,
            'nama_desa'=>'TELUK KASEH',
            'kode_desa'=>6101022010,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>23.1,
            'luas_persen'=>4.4,
            'kepadatan_penduduk'=>46
            ] );
                        
            Desa::create( [
            'id'=>130,
            'nama_desa'=>'SENGAWANG',
            'kode_desa'=>6101022009,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>30.54,
            'luas_persen'=>5.81,
            'kepadatan_penduduk'=>110
            ] );
                        
            Desa::create( [
            'id'=>131,
            'nama_desa'=>'SUNGAI BARU',
            'kode_desa'=>6101022008,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>33.16,
            'luas_persen'=>6.31,
            'kepadatan_penduduk'=>101
            ] );
                        
            Desa::create( [
            'id'=>132,
            'nama_desa'=>'BERLIMANG',
            'kode_desa'=>6101022007,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.23,
            'luas_persen'=>1.76,
            'kepadatan_penduduk'=>289
            ] );
                        
            Desa::create( [
            'id'=>133,
            'nama_desa'=>'PURINGAN',
            'kode_desa'=>6101022006,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>11.6,
            'luas_persen'=>2.21,
            'kepadatan_penduduk'=>118
            ] );
                        
            Desa::create( [
            'id'=>134,
            'nama_desa'=>'KUBANGGA',
            'kode_desa'=>6101022013,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>11.19,
            'luas_persen'=>2.13,
            'kepadatan_penduduk'=>201
            ] );
                        
            Desa::create( [
            'id'=>135,
            'nama_desa'=>'TAMBATAN',
            'kode_desa'=>6101022012,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>17.28,
            'luas_persen'=>3.29,
            'kepadatan_penduduk'=>74
            ] );
                        
            Desa::create( [
            'id'=>136,
            'nama_desa'=>'LELA',
            'kode_desa'=>6101022005,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>25.1,
            'luas_persen'=>4.78,
            'kepadatan_penduduk'=>94
            ] );
                        
            Desa::create( [
            'id'=>137,
            'nama_desa'=>'SUNGAI KUMPAI',
            'kode_desa'=>6101022001,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>26.85,
            'luas_persen'=>5.11,
            'kepadatan_penduduk'=>94
            ] );
                        
            Desa::create( [
            'id'=>138,
            'nama_desa'=>'SEKURA',
            'kode_desa'=>6101022002,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>46.58,
            'luas_persen'=>8.87,
            'kepadatan_penduduk'=>167
            ] );
                        
            Desa::create( [
            'id'=>139,
            'nama_desa'=>'TANJUNG KERACUT',
            'kode_desa'=>6101022028,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>31.83,
            'luas_persen'=>6.06,
            'kepadatan_penduduk'=>67
            ] );
                        
            Desa::create( [
            'id'=>140,
            'nama_desa'=>'SEBAGU',
            'kode_desa'=>6101022029,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>37,
            'luas_persen'=>7.04,
            'kepadatan_penduduk'=>36
            ] );
                        
            Desa::create( [
            'id'=>141,
            'nama_desa'=>'KUALA PANGKALAN KERAMAT',
            'kode_desa'=>6101022031,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>31.01,
            'luas_persen'=>5.9,
            'kepadatan_penduduk'=>65
            ] );
                        
            Desa::create( [
            'id'=>142,
            'nama_desa'=>'TELUK KEMBANG',
            'kode_desa'=>6101022026,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>14.2,
            'luas_persen'=>2.7,
            'kepadatan_penduduk'=>154
            ] );
                        
            Desa::create( [
            'id'=>143,
            'nama_desa'=>'SUNGAI SERABEK',
            'kode_desa'=>6101022020,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.5,
            'luas_persen'=>1.81,
            'kepadatan_penduduk'=>298
            ] );
                        
            Desa::create( [
            'id'=>144,
            'nama_desa'=>'PEDADA',
            'kode_desa'=>6101022004,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>4,
            'luas_persen'=>0.76,
            'kepadatan_penduduk'=>305
            ] );
                        
            Desa::create( [
            'id'=>145,
            'nama_desa'=>'TRI MANDAYAN',
            'kode_desa'=>6101022003,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>36.51,
            'luas_persen'=>6.95,
            'kepadatan_penduduk'=>62
            ] );
                        
            Desa::create( [
            'id'=>146,
            'nama_desa'=>'SAYANG SEDAYU',
            'kode_desa'=>6101022021,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>11.62,
            'luas_persen'=>2.21,
            'kepadatan_penduduk'=>189
            ] );
                        
            Desa::create( [
            'id'=>147,
            'nama_desa'=>'SAMUSTIDA',
            'kode_desa'=>6101022027,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>36.25,
            'luas_persen'=>6.9,
            'kepadatan_penduduk'=>120
            ] );
                        
            Desa::create( [
            'id'=>148,
            'nama_desa'=>'PIPIT TEJA',
            'kode_desa'=>6101022022,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>14.47,
            'luas_persen'=>2.75,
            'kepadatan_penduduk'=>223
            ] );
                        
            Desa::create( [
            'id'=>149,
            'nama_desa'=>'MULIA',
            'kode_desa'=>6101022025,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.79,
            'luas_persen'=>1.86,
            'kepadatan_penduduk'=>164
            ] );
                        
            Desa::create( [
            'id'=>150,
            'nama_desa'=>'MATANG SEGANTAR',
            'kode_desa'=>6101022024,
            'kecamatan'=>'TELUK KERAMAT',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.25,
            'luas_persen'=>1.76,
            'kepadatan_penduduk'=>186
            ] );
                        
            Desa::create( [
            'id'=>151,
            'nama_desa'=>'RATU SEPUDAK',
            'kode_desa'=>6101112006,
            'kecamatan'=>'GALING',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>10.4,
            'luas_persen'=>2.98,
            'kepadatan_penduduk'=>160
            ] );
                        
            Desa::create( [
            'id'=>152,
            'nama_desa'=>'SUNGAI PALAH',
            'kode_desa'=>6101112002,
            'kecamatan'=>'GALING',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>35,
            'luas_persen'=>10.03,
            'kepadatan_penduduk'=>49
            ] );
                        
            Desa::create( [
            'id'=>153,
            'nama_desa'=>'SAGU',
            'kode_desa'=>6101112001,
            'kecamatan'=>'GALING',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>41.64,
            'luas_persen'=>11.93,
            'kepadatan_penduduk'=>35
            ] );
                        
            Desa::create( [
            'id'=>154,
            'nama_desa'=>'TEMPAPAN KUALA',
            'kode_desa'=>6101112004,
            'kecamatan'=>'GALING',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>1.35,
            'luas_persen'=>9.24,
            'kepadatan_penduduk'=>56
            ] );
                        
            Desa::create( [
            'id'=>155,
            'nama_desa'=>'GALING',
            'kode_desa'=>6101112003,
            'kecamatan'=>'GALING',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>27.17,
            'luas_persen'=>7.78,
            'kepadatan_penduduk'=>102
            ] );
                        
            Desa::create( [
            'id'=>156,
            'nama_desa'=>'TEMPAPAN HULU',
            'kode_desa'=>6101112005,
            'kecamatan'=>'GALING',
            'status_desa'=>'SANGAT TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>78.13,
            'luas_persen'=>23.38,
            'kepadatan_penduduk'=>39
            ] );
                        
            Desa::create( [
            'id'=>157,
            'nama_desa'=>'TRI KEMBANG',
            'kode_desa'=>6101112007,
            'kecamatan'=>'GALING',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>37,
            'luas_persen'=>10.6,
            'kepadatan_penduduk'=>73
            ] );
                        
            Desa::create( [
            'id'=>158,
            'nama_desa'=>'TRI GADUH',
            'kode_desa'=>6101112008,
            'kecamatan'=>'GALING',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>7.1,
            'luas_persen'=>2.03,
            'kepadatan_penduduk'=>220
            ] );
                        
            Desa::create( [
            'id'=>159,
            'nama_desa'=>'SIJANG',
            'kode_desa'=>6101112010,
            'kecamatan'=>'GALING',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>52,
            'luas_persen'=>14.9,
            'kepadatan_penduduk'=>38
            ] );
                        
            Desa::create( [
            'id'=>160,
            'nama_desa'=>'TELUK PANDAN',
            'kode_desa'=>6101112009,
            'kecamatan'=>'GALING',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>28.38,
            'luas_persen'=>8.13,
            'kepadatan_penduduk'=>59
            ] );
                        
            Desa::create( [
            'id'=>161,
            'nama_desa'=>'SEMATA',
            'kode_desa'=>6101172004,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>20.16,
            'luas_persen'=>10.8,
            'kepadatan_penduduk'=>168.06
            ] );
                        
            Desa::create( [
            'id'=>162,
            'nama_desa'=>'TANGARAN',
            'kode_desa'=>6101172001,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>18.23,
            'luas_persen'=>9.77,
            'kepadatan_penduduk'=>170.87
            ] );
                        
            Desa::create( [
            'id'=>163,
            'nama_desa'=>'MERPATI',
            'kode_desa'=>6101172005,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'SANGAT TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>12.82,
            'luas_persen'=>6.87,
            'kepadatan_penduduk'=>159.59
            ] );
                        
            Desa::create( [
            'id'=>164,
            'nama_desa'=>'SIMPANG EMPAT',
            'kode_desa'=>6101172002,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>83.5,
            'luas_persen'=>44.73,
            'kepadatan_penduduk'=>68.22
            ] );
                        
            Desa::create( [
            'id'=>165,
            'nama_desa'=>'PANCUR',
            'kode_desa'=>6101172006,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>8.98,
            'luas_persen'=>4.81,
            'kepadatan_penduduk'=>230.35
            ] );
                        
            Desa::create( [
            'id'=>166,
            'nama_desa'=>'ARUNG PARAK',
            'kode_desa'=>6101172007,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>21.71,
            'luas_persen'=>11.63,
            'kepadatan_penduduk'=>152.28
            ] );
                        
            Desa::create( [
            'id'=>167,
            'nama_desa'=>'MERABUAN',
            'kode_desa'=>6101172003,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>12,
            'luas_persen'=>6.43,
            'kepadatan_penduduk'=>154.16
            ] );
                        
            Desa::create( [
            'id'=>168,
            'nama_desa'=>'ARUNG MEDANG',
            'kode_desa'=>6101172008,
            'kecamatan'=>'TANGARAN',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>9.27,
            'luas_persen'=>4.96,
            'kepadatan_penduduk'=>0
            ] );
                        
            Desa::create( [
            'id'=>169,
            'nama_desa'=>'SEPANTAI',
            'kode_desa'=>6101062012,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>25,
            'luas_persen'=>8.58,
            'kepadatan_penduduk'=>51.36
            ] );
                        
            Desa::create( [
            'id'=>170,
            'nama_desa'=>'SEMANGA',
            'kode_desa'=>6101062011,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'SANGAT TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>60.7,
            'luas_persen'=>20.84,
            'kepadatan_penduduk'=>84.93
            ] );
                        
            Desa::create( [
            'id'=>171,
            'nama_desa'=>'PERIGI LIMUS',
            'kode_desa'=>6101062010,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>5.5,
            'luas_persen'=>1.89,
            'kepadatan_penduduk'=>282
            ] );
                        
            Desa::create( [
            'id'=>172,
            'nama_desa'=>'SENUJUH',
            'kode_desa'=>6101062009,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>61,
            'luas_persen'=>20.94,
            'kepadatan_penduduk'=>22
            ] );
                        
            Desa::create( [
            'id'=>173,
            'nama_desa'=>'SENDOYAN',
            'kode_desa'=>6101062008,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>24,
            'luas_persen'=>8.24,
            'kepadatan_penduduk'=>151.63
            ] );
                        
            Desa::create( [
            'id'=>174,
            'nama_desa'=>'PERIGI LANDU',
            'kode_desa'=>6101062007,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>18.81,
            'luas_persen'=>6.46,
            'kepadatan_penduduk'=>68
            ] );
                        
            Desa::create( [
            'id'=>175,
            'nama_desa'=>'PARIT RAJA',
            'kode_desa'=>6101062005,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>33.5,
            'luas_persen'=>11.5,
            'kepadatan_penduduk'=>92.21
            ] );
                        
            Desa::create( [
            'id'=>176,
            'nama_desa'=>'PIANTUS',
            'kode_desa'=>6101062006,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>11.5,
            'luas_persen'=>3.95,
            'kepadatan_penduduk'=>158.52
            ] );
                        
            Desa::create( [
            'id'=>177,
            'nama_desa'=>'SEKUDUK',
            'kode_desa'=>6101062003,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>13.25,
            'luas_persen'=>4.55,
            'kepadatan_penduduk'=>125.06
            ] );
                        
            Desa::create( [
            'id'=>178,
            'nama_desa'=>'SETALIK',
            'kode_desa'=>6101062004,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>19,
            'luas_persen'=>6.52,
            'kepadatan_penduduk'=>73.53
            ] );
                        
            Desa::create( [
            'id'=>179,
            'nama_desa'=>'PENAKALAN',
            'kode_desa'=>6101062002,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>6.5,
            'luas_persen'=>2.23,
            'kepadatan_penduduk'=>177.69
            ] );
                        
            Desa::create( [
            'id'=>180,
            'nama_desa'=>'SULUNG',
            'kode_desa'=>6101062001,
            'kecamatan'=>'SEJANGKUNG',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>12.5,
            'luas_persen'=>4.29,
            'kepadatan_penduduk'=>95.52
            ] );
                        
            Desa::create( [
            'id'=>181,
            'nama_desa'=>'SEBUNGA',
            'kode_desa'=>6101092002,
            'kecamatan'=>'SAJINGAN BESAR',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>352.26,
            'luas_persen'=>25.32,
            'kepadatan_penduduk'=>9
            ] );
                        
            Desa::create( [
            'id'=>182,
            'nama_desa'=>'KALIAU',
            'kode_desa'=>6101092001,
            'kecamatan'=>'SAJINGAN BESAR',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>197.74,
            'luas_persen'=>14.21,
            'kepadatan_penduduk'=>11
            ] );
                        
            Desa::create( [
            'id'=>183,
            'nama_desa'=>'SANATAB',
            'kode_desa'=>6101092004,
            'kecamatan'=>'SAJINGAN BESAR',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>110.04,
            'luas_persen'=>7.91,
            'kepadatan_penduduk'=>24
            ] );
                        
            Desa::create( [
            'id'=>184,
            'nama_desa'=>'SANTABAN',
            'kode_desa'=>6101092003,
            'kecamatan'=>'SAJINGAN BESAR',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>173.86,
            'luas_persen'=>12.5,
            'kepadatan_penduduk'=>12
            ] );
                        
            Desa::create( [
            'id'=>185,
            'nama_desa'=>'SEI BENING',
            'kode_desa'=>6101092005,
            'kecamatan'=>'SAJINGAN BESAR',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>557.3,
            'luas_persen'=>40.06,
            'kepadatan_penduduk'=>2
            ] );
                        
            Desa::create( [
            'id'=>186,
            'nama_desa'=>'KALIMANTAN',
            'kode_desa'=>6101082006,
            'kecamatan'=>'PALOH',
            'status_desa'=>'TERTINGGAL',
            'prioritas_desa'=>'YA',
            'luas_desa'=>64.87,
            'luas_persen'=>5.65,
            'kepadatan_penduduk'=>27
            ] );
                        
            Desa::create( [
            'id'=>187,
            'nama_desa'=>'MATANG DANAU',
            'kode_desa'=>6101082005,
            'kecamatan'=>'PALOH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>44.01,
            'luas_persen'=>3.83,
            'kepadatan_penduduk'=>97
            ] );
                        
            Desa::create( [
            'id'=>188,
            'nama_desa'=>'TANAH HITAM',
            'kode_desa'=>6101082004,
            'kecamatan'=>'PALOH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'YA',
            'luas_desa'=>126.06,
            'luas_persen'=>10.98,
            'kepadatan_penduduk'=>26
            ] );
                        
            Desa::create( [
            'id'=>189,
            'nama_desa'=>'MALEK',
            'kode_desa'=>6101082003,
            'kecamatan'=>'PALOH',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>136.7,
            'luas_persen'=>11.9,
            'kepadatan_penduduk'=>14
            ] );
                        
            Desa::create( [
            'id'=>190,
            'nama_desa'=>'NIBUNG',
            'kode_desa'=>6101082002,
            'kecamatan'=>'PALOH',
            'status_desa'=>'MANDIRI',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>147.85,
            'luas_persen'=>12.88,
            'kepadatan_penduduk'=>19
            ] );
                        
            Desa::create( [
            'id'=>191,
            'nama_desa'=>'SEBUBUS',
            'kode_desa'=>6101082001,
            'kecamatan'=>'PALOH',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'YA',
            'luas_desa'=>326.21,
            'luas_persen'=>28.41,
            'kepadatan_penduduk'=>23
            ] );
                        
            Desa::create( [
            'id'=>192,
            'nama_desa'=>'TEMAJUK',
            'kode_desa'=>6101082007,
            'kecamatan'=>'PALOH',
            'status_desa'=>'BERKEMBANG',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>230,
            'luas_persen'=>20.03,
            'kepadatan_penduduk'=>8
            ] );
                        
            Desa::create( [
            'id'=>193,
            'nama_desa'=>'MENTIBAR',
            'kode_desa'=>6101082008,
            'kecamatan'=>'PALOH',
            'status_desa'=>'MAJU',
            'prioritas_desa'=>'TIDAK',
            'luas_desa'=>72.58,
            'luas_persen'=>6.32,
            'kepadatan_penduduk'=>28
            ] );
    }
}
