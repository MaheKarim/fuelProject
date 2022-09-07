<!DOCTYPE html>
<html lang="en">
    @include('admin.inc.head')
    <body class="sb-nav-fixed">
    @include('admin.inc.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('admin.inc.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        @yield('content')
                    </div>
                </main>
                @include('admin.inc.footer')
            </div>
        </div>
      @include('admin.inc._js')
    </body>
</html>
