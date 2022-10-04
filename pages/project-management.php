<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Project Manage</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Project</li>
                    <li class="breadcrumb-item active">Add Project</li>
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
            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5>Create Project</h5>
                    </div>
                    <div class="card-body add-post">
                      <form class="row needs-validation" novalidate="">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="validationCustom01">Title:</label>
                            <input class="form-control" id="validationCustom01" type="text" placeholder="Post Title" required="">
                            <div class="valid-feedback">Looks good!</div>
                          </div>
                          <div class="form-group">
                            <label>Type:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="">Text
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">Image
                              </label>
                              <label class="f-w-500" for="edo-ani2">
                                <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="">Audio
                              </label>
                              <label class="f-w-500" for="edo-ani3">
                                <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani">Video
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="d-block">Category:</label>
                            <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
                              <option value="AL">Lifestyle</option>
                              <option value="WY">Travel</option>
                            </select>
                          </div>
                          <div class="email-wrapper">
                            <div class="theme-form">
                              <div class="form-group">
                                <label>Content:</label>
                                <textarea id="text-box" name="text-box" cols="10" rows="2"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <form class="dropzone digits" id="singleFileUpload" action="/upload.php">
                        <div class="m-0 dz-message needsclick"><i class="icon-cloud-up"></i>
                          <h6 class="mb-0">Drop files here or click to upload.</h6>
                        </div>
                      </form>
                      <div class="btn-showcase">
                        <button class="btn btn-primary" type="submit">Post</button>
                        <input class="btn btn-light" type="reset" value="Discard">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid Ends-->
          </div>
        </div>