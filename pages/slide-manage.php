<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Slide Manage</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Slide</li>
                        <li class="breadcrumb-item active">Add Slide</li>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image Url</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tDetail">
                                    <?php
                                    include './api/connect.php';
                                    $sql = "SELECT * FROM t_slideimg";
                                    $stmp = $conn->prepare($sql);
                                    $stmp->execute();
                                    $result = $stmp->fetchAll(PDO::FETCH_ASSOC);
                                    for ($i = 0; $i < count($result); $i++) {
                                        // $splitImg = explode(":", $result[$i]['Img_url']);

                                        echo '<tr>';
                                        echo '<td>' . $result[$i]['ID'] . '</td>';
                                        echo '<td>' . $result[$i]['Title'] . '</td>';
                                        echo '<td>' . $result[$i]['Category'] . '</td>';
                                        echo '<td><img src="./image_upload/' . $result[$i]['Img_url'] . '" alt="Girl in a jacket" width="70" height="70"></td>';

                                        echo '<td><button type="submit" class="btn btn-danger" onclick="deleteClickkk(' . $result[$i]['ID'] . ');">delete</button></td>';
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
                            <h5>Create Slide Image</h5>
                        </div>
                        <div class="card-body add-post">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Title:</label>
                                    <input class="form-control" id="title" type="text" placeholder="Post Title" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="form-group">
                                    <label class="d-block">Category:</label>
                                    <select class="js-example-placeholder-multiple col-sm-12" id="category">
                                        <option value="DML5N" selected>DML5N</option>
                                        <option value="PHANASNIKOM BYPASS">PHANASNIKOM BYPASS</option>
                                        <option value="RANTREE">RANTREE</option>
                                        <option value="EHA Z62">EHA Z62</option>
                                    </select>
                                </div>

                            </div>
                            <div class="custom-file" style="margin-bottom: 15px;">
                                <input type="file" class="custom-file-input" id="fileupload" name="fileupload">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="btn-showcase">
                                <button class="btn btn-primary" type="submit" onclick="uploadFile()">Save</button>
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

<script>
    async function uploadFile() {
        let formData = new FormData();
        formData.append("file", fileupload.files[0]);
        await fetch('api/upload.php', {
            method: "POST",
            body: formData
        });
        alert('The file has been uploaded successfully.');
        createSlide()
    }

    function createSlide() {
        let title = document.getElementById("title").value;
        let category = document.getElementById("category").value;
        // let file = document.getElementById("fileupload").value;
        var fullPath = document.getElementById('fileupload').value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            //alert(filename);
        }

        $.ajax({
            type: "POST",
            url: "api/slideImg_api.php",
            data: {
                title: title,
                category: category,
                file: filename,
                method: 'POST',
                // dataInsert: dataInsert

            },
            dataType: "json",
            success: function(data) {
                console.log(data)
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
        url: "api/slideImg_api.php",
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