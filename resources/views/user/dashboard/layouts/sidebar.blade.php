<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse " style="height: 100vh">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="  btn text-start btn-outline-primary my-1 py-2">
                <a class="w-100 d-block active" href="{{url('/redirect/user/dashboard')}}">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    Dashboard
                </a>
            </li>
            <li class="  btn text-start btn-outline-primary my-1 py-2">
                <a  class="w-100 d-block"  href="#">
                    <span class="me-2"><i class="bi bi-list-task"></i></span>
                    Orders
                </a>
            </li>
            <li class="  btn text-start btn-outline-primary my-1 py-2">
                <a class="w-100 d-block"  href="{{url('/redirect/user/profile')}}">
                    <span class="me-2"><i class="bi bi-person-fill"></i></span>
                    My Profile
                </a>
            </li>
            <li class=" btn text-start btn-outline-primary my-1 py-2">
                <a  class="w-100 d-block" href="#">
                    <span class="me-2"><i class="bi bi-heart-fill"></i></span>
                    Wishlist
                </a>
            </li>
            <li class="btn text-start btn-outline-primary my-1 py-2">
                <a  class="w-100 d-block" href="{{route('address.index')}}">
                    <span class="me-2"><i class="far fa-address-book"></i></span>
                    Addresses
                </a>
            </li>
        </ul>
    </div>
</nav>