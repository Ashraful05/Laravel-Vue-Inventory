<template>
<div>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form class="user" @submit.prevent="register">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName" placeholder="Enter Full Name">
                                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address">
                                        <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                        <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" v-model="form.confirm_password" class="form-control" id="exampleInputPasswordRepeat"
                                               placeholder="Confirm Password">
                                        <small class="text-danger" v-if="errors.confirm_password">{{ errors.confirm_password[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <router-link to="/" class="font-weight-bold small">Already have an account?</router-link>
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import User from "../../Helpers/User";

export default {
    name: "RegisterComponent",
    created() {
        if(User.loggedIn()){
            this.$router.push({name:"home"})
        }
    },
    data(){
      return{
            form:{
                name:null,
                email:null,
                password:null,
                confirm_password:null,
            },
          errors:{},
        }
    },
    methods:{
        register(){
            axios.post('api/auth/register',this.form)
                .then(response => {
                    User.responseAfterLogin(response)
                    this.$router.push({name:'home'})
                    Toast.fire({
                        icon:"success",
                        title:"User Successfully registered!!"
                    })
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                    Toast.fire({
                            icon:'error',
                            title:'Something went wrong!!!'
                        })
                })
        }
    }
}
</script>

<style scoped>

</style>
