<script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            
            var options = {
                
                "key": "rzp_test_dIgxaKmIRz2ttZ", // Enter the Key ID generated from the Dashboard
                // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Gadget Smart",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",//Url for logo company
                "handler": function(response) {
                    jQuery.ajax({
                        // type:'GET',
                        // url:'tempOrder.php',
                        // data:"payment_id="+response.razorpay_payment_id+"",
                        success: function(result) {
                            window.location.href = "addOrderPayment.php?payment_id="+ response.razorpay_payment_id+"&proid="+options.proid+"&method=razorpay&amount="+options.amountSQL+"";
                        }
                    });

                    // alert(response.razorpay_payment_id);
                    // alert(response.razorpay_signature)
                },
                "prefill": {
                    "name": "<?php echo $custName ?>",
                    "email": "<?php echo $custEmail?>",
                    "contact": "<?php echo $custMobile ?>"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                }
                // "theme": {
                //     "color": "#3399cc"
                // }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function(response) {
                jQuery.ajax({
                    // type:'GET',
                    // url:'addcourseDB.php',
                    // data:"payment_id="+response.razorpay_payment_id+"",
                    success: function(result) {
                        header("location:index.php");
                    }
                });

                // alert(response.error.code);
                // alert(response.error.description);
                // alert(response.error.source);
                // alert(response.error.step);
                // alert(response.error.reason);
                // alert(response.error.metadata.order_id);
                // alert(response.error.metadata.payment_id);
            });
            function reply_click(clicked_id,puid) {
                options.amount = clicked_id * 100;
                options.amountSQL = clicked_id;
                options.proid = puid;
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>


        <!-- Query Filter -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            
            var options = {
                
                "key": "rzp_test_dIgxaKmIRz2ttZ", // Enter the Key ID generated from the Dashboard
                // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Gadget Smart",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",//Url for logo company
                "handler": function(response) {
                    jQuery.ajax({
                        // type:'GET',
                        // url:'tempOrder.php',
                        // data:"payment_id="+response.razorpay_payment_id+"",
                        success: function(result) {
                            window.location.href = "addOrderPayment.php?payment_id="+ response.razorpay_payment_id+"&proid="+options.proid+"&method=razorpay&amount="+options.amountSQL+"";
                        }
                    });

                    // alert(response.razorpay_payment_id);
                    // alert(response.razorpay_signature)
                },
                "prefill": {
                    "name": "<?php echo $custName ?>",
                    "email": "<?php echo $custEmail?>",
                    "contact": "<?php echo $custMobile ?>"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                }
                // "theme": {
                //     "color": "#3399cc"
                // }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function(response) {
                jQuery.ajax({
                    // type:'GET',
                    // url:'addcourseDB.php',
                    // data:"payment_id="+response.razorpay_payment_id+"",
                    success: function(result) {
                        header("location:index.php");
                    }
                });

                // alert(response.error.code);
                // alert(response.error.description);
                // alert(response.error.source);
                // alert(response.error.step);
                // alert(response.error.reason);
                // alert(response.error.metadata.order_id);
                // alert(response.error.metadata.payment_id);
            });
            function reply_click(clicked_id,puid) {
                options.amount = clicked_id * 100;
                options.amountSQL = clicked_id;
                options.proid = puid;
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>


      