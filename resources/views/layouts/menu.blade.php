<li class="{{ Request::is('categorys*') ? 'active' : '' }}">
    <a href="{{ route('categorys.index') }}"><i class="fa fa-edit"></i><span>Categorys</span></a>
</li>
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>
<li class="{{ Request::is('requistions*') ? 'active' : '' }}">
    <a href="{{ route('requisitions.index') }}"><i class="fa fa-edit"></i><span>Requistions</span></a>
</li>