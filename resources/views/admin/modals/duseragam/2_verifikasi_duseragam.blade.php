@push('modals')
	@component('admin.components.modal', [
		'id' => 'modalVerifikasi'.$row->id,
		'title' => 'Verifikasi Daftar Ulang & Seragam',
	])

	<form action="/admin/verifikasi/duseragam/{{ $row->id }}" method="post">
		@csrf

		{{-- <div class="row"> --}}
			{{-- @foreach ($subinputs as $subinput) --}}
			{{-- <div class="col-12 col-md-6"> --}}
				@foreach ($subinputs as $input)
				@include('admin.components.input', [
				'input' => $input])
				@endforeach
				{{-- </div> --}}
			{{-- @endforeach --}}
			{{-- </div> --}}

		<div class="form-group text-center">
			<button class="btn btn-primary">
				<i class="fa fa-check"></i> Verifikasi
			</button>
		</div>

	</form>

	@endcomponent
@endpush