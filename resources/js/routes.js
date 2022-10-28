import LoginComponent from "./components/auth/LoginComponent";
import RegisterComponent from "./components/auth/RegisterComponent";
import ForgotPasswordComponent from "./components/auth/ForgotPasswordComponent";
import HomeComponent from "./components/HomeComponent";
import LogoutComponent from "./components/auth/LogoutComponent";
import AddEmployeeComponent from "./components/employee/AddEmployeeComponent";
import AllEmployeeComponent from "./components/employee/AllEmployeeComponent";
import AddSupplierComponent from "./components/supplier/AddSupplierComponent";
import AllSupplierComponent from "./components/supplier/AllSupplierComponent";
import EditEmployeeComponent from "./components/employee/EditEmployeeComponent";


export const routes = [
    {path: '/', component: LoginComponent, name:'login'},
    {path: '/register', component: RegisterComponent, name:'register'},
    {path: '/forgot-password', component: ForgotPasswordComponent, name:'forgot'},
    {path: '/home', component: HomeComponent, name:'home'},
    {path: '/logout', component: LogoutComponent, name: 'logout'},

    //employee route...
    {path: '/add_employee', component: AddEmployeeComponent, name: 'add_employee'},
    {path: '/all_employee',component: AllEmployeeComponent, name: 'all_employee'},
    {path: '/edit_employee/:id', component: EditEmployeeComponent, name: 'edit_employee'},

    //supplier route..
    {path: '/add_supplier', component: AddSupplierComponent, name: 'add_supplier'},
    {path: '/all_supplier', component: AllSupplierComponent, name: 'all_supplier'}
]
