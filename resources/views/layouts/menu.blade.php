<li class="nav-item">
    <a href="{{ route('users.show', \Auth::user()->id) }}"
       class="nav-link {{ Request::is('users/' . \Auth::user()->id .'*') ? 'active' : '' }}">
        <p>Seus Dados</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('orders.index') }}"
        class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
        <p>Seus Pedidos</p>
    </a>
</li>

@if(\Auth::user()->stores->first() != null)
    <li class="nav-item">
        <a href="{{ route('stores.show', \Auth::user()->stores->first()->id) }}"
            class="nav-link {{ Request::is('stores/' . \Auth::user()->stores->first()->id .'*') ? 'active' : '' }}">
            <p>Sua Loja</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('products.index') }}"
            class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
            <p>Seus Produtos</p>
        </a>
    </li>
@endif


@role('admin')
    <li class="nav-item">
        <a href="{{ route('stores.index') }}"
        class="nav-link {{ Request::is('stores*') ? 'active' : '' }}">
            <p>Lojas</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('products.index') }}"
        class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
            <p>Produtos</p>
        </a>
    </li>
@endrole

<!-- <li class="nav-item">
    <a href="{{ route('deliveryInfos.index') }}"
       class="nav-link {{ Request::is('deliveryInfos*') ? 'active' : '' }}">
        <p>Delivery Infos</p>
    </a>
</li> -->

<!--
<li class="nav-item">
    <a href="{{ route('user.index') }}"
       class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
        <p>Seus Pedidos</p>
    </a>
</li> -->

<!-- <li class="nav-item">
    <a href="{{ route('payments.index') }}"
       class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
        <p>Payments</p>
    </a>
</li> -->


<!-- <li class="nav-item">
    <a href="{{ route('buyerTransfers.index') }}"
       class="nav-link {{ Request::is('buyerTransfers*') ? 'active' : '' }}">
        <p>Buyer Transfers</p>
    </a>
</li>

 -->

<li class="nav-item">
    <a href="#" class="nav-link"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Deslogar
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
