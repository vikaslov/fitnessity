<html>
    <head>
        <style type="text/css">
            .button {
                cursor: pointer;
                font-weight: 500;
                left: 3px;
                line-height: inherit;
                position: relative;
                text-decoration: none;
                text-align: center;
                border-style: solid;
                border-width: 1px;
                border-radius: 3px;
                -webkit-appearance: none;
                -moz-appearance: none;
                display: inline-block;
            }

            .button--small {
                padding: 10px 20px;
                font-size: 0.875rem;
            }

            .button--green {
                outline: none;
                background-color: #64d18a;
                border-color: #64d18a;
                color: white;
                transition: all 200ms ease;
            }

            .button--green:hover {
                background-color: #8bdda8;
                color: white;
            }
        </style>
        <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.js"></script>
        <script type="text/javascript">
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
                selector: '#dropin-container'
            }, function (err, instance) {
                button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                        // Submit payload.nonce to your server
                    });
                })
            });
        </script>
    </head>

    <body>
        <div id="dropin-container"></div>
        <button id="submit-button" class="button button--small button--green">Purchase</button>
    </body>
</html>


