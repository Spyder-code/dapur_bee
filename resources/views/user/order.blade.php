@extends('layouts.user.user')
@section('content')
        <!-- Order Tracking Section Start -->
        <div class="section section-padding">
            <div class="container">

                <div class="order-tracking">
                    <div class="offcanvas-logo text-center">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
                    </div>
                    <p>You can make your own creation. Just describe your creation below. We will contact you for more details.</p>
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                        <div class="row learts-mb-n30">
                            <div class="col-6 learts-mb-30">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" placeholder="Enter your name" value="{{ Auth::user()->name ?? '' }}">
                            </div>
                            <div class="col-6 learts-mb-30">
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" type="text" placeholder="Enter your phone" value="{{ Auth::user()->phone ?? '' }}">
                            </div>
                            <div class="col-12 learts-mb-30">
                                <label for="address">Address</label>
                                <input id="address" name="address" type="text" placeholder="Enter your address" value="{{ Auth::user()->address ?? '' }}">
                            </div>
                            <div class="col-12 learts-mb-30">
                                <label for="message">Message</label>
                                <input id="message" name="message" type="text" placeholder="Enter your message" value="{{ $customer->message ?? '' }}">
                            </div>
                            <div class="col-12 text-center learts-mb-30">
                                <button type="submit" class="btn btn-dark btn-outline-hover-dark">Send</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!-- Order Tracking Section End -->
@endsection
