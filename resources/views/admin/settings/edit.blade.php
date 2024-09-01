@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="mobile_one">{{ trans('cruds.setting.fields.mobile_one') }}</label>
                <input class="form-control {{ $errors->has('mobile_one') ? 'is-invalid' : '' }}" type="text" name="mobile_one" id="mobile_one" value="{{ old('mobile_one', $setting->mobile_one) }}" required>
                @if($errors->has('mobile_one'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_one') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mobile_one_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile_two">{{ trans('cruds.setting.fields.mobile_two') }}</label>
                <input class="form-control {{ $errors->has('mobile_two') ? 'is-invalid' : '' }}" type="text" name="mobile_two" id="mobile_two" value="{{ old('mobile_two', $setting->mobile_two) }}" required>
                @if($errors->has('mobile_two'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile_two') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mobile_two_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="whatsapp">{{ trans('cruds.setting.fields.whatsapp') }}</label>
                <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}" type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}" required>
                @if($errors->has('whatsapp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('whatsapp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.whatsapp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_one">{{ trans('cruds.setting.fields.email_one') }}</label>
                <input class="form-control {{ $errors->has('email_one') ? 'is-invalid' : '' }}" type="email" name="email_one" id="email_one" value="{{ old('email_one', $setting->email_one) }}" required>
                @if($errors->has('email_one'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_one') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_one_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email_two">{{ trans('cruds.setting.fields.email_two') }}</label>
                <input class="form-control {{ $errors->has('email_two') ? 'is-invalid' : '' }}" type="email" name="email_two" id="email_two" value="{{ old('email_two', $setting->email_two) }}" required>
                @if($errors->has('email_two'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_two') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_two_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_fee">{{ trans('cruds.setting.fields.shipping_fee') }}</label>
                <input class="form-control {{ $errors->has('shipping_fee') ? 'is-invalid' : '' }}" type="number" name="shipping_fee" id="shipping_fee" value="{{ old('shipping_fee', $setting->shipping_fee) }}" step="1" required>
                @if($errors->has('shipping_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.shipping_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_us">{{ trans('cruds.setting.fields.about_us') }}</label>
                <textarea class="form-control {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us" required>{{ old('about_us', $setting->about_us) }}</textarea>
                @if($errors->has('about_us'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_us_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection