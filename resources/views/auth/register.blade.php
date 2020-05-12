@extends('auth.layouts.app')

@section('content')

    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="ibox-content">
            <h2 class="font-bold" style="text-align: center">Registration</h2>
            <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="First Name">
                    @error('name')
                    <span class="help-block m-b-none text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                 <div class="form-group">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus placeholder="Last Name">
                    @error('last_name')
                    <span class="help-block m-b-none text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="help-block m-b-none text-danger">
                       <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  placeholder="Phone">
                    @error('phone')
                    <span class="help-block m-b-none text-danger">
                       <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="help-block m-b-none text-danger">
                       <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm-Password">
                </div>

                <div class="form-group">
                    <select class="form-control" name="department_id">
                        <option value="">Select Faculty</option>
                        @foreach($departments as $department )
                            <option value="{{ $department->id }}">
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="help-block m-b-none text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <select onchange="checkAccountType(this)"  class="form-control" name="account_type_id">
                        <option value="">Account Type</option>
                        <option value="0">Free</option>
                        <option value="1">Paid</option>
                    </select>

                    @error('account_type_id')
                    <span class="help-block m-b-none text-danger">
                       <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group {{ old('account_type_id') == 1 ? '' : 'hidden' }}" id="paymentType">
                    <select class="form-control" name="payment_type_id">
                        <option value="">Payment Type</option>
                        <option value="1">Online</option>
                        <option value="2">Cash</option>
                    </select>

                    @error('payment_type_id')
                        <span class="help-block m-b-none text-danger">
                           <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Registration</button>

            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
@endsection

@section('custom-js')
    <script>
        function checkAccountType(e) {
            let account_type = e.value,
                payment_type = document.getElementById('paymentType'); // 0 free, 1 paid

            if (account_type == 1){
                payment_type.classList.remove('hidden');
            }else{
                payment_type.classList.add('hidden');
            }
        }
    </script>
@endsection
