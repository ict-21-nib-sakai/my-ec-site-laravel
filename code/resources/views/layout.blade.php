<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="text/html" charset="UTF-8">
    <title>
        @yield('title')くじらカフェ Online Store
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.23.0/dist/axios.min.js" integrity="sha384-QCM4FjE063QB0i9G7BVimXTJzjdGitEuSLL6SKXAWR0w5dCPAuxlBonrIJPZ1GCH" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                くじらカフェ Online Store
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex">
                        <form class="d-flex">
                            <div class="input-group w-100">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text"
                                       name="keyword"
                                       value=""
                                       class="form-control"
                                       placeholder="(例) キャットフード"
                                       aria-label="Input group example"
                                       aria-describedby="basic-addon1">
                            </div>
                        </form>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#" id="categoryDropdown"
                           role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="bi bi-card-heading"></i>
                            カテゴリ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <li>
                                <a class="dropdown-item" href="">●●●</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="">
                            <i class="bi bi-cart"></i>
                            カート
                            <span class="translate-middle badge rounded-pill bg-danger ms-3">
                                +99
                                <span class="visually-hidden">カート内の商品数量</span>
                            </span>
                        </a>
                    </li>

                </ul>

                <ul class="navbar-nav d-flex">
                    @if(true)
                        <li class="nav-item">
                            <a class="nav-link" href="" tabindex="-1">
                                <i class="bi bi-lock"></i>
                                ログイン
                            </a>
                        </li>
                    @endif

                    @if(true)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#" id="navbarDropdown"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false">
                                ●●●さん
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end"
                                aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-clock-history"></i>注文履歴
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person-circle"></i>
                                        アカウント情報
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" id="logout_link">
                                        <i class="bi bi-unlock"></i>
                                        ログアウト
                                    </a>
                                    <form action=""
                                          method="post"
                                          id="logout_form">
                                        <%-- TODO CSRF トークン --%>
                                    </form>
                                    <script>
                                        const logout_link = document.getElementById('logout_link')
                                        logout_link.addEventListener('click', event => {
                                            event.preventDefault()
                                            document
                                                .getElementById('logout_form')
                                                .submit()
                                        })
                                    </script>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<main id="app">
    <div class="py-5 bg-light mt-3">
        <div class="container">
            @if(true)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    ●●●
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif

            @if(true)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle"></i>
                    ●●●
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('extended_content')
</main>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@yield('script')
</body>
</html>
