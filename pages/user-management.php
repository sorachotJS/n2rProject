<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <h3>User Management</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">User Management</li>
          </ol>
        </div>
        <div class="col-sm-6">
          <!-- Bookmark Start-->
          <!-- <div class="bookmark">
                    <ul>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                      <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                      <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form">
                          <div class="form-group form-control-search">
                            <input type="text" placeholder="Search..">
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div> -->
          <!-- Bookmark Ends-->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="table-responsive" style="padding: 15px;">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                  <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="tDetail">
                  <?php 
                  include './api/connect.php';
                     $sql = "SELECT * FROM t_user";
                     $stmp = $conn->prepare($sql);
                     $stmp->execute();
                     $result = $stmp->fetchAll(PDO::FETCH_ASSOC);
                     for($i = 0;$i < count($result);$i++){
                      echo '<tr>';
                      echo '<td>'.$result[$i]['ID'].'</td>';
                      echo '<td>'.$result[$i]['Username'].'</td>';
                      if($result[$i]['Status'] == "2"){
                        echo '<td>Super Admin</td>';
                      }else{
                        echo '<td>Admin</td>';
                      }
                     
                      echo '<td><button type="submit" class="btn btn-danger" onclick="deleteClickkk('.$result[$i]['ID'].');">delete</button></td>';
                      echo '</tr>';
                     }
                  ?>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Create User</h5>
            </div>
            <div class="card-body add-post">
              <!-- <form class="row needs-validation" novalidate="" method="POST" action="../api/user_api.php"> -->
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="validationCustom01">Username:</label>
                  <input class="form-control"  type="text" placeholder="Username" id="username" required="">
                  <div class="valid-feedback">Looks good!</div>
                </div>
                <div class="form-group">
                  <label for="validationCustom01">Password:</label>
                  <input class="form-control"  type="password" placeholder="Password" id="password" required="">
                  <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="form-group">
                  <label class="d-block">Status:</label>
                  <select class="js-example-placeholder-multiple col-sm-12" id="status">
                    <option value="2" selected>Super Admin</option>
                    <option value="1">Admin</option>
                  </select>
                </div>
                <!-- <div class="email-wrapper">
                            <div class="theme-form">
                              <div class="form-group">
                                <label>Content:</label>
                                <textarea id="text-box" name="text-box" cols="10" rows="2"></textarea>
                              </div>
                            </div>
                          </div> -->
              </div>
              <!-- </form> -->
              <!-- <form class="dropzone digits" id="singleFileUpload" action="/upload.php">
                        <div class="m-0 dz-message needsclick"><i class="icon-cloud-up"></i>
                          <h6 class="mb-0">Drop files here or click to upload.</h6>
                        </div>
                      </form> -->
              <div class="btn-showcase">
                <button class="btn btn-primary" type="button" onclick="createData()">Create</button>
                <!-- <input class="btn btn-light" type="reset" value="Discard"> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
</div>
<!-- <script src="assets/js/datatable/datatables/datatable.custom.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<!-- <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script> -->
   
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script>
  (function() {
    //getData();
    })();

   
  
  function getData(){
    $.ajax({
        type: "GET",
        url: "api/user_api.php",
        dataType: "json",
        success: function(data) {
            console.log(data)
            // editClick(id, status, t_first, t_end, h_first, h_last, delay);

            $.each(data, function(index) {
              let statusUser
                       if(data[index].Status === "2"){
                        statusUser = "Super Admin"
                       }else{
                        statusUser = "Admin"
                       }
                        $("#tDetail").append('<tr><td>' + data[index].ID + '</td><td>' + data[index].Username + '</td><td>' + statusUser + '</td> <td><button type="submit" class="btn btn-danger" onclick="deleteClickkk(this);">delete</button></td></tr>');
                    })
        },
        error: function(errMsg) {

            // console.log(errMsg);
        }
    });
  }

  function createData() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let status = document.getElementById("status").value;

    console.log(username + " : " + password + " : " +status)
        $.ajax({
        type: "POST",
        url: "api/user_api.php",
        data: {
          username: username,
          password: password,
          status: status,
            method: 'POST',
            // dataInsert: dataInsert

        },
        dataType: "json",
        success: function(data) {
            console.log(data.callback)
            // editClick(id, status, t_first, t_end, h_first, h_last, delay);

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Create Success!!',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function(errMsg) {

            console.log(errMsg);
        }
    });
  }

  function deleteClickkk(id){
    let idd = id

    // console.log(username + " : " + password + " : " +status)
        $.ajax({
        type: "POST",
        url: "api/user_api.php",
        data: {
          idd: idd,
            method: 'DELETE',
            // dataInsert: dataInsert

        },
        dataType: "json",
        success: function(data) {
            console.log(data.callback)
            // editClick(id, status, t_first, t_end, h_first, h_last, delay);

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Delete Success!!',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function(errMsg) {

            console.log(errMsg);
        }
    });
  }
</script>
