<div class="col-12 p-0">
	<div class="card">
		<div class="card-body p-2">
			<div class="row">
				@foreach ($filters as $row)
					<div class="col-12 form-group row d-flex flex-wrap flex-row justify-content-center align-items-center"
					style="gap: .5rem">
						@foreach($row as $input)
							<?php
							$input = FormHelper::initInput($input);
							$error = $errors->has($input['name']);
							$input['size'] ??= 'sm';
							?>
							
							@if ($input['type'] === 'select')
								<select type="{{ $input['type'] }}"
									name="{{ $input['name'] }}"
									style="flex:1; min-width: 200px;"
									class="form-control form-control-sm
									{{ $error?'is-invalid':'' }}"
									{!! $input['attr'] !!}
								>
									@foreach ($input['options'] as $option)
										<?php
											if (is_array($option)) {
												$value = $option['value']; $label = $option['label'];
											} else $value = $label = $option;
											$selected = ($input['value'] === $value) || (
												!empty(request($input['name'])) && request($input['name']) == $value
											);
										?>
										
										<option value="{{ $value }}" {{ $selected ? 'selected' : '' }}>
											{{ $label }}
										</option>
									@endforeach	
								</select>
							@else
								
								<div class="mx-auto"
								style="flex:1;min-width:200px'">
									<input type="{{ $input['type'] }}"
										name="{{ $input['name'] }}"
										placeholder="{{ $input['placeholder'] }}"
										value="{{ request($input['name']) }}"
										class="form-control form-control-{{ $input['size'] }}"
										{!! $input['attr'] !!}
									/>
								</div>
							
							@endif

						@endforeach
					</div>
				@endforeach

				<div class="d-flex justify-content-center align-items-center flex-row flex-wrap text-center mx-auto mt-2"
				style="gap:.5rem;max-width:400px">
					<button type="submit" class="btn btn-primary btn-sm px-4 m-0 mx-auto" style="flex:1;min-width:150px">
						<i class="fa fa-filter"></i> Filter
					</button>
					<button type="button" class="btn btn-primary btn-sm px-4 m-0 mx-auto" style="flex:1;min-width:150px"
					onclick="location = location.pathname">
						<i class="fa fa-magic"></i> Clear
					</button>
				</div>
					
		</div>
	</div>
</div>