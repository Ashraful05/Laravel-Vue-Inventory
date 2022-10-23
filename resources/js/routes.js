import LoginComponent from "./components/auth/LoginComponent";
import RegisterComponent from "./components/auth/RegisterComponent";
import ForgotPasswordComponent from "./components/auth/ForgotPasswordComponent";
import HomeComponent from "./components/HomeComponent";
import LogoutComponent from "./components/auth/LogoutComponent";


export const routes = [
    {path: '/', component: LoginComponent, name:'login'},
    {path: '/register', component: RegisterComponent, name:'register'},
    {path: '/forgot-password', component: ForgotPasswordComponent, name:'forgot'},
    {path: '/home', component: HomeComponent, name:'home'},
    {path: '/logout', component: LogoutComponent, name: 'logout'},
]
