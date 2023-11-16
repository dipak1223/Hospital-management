<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>    </title>
    <!-- For Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- CSS For Print Format -->
    <link rel="stylesheet" media="print" href="invoiceprint.css">
    
    <!-- CSS For Invoice -->
    <link rel="stylesheet"  href="invoice.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
    
    <!-- For Invoice  -->
    <script src="invoice.js"></script>


</head>
  <body>
    

    <div class="container ">
       

        <div class="card">
            <div class="card-header text-center">
              <h4>Hospital Management System</h4>
              
            </div>
             <form action="saveinvoice.php" method="post">
            <div class="card-body">

                <div class="row">
                    <div class="col-8">
                       
                                        <div class="input-group mb-3">
                              <label for="patient_name" class="input-group-text">patient_Name</label>
                              <input type="text" id="patient_name" name="patient_name" class="form-control" placeholder="patient Name">
                            </div>
                        <div class="input-group mb-3">
  <label for="address" class="input-group-text">address</label>
  <input type="text" id="address" name="address" class="form-control" placeholder="address">
</div>

<div class="input-group mb-3">
  <label for="city" class="input-group-text">city</label>
  <input type="text" id="city"  name="city" class="form-control" placeholder="city">
</div>

<div class="input-group mb-3">
  <label for="paid_date" class="input-group-text">paid_date</label>
  <input type="text" id="paid_date"  name="paid_date" class="form-control" placeholder="paid_date">
</div>

<div class="input-group mb-3">
  <label for="card_holder" class="input-group-text">card_holder</label>
  <input type="text" id="card_holder"  name="card_holder" class="form-control" placeholder="card_holder">
</div>

<div class="input-group mb-3">
  <label for="cvv_no" class="input-group-text">cvv_no</label>
  <input type="text" id="cvv_no"  name="cvv_no" class="form-control" placeholder="cvv_no">
</div>

<!-- Add labels for the remaining input groups in a similar manner -->

                    </div>
                    <div class="col-4">
                      
                        <div class="input-group mb-3">
  <label for="invoice_number" class="input-group-text">invoice_number</label>
  <input type="text" id="invoice_number" name="invoice_number" class="form-control" placeholder="invoice_number">
</div>

<div class="input-group mb-3">
  <label for="invoice_date" class="input-group-text">invoice_date</label>
  <input type="text" id="invoice_date" name="invoice_date" class="form-control" placeholder="invoice_date">
</div>

<div class="input-group mb-3">
  <label for="paid_time" class="input-group-text">paid_time</label>
  <input type="text" id="paid_time"  name="paid_time" class="form-control"  placeholder="paid_time">
</div>


<div class="input-group mb-3">
  <label for="card_number" class="input-group-text">card_number</label>
  <input type="text" id="card_number"  name="card_number" class="form-control" placeholder="card_number">
</div>

<div class="input-group mb-3">
  <label for="expiry_date" class="input-group-text">expiry_date</label>
  <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="expiry_date">
</div>
<div class="input-group mb-3">
  <label for="paid_amount" class="input-group-text">paid_amount</label>
  <input type="text" id="paid_amount" name="paid_amount" class="form-control" placeholder="paid_amount">
</div>



                    </div>
                </div>


                <table class="table table-bordered">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Particular</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Rate</th>
                        <th scope="col" class="text-end">Amount</th>
                        <th scope="col" class="NoPrint">                         
                            <button type="button" class="btn btn-sm btn-success" onClick="BtnAdd()">+</button>
                          
                        </th>

                      </tr>
                    </thead>
                    <tbody id="TBody">
                      <tr id="TRow" class="d-none">
                        <th scope="row">1</th>
                        <td><input type="text" class="form-control" ></td>
                        <td><input type="number" class="form-control text-end" name="qty" onChange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end" name="rate"  onchange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end" name="amt" value="0" disabled=""></td>
                        <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onClick="BtnDel(this)">X</button></td>
                      </tr>
                    </tbody>
                  </table>


                  <div class="row">
                    <div class="col-8">
                      
                        <button type="button" class="btn btn-primary" onClick="GetPrint()">Print</button>

                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Total</span>
                            <input type="number" class="form-control text-end" id="FTotal" name="FTotal" disabled="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Discount</span>
                            <input type="number" class="form-control text-end" id="FGST" name="FGST" onChange="GetTotal()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Net Amt</span>
                            <input type="number" class="form-control text-end" id="FNet" name="FNet" disabled="">
                        </div>


                    </div>
                </div>
             </div>
          </div>

    </div>
<input type="submit" value="Add Invoice Record">
    </form>


    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>