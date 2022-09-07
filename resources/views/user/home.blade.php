<!DOCTYPE html>
<html lang="en">
    @include('user.inc.head')
    <body class="sb-nav-fixed">
    @include('user.inc.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('user.inc.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        @yield('content')
                    </div>
                </main>
                @include('user.inc.footer')
            </div>
        </div>
      @include('user.inc._js')
    </body>
</html>
