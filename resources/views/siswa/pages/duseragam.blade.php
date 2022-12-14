@extends('layouts.siswa')

<?php 
$user = auth()->user();
$identitas = $user->identitas;
$forms = [
	[
		[
			'variant' => 'blank',
			'title' => 'Data Pendaftaran',
			'inputs' => [
				['name' => 'nama_lengkap', 'value' => $identitas->nama_lengkap, 'attr'=> 'disabled'],
				['name' => 'jalur_pendaftaran', 'value' => ModelHelper::getJalur($identitas->jalur_pendaftaran), 'attr'=> 'disabled'],
				['name' => 'jenis_kelamin', 'value' => ModelHelper::getJenisKelamin($identitas->jenis_kelamin_id), 'attr'=> 'disabled'],
				['name' => 'tanggal_lahir', 'value' => $identitas->tanggal_lahir, 'attr'=> 'disabled'],
				['name' => 'asal_sekolah', 'value' => $identitas->asal_sekolah, 'attr'=> 'disabled'],
				['name' => 'nama_jurusan', 'value' => $identitas->jurusan->singkatan, 'attr'=> 'disabled'],
			]
		],
		[
			'title' => 'Data Keluarga',
			'inputs' => [
				['name' => 'tempat_lahir', 'value' => $identitas->tempat_lahir],
				['name' => 'nama_ayah', 'value' => $identitas->nama_ayah],
				['name' => 'tahun_lahir_ayah', 'value' => $identitas->tahun_lahir_ayah],
				['name' => 'nama_ibu', 'value' => $identitas->nama_ibu],
				['name' => 'tahun_lahir_ibu', 'value' => $identitas->tahun_lahir_ibu],
				['type' => 'number', 'name' => 'jumlah_saudara_kandung', 'value' => $identitas->jumlah_saudara_kandung],
			]
		],
		[
			'title' => 'Data Komunikasi',
			'inputs' => [
				['name' => 'no_wa_ortu', 'value' => $identitas->no_wa_ortu],
				['name' => 'no_wa_siswa', 'value' => $identitas->no_wa_siswa],
			]
		],
	],

	[
		[
			'title' => 'Data Lokasi',
			'inputs' => [
				['name' => 'alamat_desa', 'value' => $identitas->alamat_desa, 'label' => 'Nama Desa'],
				['name' => 'alamat_kec', 'value' => $identitas->alamat_kec, 'label' => 'Nama Kecamatan'],
				['name' => 'alamat_kota_kab', 'value' => $identitas->alamat_kota_kab, 'label' => 'Nama Kota/Kab'],
				['type' => 'number', 'name' => 'alamat_rt', 'value' => $identitas->alamat_rt, 'label' => 'RT'],
				['type' => 'number', 'name' => 'alamat_rw', 'value' => $identitas->alamat_rw, 'label' => 'RW'],
				['type' => 'number', 'name' => 'alamat_rw', 'value' => $identitas->alamat_g, 'label' => 'GG'],
			]
		],
		[
			'title' => 'Data Nasional',
			'inputs' => [
				['type' => 'number', 'name' => 'nisn', 'value' => $identitas->nisn, 'label' => 'NISN'],
				['type' => 'number', 'name' => 'no_ujian_nasional', 'value' => $identitas->no_ujian_nasional, 'label' => 'No Ujian Nasional'],
				['type' => 'text', 'name' => 'no_ijazah', 'value' => $identitas->no_ijazah, 'label' => 'No Ijazah'],
			]
		],
		[
			'title' => 'Data Seragam',
			'inputs' => \App\Models\Seragam::getInputsDisabled($identitas)
		],
	],

]
?>

@section('main')
	{{-- <div class="row"> --}}
		<form action="/siswa/duseragam/{{ auth()->user()->identitas->id }}" method="POST" class="row">
		@csrf

		@foreach ($forms as $form)
			<div class="col-12 col-md-6 row gap-4" style="height: max-content">

				@foreach($form as $subform)
					<div class="col-12">
						<div class="card">
							<div class="card-header pb-0">
								<h5> {{ $subform['title'] ?? '' }} </h5>
							</div>

							<div class="card-body">
								
								@foreach ($subform['inputs'] as $input)
									@include('siswa.components.input', ['input' => $input])
								@endforeach

							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		@endforeach

		<div class="col-12 text-center mt-4">
			<button type="submit" class="btn bg-gradient-primary">
				Submit
			</button>
		</div>

	</form>
	{{-- </div> --}}
@endsection