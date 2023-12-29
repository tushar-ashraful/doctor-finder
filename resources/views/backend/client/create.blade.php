@extends('layouts.backend') 
@section('pageTitle', 'Client Create') 
@section('content')
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h4 class="mt-2 header-title float-left">Create Client</h4>
				<a class="btn btn-info btn-sm float-right" href=" {{ route('backend.clientlist.index') }} "><i class="mdi mdi-arrow-left-thick"></i> Back</a>
			</div>
			<form action="{{ route('backend.clientlist.store') }}" class="mb-0" method="post">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name <small class="text-danger font-13">*</small></label>
								<input type="text" class="form-control" id="firstname" required="" name="name" value="{{old('name')}}" />
								@if ($errors->has('name'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('name') }}</strong> </div>
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Phone <small class="text-danger font-13">*</small></label>
								<input type="number" class="form-control" id="lastname" required="" name="phone" value="{{old('phone')}}"/>
								@if ($errors->has('phone'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('phone') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
					</div>
					<!--end row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" value="{{old('email')}}" />
								@if ($errors->has('email'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('email') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
						<div class="col-md-6">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="address" value="{{old('address')}}" />
								@if ($errors->has('address'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('address') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
					</div>
					<!--end row-->
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Reference</label>
								<input type="text" class="form-control" id="city" name="reference" value="{{old('reference')}}" />
								@if ($errors->has('reference'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('reference') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
						<div class="col-md-3">
							<div class="form-group">
								<label class="col-form-label pt-0">Client Type <small class="text-danger font-13">*</small></label>
								<select class="form-control" name="type">
									<option value="">-- Select Value --</option>
									@foreach ($clientTypes as $type)
									<option value="{{$type->id}}">{{ $type->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('type'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('type') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
						<div class="col-md-3">
							<div class="form-group">
								<label class="col-form-label pt-0">Client Status <small class="text-danger font-13">*</small></label>
								<select class="form-control" name="status">
									<option value="">-- Select Value --</option>
									@foreach ($clientStatuses as $status)
									<option value=" {{$status->id}} "> {{$status->name}} </option>
									@endforeach
								</select>
								@if ($errors->has('status'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('status') }}</strong> </div>
								@endif
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="col-form-label pt-0">Short Note<small class="text-danger font-13">*</small></label>
								<select class="form-control" name="short_note">
									<option value="">-- Select Value --</option>
									<option value="অফিস ভিজিট করেছে।">অফিস ভিজিট করেছে।</option>
									<option value="আলোচনা চলছে।">আলোচনা চলছে।</option>
									<option value="কল দিয়েছিল।">কল দিয়েছিল।</option>
									<option value="ফেসবুক এ ম্যাসেজ দিয়েছে।">ফেসবুক এ ম্যাসেজ দিয়েছে।</option>
									<option value="প্রজেক্ট লিস্ট মেইল করা হয়েছে।">প্রজেক্ট লিস্ট মেইল করা হয়েছে।</option>
									<option value="খরচ বেশি তাই করবে না।">খরচ বেশি তাই করবে না।</option>
									<option value="পরে জানাবে।">পরে জানাবে।</option>
									<option value="অন্য কোথাও করতে দিয়েছে।">অন্য কোথাও করতে দিয়েছে।</option>
									<option value="যোগাযোগ করছে না।">যোগাযোগ করছে না।</option>
									<option value="এখন সবচেয়ে বেশি প্রজেক্ট আসে।">এখন সবচেয়ে বেশি প্রজেক্ট আসে।</option>
									<option value="বেশি প্রজেক্ট আসছে।">বেশি প্রজেক্ট আসছে।</option>
									<option value="কিছু প্রজেক্ট আসছে।">কিছু প্রজেক্ট আসছে।</option>
									<option value="কম প্রজেক্ট আসছে।">কম প্রজেক্ট আসছে।</option>
									<option value="আগে বেশি আসতো,এখন কম আসে।">আগে বেশি আসতো,এখন কম আসে।</option>
									<option value="কোন প্রজেক্ট আসে নাই।">কোন প্রজেক্ট আসে নাই।</option>									
								</select>
								@if ($errors->has('status'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('status') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
					</div>
					<!--end row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Project Name</label>
								<input type="text" class="form-control" name="project" value="{{old('project')}}" />
								@if ($errors->has('project'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('project') }}</strong> </div>
								@endif
							</div>
						</div>
						<!--end col-->
						<div class="col-md-6">
							<div class="form-group">
								<label>Note</label>
								<textarea class="form-control" name="note">{{old('note')}}</textarea>
								@if ($errors->has('note'))
									<div class="invalid-feedback"> <strong>{{ $errors->first('note') }}</strong> </div>
								@endif
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
				<!--end card-body-->
				<div class="card-footer">
					<button type="submit" class="btn btn-submit btn-primary waves-effect waves-light">Submit</button>
					{{-- <button type="reset" class="btn btn-info waves-effect waves-light">Reset</button> --}}
				</div>
			</form>
		</div>
		<!--end card-->
	</div>
</div>

@endsection