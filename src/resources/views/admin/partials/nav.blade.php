<aside class="side-nav">
    <div class="logo">
            <img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/external-bookstore-shop-and-store-wanicon-lineal-color-wanicon.png" alt="external-bookstore-shop-and-store-wanicon-lineal-color-wanicon" alt="">
            ADMINPANEL
    </div>
    <ul>
        <li>
            <a href="{{route('adminpanel')}}">Dashbaord</a>
        </li>
        <li>
            <a href="{{route('adminpanel.books')}}">Books</a>
        </li>
        <li>
            <a href="{{route('adminpanel.genres')}}">Genres</a>
        </li>
        <li>
            <a href="">Orders</a>
        </li>
    </ul>
    <div class="logout">
        <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M23.9917 6H6V42H24"/><path d="M33 33L42 24L33 15"/><path d="M16 23.9917H42"/></g></svg>
            &nbsp; Logout
        </button>
        </form>
    </div>
</aside>