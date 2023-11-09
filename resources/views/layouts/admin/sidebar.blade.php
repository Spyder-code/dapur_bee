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

<ul class="navbar-nav flex-column" style="overflow-y: scroll; height:550px">
    <li class="nav-divider">
        Dashboard
    </li>
    @foreach ($init as $menu)
        @if (in_array(Auth::user()->role_id,$menu['role']))
            <x-navbar-item :title="$menu['title']" :link="$menu['link']??''" :sub="$menu['sub']"></x-navbar-item>
        @endif
    @endforeach
</ul>
