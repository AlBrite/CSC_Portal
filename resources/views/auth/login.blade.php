<x-body>
    <x-main>
        <style>
            .lockscreen-wrapper {
                margin: 0 auto;
                margin-top: 0px;
                margin-top: 10%;
                max-width: 400px;
                display: none;
            }

            .show-lockscreen .lockscreen-wrapper {
                display: block;
            }

            .show-lockscreen #logArea {
                display: none;
            }

            .lockscreen-wrapper .dropdown-toggle>.select-wrap,
            .lockscreen-wrapper .dropdown-toggle>.caret {
                color: var(--dark-bg) !important;
            }

            .lockscreen-wrapper .select-wrap {
                font-weight: 700;
            }

            .lockscreen-wrapper .input {
                border-color: transparent !important;
            }

            .lockscreen-credentials {
                margin-left: 70px;
            }

            .lockscreen-name {
                font-weight: 600;
                text-align: center;
            }

            .lockscreen-item {
                border-radius: 4px;
                background-color: var(--input-bg-color);
                margin: 10px auto 30px;
                padding: 0;
                position: relative;
                width: 290px;
            }

            .lockscreen-image {
                border-radius: 50%;
                background-color: var(--input-bg-color);
                left: -10px;
                padding: 5px;
                position: absolute;
                top: -20px;
                z-index: 10;
            }

            .lockscreen-image>img {
                border-radius: 50%;
                height: 70px;
                width: 70px;
            }

            #logAreaBox {
                width: 300px;
                margin: auto;
                height: 350px;
                display: flex;
                align-items: center;
                justify-content: center;
                justify-items: center;
            }

            .loginWrapper {
                height: calc(100vh - 90px);
                padding: auto;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
        <div class="loginWrapper">
            <div id="logAreaBox" class="center">
                <form id="logArea" action="/dologin" method="post" class="mx-auto ignore">
                    @csrf
                    @error('login_info')
                        <div id="login_info" class="m3 alert alert-danger text-center not-empty">{{ $message }}</div>
                    @enderror
                    <div class="sb-card-body text-center">
                        <span class="font-weight-bold text-muted">Sign in to continue to Amauzari</span>
                    </div>


                    <div class="sb-card-body">

                        <div class="input-group mb-3" id="login_usermail">
                            <input type="text" data-input-label="UserMail" class="form-control input"
                                autocomplete="off" aria-label="Username" id="usermail" name="usermail"
                                aria-describedby="basic-addon1" placeholder="Email or Phone or Username"
                                value="{{ old('usermail') }}">
                        </div>
                        @error('usermail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        <div class="input-groupX mb-3">
                            <div class="input-group input-has-right-appendage"><input type="password"
                                    data-input-label="Password" class="form-control input ignore password-input"
                                    placeholder="Password" autocomplete="off" aria-label="password" id="password"
                                    name="password" aria-describedby="basic-addon2" data-password="input">
                                <div data-ui="toggle-password" class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-eye-slash password-visibility"
                                            aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label for="remember" class="form-check-label">
                                {{ __('Stay Logged in') }}
                            </label>

                        </div>


                    </div>

                    <div class="mb-4">
                        <div class="float-rightx">
                            <input type="hidden" name="submit" value="Login">

                            <input type="submit" class="btn btn-primary btn-block" data-waiting="Connecting..."
                                data-failed="Failed" data-done="Logged in" value="Login">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix text-center text-muted small">
                        <span class="signupin-area">
                            <a href="/register">Create account</a> &nbsp;&nbsp;or&nbsp;&nbsp;
                        </span><a href="#">Need help?</a>
                    </div>
                </form>
            </div>
        </div>
    </x-main>
</x-body>
