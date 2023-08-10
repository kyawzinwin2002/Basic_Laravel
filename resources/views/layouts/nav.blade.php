<aside>
    <div class="list-group">
        <a href="{{route("page.home")}}" class="  list-group-item list-group-item-action">Home</a>
    </div>

    @user

    <div class="list-group my-3">
        <a href="{{route("dashboard.home")}}" class="  list-group-item list-group-item-action">Dashboard</a>

    </div>

    <p>Manange Category</p>
    <div class="list-group my-3">
        <a href="{{route("category.create")}}" class="  list-group-item list-group-item-action">Create Category</a>
        <a href="{{route("category.index")}}" class="  list-group-item list-group-item-action">Category List</a>
    </div>
    <p>Manange Inventory</p>
    <div class="list-group my-3">
        <a href="{{route("item.create")}}" class="  list-group-item list-group-item-action">Create Item</a>
        <a href="{{route("item.index")}}" class="  list-group-item list-group-item-action">Item List</a>
    </div>
    <p>Account</p>
    <div class="list-group my-3">
        <a href="" class="  list-group-item list-group-item-action">Profile</a>
        <a href="{{route("auth.passwordChange")}}" class="  list-group-item list-group-item-action">Change Password</a>

    </div>
    <form class="  d-block my-3" action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button class=" w-100 btn btn-danger">Logout</button>
    </form>
    @enduser

    @notUser
    <div class="mt-3"></div>
    <div class="list-group">
        <a href="{{route("auth.login")}}" class="  list-group-item list-group-item-action">Login</a>
        <a href="{{route("auth.register")}}" class="  list-group-item list-group-item-action">Register</a>
    </div>
    @endnotUser


</aside>
