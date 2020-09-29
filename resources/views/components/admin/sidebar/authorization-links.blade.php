      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true" aria-controls="collapseAuthorization">
          <i class="fas fa-fw fa-lock"></i>
          <span>Authorizations</span>
        </a>
        <div id="collapseAuthorization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Authorizations:</h6>
            <a class="collapse-item" href="{{route('roles.index')}}">View Roles</a>
            <a class="collapse-item" href="{{route('permissions.index')}}">View Permissions</a>
          </div>
        </div>
      </li>