@php
    $setting = App\Models\Setting::find(1);
@endphp
<div class="section section-padding">
    <div class="container text-center">
        {{-- <img src="{{ asset('images/logo.png') }}" alt="Dapur_Bee" style="height: 120px"> --}}
        <p class="copyright">&copy; 2023 Dapur_Bee. All Rights Reserved | <strong>+{{ $setting->whatsapp ?? '6283857317946' }}</strong> | <a href="mailto:office@dapurbee.com">office@dapurbee.com</a></p>
        <img src="{{ asset('assets/images/bank.jpg') }}" alt="">
    </div>
</div>
