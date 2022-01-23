<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/formcss.css">
    <title>Form</title>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <div class="card custom-container">
                <div class="text-center">
                    <h2>CV-GFOXX ORDER FORM.</h2>
                    <p>Please fill up the form para ma-process po namin ang order niyo. 🛒</p>
                    <p>Ito po ang mga number po ng aming Call Supports . Maari po silang tawagan sa oras ng kanilang duty sa umaga o sa hapon. 😃</p>
                    <p> Ms. Jona - 09754606032 (7am-4pm) <br>
                        Ms. Meca - 097546059921 (2pm-10pm)</p>
                </div>
                <form action="functions.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input id="names" type="text" class="form-control" name="name" placeholder="Enter Name" required>
                        <label for="fbname">FB Name</label>
                        <input id="fb" type="text" class="form-control" name="fbname" placeholder="Enter FB Name" required>
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="getEmail" placeholder="Enter Email" required>
                        <label for="concern">Ano po and kanilang health concern?</label>
                        <input id="concerns" type="text" class="form-control" name="concern" placeholder="" required>
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="question">Matagal na po ba or bago pa lang ang kanilang health concern?</label>
                        <select id="questions" name="question" class="form-select">
                            <option>Matagal na</option>
                            <option>Bago pa lang</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="number">Phone Number</label>
                        <input id="phoneno" type="text" class="form-control" name="number" placeholder="Enter Phone Number" required>
                        <label for="number">Extra Phone Number</label>
                        <input id="extraphoneno" type="text" class="form-control" name="extranumber" placeholder="Enter Extra Phone Number">
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="address">Unit No, Street, Subdivision/Village </label>
                        <p> Maaring pakilagay ng pagkasunod sunod upang mabilis ang iyong delivery. (Example: B1 L27 Phase 1 Tulip Street Celina Royale Subdivision)</p>
                        <input id="address" type="text" class="form-control" name="address" placeholder="Enter Address" required>
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="landmark">Landmark</label>
                        <p>Ang Landmark ang pinaka-importante. Ito ay ang palatandaan kung saan malapit ang kanilang bahay. (Example: "Tapat ng shell gasolinahan")</p>
                        <input id="landmark" type="text" class="form-control" name="landmark" placeholder="Enter Landmark" required>
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="province">Province</label>
                        <input id="province" type="text" class="form-control" name="province" placeholder="Enter Province" required>
                        <label for="city">City</label>
                        <input id="city" type="text" class="form-control" name="city" placeholder="Enter City" required>
                        <label for="barangay">Barangay</label>
                        <input id="barangay" type="text" class="form-control" name="barangay" placeholder="Enter Barangay" required>
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="">Select a Product</label>
                        <select name="products" class="form-select" id="prod">
                              <?php
                              require('config.php');
                              $queryy = "SELECT * FROM products";
                              $resultt = mysqli_query($db_link, $queryy);
                              while ($roww = mysqli_fetch_array($resultt)) {
                                if ($roww['name'] != $row['name']) { ?>
                                  <option><?php echo $roww['name']; ?></option>
                              <?php
                                };
                              }; ?>
                        </select>
                        <br>
                        <label for="">How many bottles po?</label>
                        <p>Avail na po sila ng 2-3 bottles promos para masulit ang free shipping po natin. 1075 pesos lang po pumapatak kada isang bottle kapag 2 bottles promo save up to 801 pesos kapag 2 bottles promo po pero kapag 3 bottles promo naman po pumapatak 1000 pesos each bottle lang po save up to 1201 pesos kapag 3 bottles promo po ang inavail nila.</p>
                        <p></p>
                        <input type="radio" name="bottles" value="1"> A.) 1 BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.
                        <br>
                        <input type="radio" name="bottles" value="2"> B.) 2 BOTTLES: P1,900 ONLY! FREE Shipping (SAVE P1,220) - Good for 1 month + FREE one Alcohol with Spray bottle.
                        <br>
                        <input type="radio" name="bottles" value="3"> C.) 3 BOTTLES: P2,700 ONLY! FREE Shipping (SAVE P1,770) - Good for 1 month + FREE one Alcohol with Spray bottle.
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="">Best time to receive a call?</label>
                        <p>May tatawag po from our customer service to confirm your order. Eto po number nila - 09656526461. 🙂 What time po kayo available within the day? </p>
                        <input value="Morning (8am-11am)" type="radio" name="receivecall"> Morning (8am-11am)
                        <br>
                        <input value="Afternoon (1pm-5pm)" type="radio" name="receivecall"> Afternoon (1pm-5pm)
                        <br>
                        <input value="Evening (6pm-10pm)" type="radio" name="receivecall"> Evening (6pm-10pm)
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="">MODE OF PAYMENT</label>
                        <br><br>
                        <input type="radio" name="mop" value="CASH ON DELIVERY" checked> CASH ON DELIVERY
                        <br>
                        <input type="radio" name="mop" value="GCASH (09656526461)"> GCASH (09656526461)
                        <br>
                        <input type="radio" name="mop" value="BPI (5056-614-747)"> BPI (5056-614-747)
                        <br><br>
                        <label>*Please take a screenshot for proof of payment.*</label>
                        <br>
                        <input type="file" name="payment1" id="pay">
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="">Note for delivery</label>
                        <p>Optional but highly suggested kung wala po lagi sila sa bahay at nasa work madalas. EXAMPLE: ("Deliver within weekdays around 1-5pm")</p>
                        <textarea id="note" type="text" class="form-control" name="noteforDelivery"></textarea>
                    </div>
                    <br>
                    <div class="form-group col">
                        <input type="checkbox" required>
                        I agree in Terms and Agreement <a href="" type="button" data-bs-toggle="modal" data-bs-target="#terms"> (No Cancellation Policy)</a>
                    </div>
                    <br>
                    <div class="text-center">
                        <button id="check" type="button" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-primary" name="submitOrderForm">Submit Order</button>
                    </div>
                    <!-- </form> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 id="name"></h5>
                    <h5 id="fbname"></h5>
                    <h5 id="concern"></h5>
                    <h5 id="question"></h5>
                    <h5 id="phone"></h5>
                    <h5 id="extra"></h5>
                    <h5 id="addresss"></h5>
                    <h5 id="landmarks"></h5>
                    <h5 id="provinces"></h5>
                    <h5 id="citys"></h5>
                    <h5 id="barangays"></h5>
                    <h5 id="prods"></h5>
                    <h5 id="receive"></h5>
                    <h5 id="mop"></h5>
                    <h5 id="notes"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="receipt">Download Receipt</button>
                    <button type="submit" class="btn btn-primary" id="sub" name="submitOrderForm">Submit Order</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="terms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terms and Agreement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;">As per company policy, once your order is processed; We DO NOT PERMIT any cancellation of order. <br><br>
                        WARNING: Ang pagtanggi sa delivery ay pwedeng makapag resulta ng ban sa pag order online like Lazada, Shopee, and more.
                        We appreciate your patience and understanding. <br><br>
                        We do recommend you to review your order bago mag confirm. <br><br>
                        Para di po kayo ma tag as Bogus buyer at di po maapektohan ang record nyo sa mga online
                        shopping nyo sa ibang platform tulad ng Shopee, lazada, etc. <br><br> Thank you! Have a great day! 🙂</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="js/FileSaver.js"></script-->
    <!--Button Js Function for Forms-->
    <script>
        $(document).ready(function() {
            $('#check').click(function() {
                name = $('#names').val()
                fbname = $('#fb').val()
                concern = $('#concerns').val()
                question = $('#questions').val()
                phone = $('#phoneno').val()
                extra = $('#extraphoneno').val()
                address = $('#address').val()
                landmark = $('#landmark').val()
                province = $('#province').val()
                city = $('#city').val()
                barangay = $('#barangay').val()
                products = $('#prod :selected').val();
                bottles = $("input[name='bottles']:checked").val();
                receive = $("input[name='receivecall']:checked").val();
                mop = $("input[name='mop']:checked").val();
                note = $('#note').val()
                file1 = $('input[id=pay]').val()
                // file2 = $('input[id=pay]').val()
                console.log(name);
                console.log(fbname);
                console.log(concern);
                console.log(question);
                console.log(phone);
                console.log(extra);
                console.log(address);
                console.log(landmark);
                console.log(province);
                console.log(city);
                console.log(barangay);
                console.log(products);
                console.log(bottles);
                console.log(receive);
                console.log(mop);
                console.log(note);
                console.log(file1);
                // console.log(file2);
                if (file1 == '' && mop != 'CASH ON DELIVERY') {
                    console.log(file1);
                    $('#sub').prop('disabled', true);
                } else {
                    $('#sub').prop('disabled', false);
                }
                document.getElementById('name').innerHTML = "Name:" + " " + name;
                document.getElementById('fbname').innerHTML = "Fbname:" + " " + fbname;
                document.getElementById('concern').innerHTML = "Concerns:" + " " + concern;
                document.getElementById('question').innerHTML = "Question:" + " " + question;
                document.getElementById('phone').innerHTML = "Phone:" + " " + phone;
                document.getElementById('extra').innerHTML = "Extra No.:" + " " + extra;
                document.getElementById('addresss').innerHTML = "Address:" + " " + address;
                document.getElementById('landmarks').innerHTML = "Landmark:" + " " + landmark;
                document.getElementById('provinces').innerHTML = "Province:" + " " + province;
                document.getElementById('citys').innerHTML = "City:" + " " + city;
                document.getElementById('barangays').innerHTML = "Barangay:" + " " + barangay;
                document.getElementById('prods').innerHTML = "Products:" + " " + products;
                document.getElementById('receive').innerHTML = "Receive:" + " " + receive;
                document.getElementById('mop').innerHTML = "Mode of Payment:" + " " + mop;
                document.getElementById('notes').innerHTML = "Note:" + " " + note;
                if (mop == "GCASH (09656526461)" && file1 == "") {
                    alert('Please upload a file for proof of payment in gcash!');
                    $('#sub').prop('disabled', true);
                } else if (mop == "BPI (5056-614-747)" && file1 == "") {
                    alert('Please upload a file for proof of payment in BPI!');
                    $('#sub').prop('disabled', true);
                }else{
                    $('#pay').prop('disabled', false);
                }
            })
            $('#receipt').click(function genPDF() {
                name = $('#names').val()
                fbname = $('#fb').val()
                concern = $('#concerns').val()
                question = $('#questions').val()
                phone = $('#phoneno').val()
                extra = $('#extraphoneno').val()
                address = $('#address').val()
                landmark = $('#landmark').val()
                province = $('#province').val()
                city = $('#city').val()
                barangay = $('#barangay').val()
                products = $('#prod :selected').val();
                receive = $("input[name='receivecall']:checked").val();
                mop = $("input[name='mop']:checked").val();
                note = $('#note').val()
                var doc = new jsPDF();
                doc.text(80, 20, "Customer's Order:");
                doc.text(20, 40, "NAME: " + name);
                doc.text(20, 50, "FB NAME: " + fbname);
                doc.text(20, 60, "CONCERN: " + concern);
                doc.text(20, 70, "QUESTION: " + question);
                doc.text(20, 80, "PHONE NUMBER: " + phone);
                doc.text(20, 90, "EXTRA NUMBER: " + extra);
                doc.text(20, 100, "ADDRESS: " + address);
                doc.text(20, 110, "LANDMARK: " + landmark);
                doc.text(20, 120, "PROVINCE: " + province);
                doc.text(20, 130, "CITY: " + city);
                doc.text(20, 140, "BARANGAY: " + barangay);
                doc.text(20, 150, "PRODUCT: " + products)
                doc.text(20, 160, "RECEIVE CALL: " + receive);
                doc.text(20, 170, "MODE OF PAYMENT: " + mop);
                doc.text(20, 180, "NOTE: " + note);
                doc.save('Customer Receipt: ' + name + '.pdf');
                // var blob = new Blob(
                // ["Customer's order details \n \n" + 
                // "-- Product Name: Spiriluna -- \n" +
                // "-- Customer Name: " + name  + " -- \n" +
                // "-- Customer Fb Name: " + fbname  + " -- \n" +
                // "-- Customer Concern: " + concern  + " -- \n" +
                // "-- Customer Question: " + question  + " -- \n" +
                // "-- Customer Phone Number: " + phone  + " -- \n" +
                // "-- Customer Extra Number: " + extra  + " -- \n" +
                // "-- Customer Address: " + address  + " -- \n" +
                // "-- Customer Landmark: " + landmark  + " -- \n" +
                // "-- Customer Province: " + province  + " -- \n" +
                // "-- Customer City: " + city  + " -- \n" +
                // "-- Customer Barangay: " + barangay  + " -- \n" +
                // "-- Customer Order Details: " + bottles  + " -- \n" +
                // "-- Customer Receive Call: " + receive  + " -- \n" +
                // "-- Customer Mode of Payment: " + mop  + " -- \n" +
                // "-- Customer Note: " + note  + " --"
                // ],
                // {type: "text/plain;charset=utf-8"});
                // saveAs(blob, "receipt.txt")
            })
        })
    </script>
</body>
</html>