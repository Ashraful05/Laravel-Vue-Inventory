import LoginComponent from "./components/auth/LoginComponent";
import RegisterComponent from "./components/auth/RegisterComponent";
import ForgotPasswordComponent from "./components/auth/ForgotPasswordComponent";


export const routes = [
    {path: '/', component: LoginComponent},
    {path: '/register', component: RegisterComponent},
    {path: '/forgot-password', component: ForgotPasswordComponent},
]
