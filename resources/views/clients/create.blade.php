
@extends('adminlte::page')

@section('title', 'Create a Client')


@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Client</div>
                <div class="card-body">
                    <form autocomplete="off" method="POST" action="/client">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control{{ $errors->has('company_name') ? ' border-danger' : '' }}" id="company_name" name="company_name" value="{{ old('company_name') }}">
                            <small class="form-text text-danger">{!! $errors->first('company_name') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <input type="text" class="form-control{{ $errors->has('company_address') ? ' border-danger' : '' }}" id="company_address" name="company_address" value="{{ old('company_address') }}">
                            <small class="form-text text-danger">{!! $errors->first('company_address') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' border-danger' : '' }}" id="email" name="email" value="{{ old('email') }}">
                            <small class="form-text text-danger">{!! $errors->first('email') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="company_city">Company City</label>
                            <input type="text" class="form-control{{ $errors->has('company_city') ? ' border-danger' : '' }}" id="company_city" name="company_city" value="{{ old('company_city') }}">
                            <small class="form-text text-danger">{!! $errors->first('company_city') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control{{ $errors->has('contact_person') ? ' border-danger' : '' }}" id="contact_person" name="contact_person" value="{{ old('contact_person') }}">
                            <small class="form-text text-danger">{!! $errors->first('contact_person') !!}</small>
                        </div>


                        <input class="btn btn-primary mt-4" type="submit" value="Save a Client">
                    </form>
                    @if ($errors->any())
                      <div class="w-4/8 m-auto text-center">
                         @foreach ( $errors->all() as $error  )
                               <li class="text-red-500 list-none">
                                 {{  $error}}
                                </li>
                         @endforeach
                    </div>
                    @endif
                    <a class="btn btn-primary float-right" href="{{ route('admin.index') }}"><i class="fas fa-arrow-circle-up"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
