<x-layout>
    <style>
        body,html{
            overflow-x: hidden;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container d-flex justify-content-center align-items-center mt-4">
        <div class="screen">
            <div class="screen__content">
                <form class="register-login" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="test" class="login__input" placeholder="{{__('ui.Nome')}}" name="name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-envelope"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="{{__('ui.Conferma')}} Password" name="password_confirmation">
                    </div>
                    <button type="submit" class="button login__submit">
                        <span class="button__text">{{__('ui.Registrati')}}</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
                <div class="social-login">
                    <p class="mt-4">{{__('ui.SeiGiaRegistrato')}}</p>
                    <a class="text-warning" href="{{route('login')}}">{{__('ui.Accedi')}}</a>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    
</x-layout>

