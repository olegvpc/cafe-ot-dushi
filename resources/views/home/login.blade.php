@extends('home.layouts.main')

@section('right.content')
    <section>

        <!-- Login Page -->
        <div id="login" class="tm-page-content">
            <div class="tm-black-bg tm-contact-text-container">
                <h2 class="tm-text-primary">Вход для сотрудников/ เข้าสู่ระบบพนักงาน</h2>

                <p>{{ Auth::check() ? Auth::user()->name : 'Введите свой логин и пароль для входа на платформу. / กรอกชื่อผู้ใช้และรหัสผ่านของคุณเพื่อเข้าสู่ระบบแพลตฟอร์ม' }}</p>
            </div>
            @guest('web')
                <div class="tm-black-bg tm-contact-form-container tm-align-right">
                    <form action="{{ route('login.store') }}" method="POST" id="login">
                        @csrf
                        <div class="tm-form-group">
                            <input type="email" name="email" class="tm-form-control" placeholder="Email / อีเมล" required />
                        </div>
                        <div class="tm-form-group">
                            <input type="password" name="password" class="tm-form-control" placeholder="Пароль / รหัสผ่าน" required />
                        </div>
                        <div>
                            <button type="submit" class="tm-btn-primary tm-align-right">
                                Войти / ที่จะเข้ามา
                            </button>
                        </div>
                    </form>
                </div>
            @endguest

        </div>
        <!-- end Login Page -->

    </section>

@endsection
