<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-input').on('input', function() {
        let query = $(this).val();

        if(query.length < 1) {
            $('#search-results').empty();
            return;
        }

        $.get('/projects/search', { query: query }, function(data) {
            let results = '';
            if(data.length > 0) {
                data.forEach(function(item) {
                    results += `<li class="list-group-item list-group-item-action" data-id="${item.id}">${item.title}</li>`;
                });
            } else {
                results = '<li class="list-group-item">No projects found</li>';
            }
            $('#search-results').html(results);
        });
    });

    // Tıklayınca sayfa içinde ilgili yere git
    $(document).on('click', '#search-results li', function() {
        let projectId = $(this).data('id');
        if(projectId) {
            // Örn: sayfada #project-{id} id'li element varsa scroll
            let target = $('#project-' + projectId);
            if(target.length) {
                $('html, body').animate({ scrollTop: target.offset().top - 100 }, 500);
            }
        }
        $('#search-results').empty();
        $('#search-input').val($(this).text());
    });
});
</script>

          <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
  <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <div class="nav-profile-img">
      <img src="{{ Auth::user()->image ? asset('User/' . Auth::user()->image) : asset('assets/images/faces/face1.jpg') }}" alt="profile">
      <span class="availability-status online"></span>
    </div>
    <div class="nav-profile-text">
      <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
    </div>
  </a>
  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
    <a class="dropdown-item" href="#">
      <i class="mdi mdi-cached me-2 text-success"></i> Activity Log
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="mdi mdi-logout me-2 text-primary"></i> Signout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</li>


            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('assets/images/faces/face4.jpg') }}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('assets/images/faces/face2.jpg') }}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('assets/images/faces/face3.jpg') }}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>




            
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
