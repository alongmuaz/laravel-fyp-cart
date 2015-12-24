<!-- Cart, Login and Register form (Modal) -->
<!-- Cart Modal starts -->
<div id="cart" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4>Shopping Cart</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped tcart">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart_content as $cart)
                    <tr>
                        <td><a href="{{url('store/view/'.$cart->id)}}">{{$cart->name}}</a></td>
                        <td>{{ $cart->qty }}</td>
                        <td>RM{{ $cart->price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>RM{{$total}}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{url('/')}}" class="btn">Continue Shopping</a>
                <a href="{{url('store/checkout')}}" class="btn btn-danger">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!--/ Cart modal ends -->
