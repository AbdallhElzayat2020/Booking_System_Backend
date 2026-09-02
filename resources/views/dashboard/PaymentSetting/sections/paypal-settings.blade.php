<div class="tab-pane fade show active" id="home4" role="tabpanel"
     aria-labelledby="home-tab4">

    <div class="card border">
        <div class="card-body">

            <form action="{{ route('admin.payment-settings.update') }}" method="post">
                @csrf

                <div class="row">

                    {{-- Paypal Status --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_status">Paypal Status</label>
                            <select name="paypal_status" id="paypal_status" class="form-control">
                                <option @selected(old('paypal_status', config('payment.paypal_status')) == 'active') value="active">Active</option>
                                <option @selected(old('paypal_status', config('payment.paypal_status')) == 'inactive') value="inactive">Inactive</option>
                            </select>
                        </div>
                        @error('paypal_status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Mode --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paypal_mode">Paypal Mode</label>
                            <select name="paypal_mode" id="paypal_mode" class="form-control">
                                <option @selected(old('paypal_mode', config('payment.paypal_mode')) == 'sandbox') value="sandbox">Sandbox</option>
                                <option @selected(old('paypal_mode', config('payment.paypal_mode')) == 'live') value="live">Live</option>
                            </select>
                        </div>
                        @error('paypal_mode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Country --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paypal_country">Paypal Country</label>
                            <select name="paypal_country" id="paypal_country" class="form-control select2">
                                <option value="">Select</option>
                                @foreach(config('countries') as $key => $value)
                                    <option value="{{ $key }}" @selected(old('paypal_country', config('payment.paypal_country')) == $key)>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('paypal_country')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Currency --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_currency">Paypal Currency</label>
                            <select name="paypal_currency" id="paypal_currency" class="form-control select2">
                                @foreach (config('currency.currency_list') as $key => $value)
                                    <option @selected(old('paypal_currency', config('payment.paypal_currency')) == $value) value="{{ $value }}">
                                        {{ $key }} ({{ $value }}) (POUND)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('paypal_currency')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Currency Rate --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_currency_rate">Paypal Currency Rate (Per {{ config('settings.site_default_currency') }})</label>
                            <input type="text" class="form-control"
                                   name="paypal_currency_rate"
                                   value="{{ old('paypal_currency_rate', config('payment.paypal_currency_rate')) }}">
                        </div>
                        @error('paypal_currency_rate')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Client ID --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_client_id">Paypal Client ID</label>
                            <input type="text" class="form-control"
                                   name="paypal_client_id"
                                   value="{{ old('paypal_client_id', config('payment.paypal_client_id')) }}">
                        </div>
                        @error('paypal_client_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal Secret Key --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_secret_key">Paypal Secret Key</label>
                            <input type="text" class="form-control"
                                   name="paypal_secret_key"
                                   value="{{ old('paypal_secret_key', config('payment.paypal_secret_key')) }}">
                        </div>
                        @error('paypal_secret_key')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Paypal App Key --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paypal_app_key">Paypal App Key</label>
                            <input type="text" class="form-control"
                                   name="paypal_app_key"
                                   value="{{ old('paypal_app_key', config('payment.paypal_app_key')) }}">
                        </div>
                        @error('paypal_app_key')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>

</div>
