<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "kode_dinas" => "96",
            "bidang" => "bidang 2",
            "nip" => "1302113478591234",
            "nik" => "3303423875612947",
            "nama" => "Admin",
            "tgl_lahir" => "22-02-02",
            "jk" => "Perempuan",
            "alamat" => "Jalan Mawar",
            "email" => "admin@gmail.com",
            "no_hp" => "089342864792",
            "password" => Hash::make("admin"),
            "thn_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/08/2022"
            )->format("Y"),
            "pend_terakhir" => "SMA",
            "bln_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/08/2022"
            )->format("m"),
            "foto" => "img",
            "level" => "administrator",
        ]);

        User::create([
            "kode_dinas" => "96",
            "bidang" => "bidang 2",
            "nip" => "1301111111111111",
            "nik" => "3303333333333333",
            "nama" => "Pegawai",
            "tgl_lahir" => "22-03-03",
            "jk" => "Laki-laki",
            "alamat" => "Jalan Anggrek",
            "email" => "pegawai@gmail.com",
            "no_hp" => "089322222222",
            "password" => Hash::make("111"),
            "thn_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/10/2021"
            )->format("Y"),
            "pend_terakhir" => "SMA",
            "bln_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/08/2022"
            )->format("m"),
            "foto" => "img",
            "level" => "pegawai",
        ]);

        User::create([
            "kode_dinas" => "96",
            "bidang" => "bidang 2",
            "nip" => "1301111111111111",
            "nik" => "3303333333333333",
            "nama" => "Koordinator",
            "tgl_lahir" => "22-03-03",
            "jk" => "Laki-laki",
            "alamat" => "Jalan Anggrek",
            "email" => "Koordinator@gmail.com",
            "no_hp" => "089322222222",
            "password" => Hash::make("111"),
            "thn_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/10/2021"
            )->format("Y"),
            "pend_terakhir" => "SMA",
            "bln_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/08/2022"
            )->format("m"),
            "foto" => "img",
            "level" => "sub-koordinator",
        ]);

        User::create([
            "kode_dinas" => "96",
            "bidang" => "bidang 2",
            "nip" => "1301111111111111",
            "nik" => "3303333333333333",
            "nama" => "Kepala Bidang",
            "tgl_lahir" => "22-03-03",
            "jk" => "Laki-laki",
            "alamat" => "Jalan Anggrek",
            "email" => "KepBidang@gmail.com",
            "no_hp" => "089322222222",
            "password" => Hash::make("111"),
            "thn_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/10/2021"
            )->format("Y"),
            "pend_terakhir" => "SMA",
            "bln_masuk" => Carbon::createFromFormat(
                "m/d/Y",
                "12/08/2022"
            )->format("m"),
            "foto" => "img",
            "level" => "kepala-bidang",
        ]);
    }
}