<div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="?page=home"><img class="img-fluid" src="assets/images/logo/logo.png" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="?page=home"><img class="img-fluid" src="assets/images/logo/dark-logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
          </div>
         
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
             
             
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
             
              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button" onclick="logOut()"><i data-feather="log-out"></i>Log out</button>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>

      <script>
        function logOut(){
          
          Swal.fire({
          title: 'Do you want to logout?',
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'OK',
          denyButtonText: `Don't save`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            sessionStorage.clear()
            window.location.href = "/JSdashboard/";
          }
        })
        }
      </script>