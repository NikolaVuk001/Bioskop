@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Dodavanje Novog Moderatora</h4>
                            <form method="POST" action="{{ route('store.moderator') }}">
                                @csrf

                                <!-- Ime -->
                                <div class="row mb-3">
                                    <x-input-label for="name" :value="__('Ime')" />
                                    <div class="col-sm-12">
                                        <x-text-input id="name" class="form-control" type="text" name="name"
                                            :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Prezime -->
                                <div class="row mb-3">
                                    <x-input-label for="surname" :value="__('Prezime')" />
                                    <div class="col-sm-12">
                                        <x-text-input id="surname" class="form-control" type="text" name="surname"
                                            :value="old('surname')" required autofocus autocomplete="surname" />
                                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="row mb-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <div class="col-sm-12">
                                        <x-text-input id="email" class="form-control" type="email" name="email"
                                            :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="row mb-3">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <div class="col-sm-12">
                                        <x-text-input id="password" class="form-control" type="password" name="password"
                                            required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="row mb-3">
                                    <x-input-label for="password_confirmation" :value="__('Potvrdi Password')" />
                                    <div class="col-sm-12">
                                        <x-text-input id="password_confirmation" class="form-control" type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-center mt-4">
                                    <x-primary-button class="btn btn-primary btn-md">
                                        {{ __('Registracija') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
