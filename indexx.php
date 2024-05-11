<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Simple Cashiering System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }
        
        main {
            height: 100%;
            display: flex;
            flex-flow: column;
        }
        
        #page-container {
            flex: 1 1 auto;
            overflow: auto;
        }
        
        #topNavBar {
            flex: 0 1 auto;
        }
        
        .truncate-1 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        
        .truncate-3 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }
        
        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }
        
        @media (max-width:720px) {
            .modal-dialog.large {
                width: 100% !important;
                max-width: unset;
            }
            .modal-dialog.mid-large {
                width: 100% !important;
                max-width: unset;
            }
        }
    </style>
</head>

<body>

    <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static">
        <main>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                Simple Cashiering System
                </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">

                            <a class="nav-link <?php echo ($page == 'home')? 'active' : '' ?>" aria-current="page" href="./">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($page == 'products')? 'active' : '' ?>" aria-current="page" href="./?page=products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($page == 'users')? 'active' : '' ?>" aria-current="page" href="./?page=users">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./?page=sales">Sales</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./?page=pos">POS</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle bg-transparent  text-light border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Hello 
                    </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="./?page=manage_account">Manage Account</a></li>
                                <li><a class="dropdown-item" href="Actions.php?a=logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>



        </main>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header py-2">
                    <h5 class="modal-title">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="d-flex flex-column h-100">
        <div class="w-100 d-flex justify-content-between" id="pos-header">
            <h3>POS</h3>
        </div>
        <form action="" id="pos-form" class="h-100 flex-grow-1">
            <div class="card rounded-0 border-dark h-100">
                <div class="card-body d-flex h-100 py-0 px-0">
                    <div class="col-8 d-flex flex-column p-2">
                        <div class="d-flex align-items-center mb-1">
                            <label for="customer_name" class="control-label col-3 me-2">Customer Name</label>
                            <input type="text" autocomplete="off" class="form-control form-control-sm py-0 control-sm rounded-0" id="customer_name" name="customer_name" value="Guest">
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="product_code" class="control-label col-3 me-2">Enter Product Code</label>
                            <input type="text" autocomplete="off" autofocus class="form-control form-control-sm control-sm rounded-0" id="product_code">
                        </div>
                        <div class="flex-grow-1 bg-dark bg-gradient bg-opacity-25 mt-4">
                            <table class="table table-hover table-striped table-bordered" id="item-list">
                                <colgroup>
                                    <col width="5%">
                                    <col width="10%">
                                    <col width="10%">
                                    <col width="35%">
                                    <col width="20%">
                                    <col width="20%">
                                </colgroup>
                                <thead>
                                    <tr class="bg-dark bg-gradient text-light">
                                        <th class="py-0 px-1"></th>
                                        <th class="py-0 px-1">QTY</th>
                                        <th class="py-0 px-1">Unit</th>
                                        <th class="py-0 px-1">Product</th>
                                        <th class="py-0 px-1">Unit Price</th>
                                        <th class="py-0 px-1">Total</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4 bg-dark d-flex flex-column bg-gradient h-100 p-2">
                        <div class="w-100 flex-grow-0">
                            <fieldset class="border border-light p-1 text-light">
                                <legend class="text-light w-auto float-none fs-5">Keyboard Shortcuts</legend>
                                <label for="" class="fs-6">Ctrl + F1 = Focuses the Product Code Text Field.</label>
                                <label for="" class="fs-6">Ctrl + F2 = Focuses the Discount % Text Field.</label>
                                <label for="" class="fs-6">Ctrl + F3 = Tender Amount.</label>
                            </fieldset>
                        </div>
                        <div class="w-100 flex-grow-1 computaion-pane">
                            <div class="w-100 d-flex align-items-end h-100">
                                <div class="col-12">
                                    <div class="row gx-0 mb-3">
                                        <div class="col-3 text-light">SubTotal</div>
                                        <div class="col-9 text-end bg-light px-1" id="sub_total">0.00</div>
                                    </div>
                                    <div class="row gx-0 mb-3">
                                        <div class="col-3 text-light">Discount %</div>
                                        <div class="col-9 text-end bg-light px-1" contenteditable id="disc_perc">0</div>
                                        <input type="hidden" name="disc_perc" value="0">
                                    </div>
                                    <div class="row gx-0 mb-3">
                                        <div class="col-3 text-light">Discount</div>
                                        <div class="col-9 text-end bg-light px-1" id="disc_amount">0</div>
                                        <input type="hidden" name="disc_amount" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5 flex-grow-0">
                            <h3 class="text-light">Grand Total</h3>
                            <div class="w-100 px-1 bg-light text-end" id="grand-total" style="height:10vh;font-size:3rem">0.00</div>
                            <input type="hidden" name="total" value="0">
                            <input type="hidden" name="amount_tendered" value="0">
                            <input type="hidden" name="amount_change" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(function() {
            $('#pos-form').submit(function(e) {
                e.preventDefault()
                $.ajax({
                    url: "save_transaction.php",
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    error: err => {
                        console.log(err)
                        alert('An error occured.')
                    },
                    success: function(resp) {
                        if (resp.status == 'success') {
                            location.reload()
                        } else {
                            console.log(resp)
                            alert('An error occured.')
                        }
                    }
                })
            })
            $(window).on('keydown', function(e) {
                if ($.inArray(e.which, [112, 113, 114, 115]) > -1 && e.ctrlKey == true) {
                    e.preventDefault()
                    if (e.which == 112) {
                        $('#product_code').val('').focus()
                    }
                    if (e.which == 113) {
                        $('#disc_perc').focus().select()
                        document.execCommand('selectAll', false, null)
                    }
                    if (e.which == 114) {
                        uni_modal("Payment", "tender_amount.php?total=" + $('[name="total"]').val())
                    }
                }
            })
            $('#disc_perc').on('input keypress', function() {
                $("input[name='disc_perc']").val($(this).text().replace(/,/gi, ''))
                calc_total()
            })
            $('#disc_perc').on('blur', function() {
                var perc = $(this).text() > 0 ? $(this).text() : 0;
                $(this).text(perc)
                $("input[name='disc_perc']").val(perc)
            })
            $('#product_code').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "actions.php?a=searh_prod",
                        method: "POST",
                        data: {
                            t: request.term
                        },
                        dataType: 'json',
                        error: err => console.log(err),
                        success: function(resp) {
                            response(resp)
                        }
                    })
                },
                create: function(event, ui) {
                    $(this).data("ui-autocomplete")._renderItem = function(ul, item) {
                        if (item.id == '') {
                            return $('<li class="ui-state-disabled px-1" style="opacity:1 !important">' + item.label + '</li>').appendTo(ul);
                        } else {
                            return $('<li>').append("<div>" + item.label + "</div>").appendTo(ul);
                        }
                    }
                },
                select: function(event, ui) {
                    var data = ui.item.data
                    add_item(data)
                    setTimeout(() => {
                        $('#product_code').val('')
                    }, 100);
                },
                minLength: 2
            })
        })

        function calc_total() {
            $('input[name="quantity[]"]').each(function() {
                var _total = 0
                var tr = $(this).closest('tr')
                var qty = $(this).val()
                var unit_price = tr.find("input[name='price[]']").val()
                unit_price = unit_price.replace(/,/gi, '')
                _total = parseFloat(qty) * parseFloat(unit_price)
                _total = parseFloat(_total).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 3
                })
                tr.find('.total-price').text(_total)
            })
            var total = 0;
            $('#item-list tbody .total-price').each(function() {
                var _total = $(this).text()
                _total = _total.replace(/,/gi, '')

                total += parseFloat(_total)
            })
            $('#sub_total').text(parseFloat(total).toLocaleString("en-US", {
                style: 'decimal',
                maximumFractionDigits: 2,
                minimumFractionDigits: 2
            }))

            var disc_amount = 0;
            var disc_perc = $('[name="disc_perc"]').val()
            disc_perc = disc_perc > 0 ? disc_perc : 0;
            disc_amount = parseFloat(total) * parseFloat(disc_perc / 100);
            $('[name="disc_amount"]').val(disc_amount.toFixed(2))
            $('#disc_amount').text(parseFloat(disc_amount).toLocaleString("en-US", {
                style: 'decimal',
                maximumFractionDigits: 2,
                minimumFractionDigits: 2
            }))
            total = parseFloat(total) - parseFloat(disc_amount.toFixed(2))
            $('#grand-total').text(parseFloat(total).toLocaleString("en-US", {
                style: 'decimal',
                maximumFractionDigits: 2,
                minimumFractionDigits: 2
            }))
            $('input[name="total"]').val(parseFloat(total))
        }

        function rem_item(_this) {
            _this.closest('tr').remove();
            calc_total()
        }

        function add_item($data) {
            var tr = $('<tr>')
            tr.attr('data-id', $data.product_id)
            if ($('#item-list tbody tr[data-id="' + $data.product_id + '"]').length > 0) {
                var o_qty = $('#item-list tbody tr[data-id="' + $data.product_id + '"]').find('input[name="quantity[]"]').val()
                $('#item-list tbody tr[data-id="' + $data.product_id + '"]').find('[name="quantity[]"]').val(parseFloat(o_qty) + parseFloat($data.qty))
                calc_total()
                return false;
            }
            var inputs = $('<div class="d-none">')
            inputs.append('<input type="hidden" name="product_id[]" value="' + $data.product_id + '"/>')
            inputs.append('<input type="hidden" name="unit[]" value="' + $data.unit + '"/>')
            inputs.append('<input type="hidden" name="price[]" value="' + $data.price + '"/>')
            tr.append('<td class="p-1 text-center"><a class="btn btn-danger btn-sm rounded-0" onclick="rem_item($(this))">X</a>' + inputs.html() + '</td>')
            tr.append('<td class="p-1 text-center"><input class="w-100 text-center" type="number" name="quantity[]" value="' + $data.qty + '"/></td>')
            tr.append('<td class="p-1 text-center">' + $data.unit + '</td>')
            tr.append('<td class="p-1"><p class="truncate-1">' + $data.name + '</p></td>')
            tr.append('<td class="p-1 text-end">' + (parseFloat($data.price).toLocaleString('en-US')) + '</td>')
            tr.append('<td class="p-1 text-end total-price">' + (parseFloat($data.price * $data.qty).toLocaleString('en-US')) + '</td>')
            $('#item-list tbody').append(tr)
            calc_total()
            tr.find('input[name="quantity[]"]').on('input keypress', function() {
                calc_total()
            })
        }
    </script>
</body>

</html>