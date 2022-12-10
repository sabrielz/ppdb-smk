@extends('layouts.subgeneral', [
	'subtitle' => 'Formulir Pendaftaran'
])

@section('subcontent')
	<form id="myform" action="javascript:void()" method="post">
		@csrf
		<div class="p-4 md:p-8 grid grid-cols-1 grid-rows-auto max-w-screen-lg mx-auto my-3">

			<?php $input_iterator = 0 ?>

			@foreach($inputs as $input)
				<?php !in_array($input['type'], ['hidden']) ? $input_iterator += 1 : $input_iterator ?>
				@include('subcomponents.formulir_input', ['input' => $input, 'no' => $input_iterator])
			@endforeach

			<div class="mt-3 w-full flex flex-row justify-center items-center gap-2">
				<button
					type="submit"
					class="g-recaptcha p-2 px-6 bg-primary text-white rounded-lg shadow max-w-max"
					data-sitekey="{{ ConfigHelper::get('recaptcha_site_key') }}" 
					data-callback='onSubmit' 
					data-action='submit'
				> 
					Daftar <i class="fa fa-sign-in-alt"></i>
				</button>
			</div>
		</div>

	</form>
@endsection

@push('scripts')
	<script src="https://www.google.com/recaptcha/api.js?render={{ ConfigHelper::get('recaptcha_site_key') }}"></script>
	{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
	<script>
		function onSubmit(token) {
			document.getElementById("myform").submit();
		}
		$('form button[type=submit]').click(function (e) {
			e.preventDefault();
			grecaptcha.ready(function() {
				grecaptcha.execute('{{ ConfigHelper::get('recaptcha_site_key') }}', {
					action: 'submit'
				}).then(function(token) {
						// Add your logic to submit to your backend server here.
						// console.log(token);
						$.ajax({
							url: 'https://www.google.com/recaptcha/api/siteverify',
							type: 'POST',
							data: {
								secret: '{{ ConfigHelper::get('recaptcha_secret_key') }}',
								response: token
							},
							cache: false,
							success: function (res) {
								console.log(res);
							}
						})
				});
			});
		})
		// grecaptcha.enterprise.ready(function() {
		// 		grecaptcha.enterprise.execute('{{ ConfigHelper::get('recaptcha_site_key') }}', {
		// 			action: 'login',
		// 		}).then(function(token) {
					
		// 		});
		// });
	</script>
@endpush