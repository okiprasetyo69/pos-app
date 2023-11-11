@extends('layout.home')
@section('title', 'Dashboard Super Admin')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report Items & Inventory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Report Items & Inventory
                </h3>
                <div class="card-tools">
                    Income Rp. <span class="btn btn-md btn-success" id="income"> </span>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table class="table table-striped" id="table-transactions">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Brand Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Income</th>
                      <th scope="col">User</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </section>
          <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    $(document).ready(function () {
        getTransactions()
        getTotalIncome()
    });

    function getTransactions(){
      $.ajax({
        type: "GET",
        url: "/transactions",
        data: "data",
        dataType: "JSON",
        success: function (response) {
          var data = response.data
          var row = ""
          var number = 1
          $("#table-transactions").find("tr:gt(0)").remove();
          $.each(data, function (i, val) {
            console.log(val) 
              var is_member = val.user.is_member
              var status = ""
              if(is_member == 0){
                 status = "consumer"
              } else {
                status = "Member"
              }
              row += "<tr><td>"+ val.id +"</td> <td>"+val.item.name+"</td><td>"+val.item.brand+"</td><td>"+val.qty+"</td><td>"+val.price+"</td><td>"+val.user.name+"</td><td>"+status+"</td></tr>"
          });
          $("#table-transactions > tbody:last-child").append(row); 
        }
      });
    }

    function getTotalIncome(){
      $.ajax({
        type: "GET",
        url: "/income",
        data: "data",
        dataType: "JSON",
        success: function (response) {
            var income = response.data
            $("#income").html(income)
        }
      });
    }

</script>
 
@endsection
@section('pagespecificscripts')
    <script type="text/javascript" src="{{ asset('js/user/index.js') }}" defer></script>
@stop