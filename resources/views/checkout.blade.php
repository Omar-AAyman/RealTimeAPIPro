<!doctype html>
<html lang="en">

<head>
    <title>Laravel integration with payment getway</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Laravel Integration</h1>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Integration with Stripe Payment Getway.
                    </div>
                    <div class="card-body">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th class="width:50%">Product</th>
                                    <th class="width:10%">Price</th>
                                    <th class="width:8%">Quantity</th>
                                    <th class="width:22%">Subtotal</th>
                                    <th class="width:10%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{ asset('img') }}/1.jpg" width="100" height="100"
                                                    class="img-responsive" />
                                            </div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">Asus Vivobook 17 Laptop - Intel Core i3 (10th Gen)
                                                </h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">$6</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="1" class="form-control quantity cart_update"
                                            min="1" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">$6</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i>
                                            Delete</button>
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: right;">
                                        <h3><strong>Total $6</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">
                                        <form action="/session" method="POST">
                                            <a href="{{ url('/') }}" class="btn btn-danger">
                                                <i class="fa fa-arrow-left"></i> Continue Shopping
                                            </a>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="total" value="6">
                                            <input type="hidden" name="productName"
                                                value="Asus Vivobook 17 Laptop - Intel Core i3 (10th Gen)">

                                            <button class="btn btn-success" type="submit" id="checkout-live-button">
                                                <i class="fa fa-money"></i> Checkout
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
