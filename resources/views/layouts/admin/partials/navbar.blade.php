@php
    $init = [
        [
            'title' => 'Produk',
            'link' => route('product.index'),
            'sub' => false,
            'role' => [1,2]
        ],
        [
            'title' => 'Kategori Produk',
            'link' => route('product-category.index'),
            'sub' => false,
            'role' => [1,2]
        ],
        [
            'title' => 'Keranjang Customer',
            'link' => route('cart.index'),
            'sub' => false,
            'role' => [1,2]
        ],
        // [
        //     'title' => 'Order',
        //     'link' => route('order.index'),
        //     'sub' => false,
        //     'role' => [1,2]
        // ],
        [
            'title' => 'Transaksi',
            'link' => route('transaction.index'),
            'sub' => false,
            'role' => [1,2]
        ],
        [
            'title' => 'Pengguna',
            'link' => route('user.index'),
            'sub' => [
                ['title'=>'Super Admin','link'=>route('user.index',['role_id'=>1])],
                ['title'=>'Kasir','link'=>route('user.index',['role_id'=>2])],
                ['title'=>'Customer','link'=>route('user.index',['role_id'=>3])],
            ],
            'role' => [1]
        ],
        [
            'title' => 'Pengaturan',
            'link' => route('setting.edit',1),
            'sub' => false,
            'role' => [1,2]
        ],
    ]
@endphp

<div class="d-flex align-items-stretch" id="kt_header_nav">
    <!--begin::Menu wrapper-->
    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
        <!--begin::Menu-->
        <div class="" id="#kt_header_menu" data-kt-menu="true">

            @foreach ($init as $menu)
                @if (in_array(Auth::user()->role_id,$menu['role']))
                    <x-navbar-item :title="$menu['title']" :link="$menu['link']??''" :sub="$menu['sub']"></x-navbar-item>
                @endif
            @endforeach
        </div>
    </div>
</div>
